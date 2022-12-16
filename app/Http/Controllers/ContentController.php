<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Type;
use App\Models\Postpic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File; 

class ContentController extends Controller
{

    public function __construct()
	{
			$this->middleware('auth');
           // Artisan::call('storage:link', [] );
	}

    public function viewContet($type, $id='')
    {

        $type_list = [
            'news' => 'ข่าวประชาสัมพันธ์',
            'articles' => 'บทความ',
            'plants' => 'พืชดอยสุเทพ',
            'animals' => 'สัตว์ป่าดอยสุเทพ',
            'fungus' => 'จุลินทรีย์และฟังไจ',
            'geology' => 'ธรณีวิทยา',
            'culture' => 'สังคมและวัฒนธรรม',
            'exhibition' => 'นิทรรศการดอยสุเทพ',
            'learning' => 'กิจกรรมเรียนรู้ธรรมชาติ',
            'tree' => 'เรือนเพาะชำกล้าไม้ท้องถิ่น',
            'seed' => 'ห้องปฏิบัติการธนาคารเมล็ด',
            'research' => 'งานวิจัยและฐานข้อมูล',
            'join' => 'ร่วมงานกันเรา'
        ];
        $type = $type;
        $type_text = isset($type_list[$type])? $type_list[$type] :'' ;
        if($type != 'join') { 
            if(empty($id)) {
                return view('content.create', compact('type', 'type_text'));
            } else {
                $content = Post::where('id', $id)->first();
                $temp_files = [];
                $files = Postpic::where('post_id', $id)->get(); 
                
                foreach ($files as $key => $file) {
                    $temp_files[] = $file;
                }
                $content['files'] = $temp_files;
                return view('content.edit', compact('type', 'type_text', 'content'));
            }
        } else {
            if(empty($id)) {
                return view('content.create_join', compact('type', 'type_text'));
            } else {
                $content = Post::where('id', $id)->first();
                return view('content.edit_join', compact('type', 'type_text', 'content'));
            }
        }
    }

    
    public function addContet(Request $request)
    {
        $type_list = [
			'news' => 1,
			'articles' => 2,
			'plants' => 3,
			'animals' => 4,
			'fungus' => 5,
			'geology' => 6,
			'culture' => 7,
			'exhibition' => 8,
			'learning' => 9,
			'tree' => 10,
			'seed' => 11,
			'research' => 12,
			'activities' => 13,
			'join' => 14,
		];
 
        $data = $request->input();
        $data_post = new Post;
        $data_post->post_name_th = $data['post_name_th'];
        $data_post->content_th = $data['content_th'];
        $data_post->post_name_en = $data['post_name_en'];
        $data_post->content_en = $data['content_en'];
        $data_post->created_at = $data['created_at'];
        $data_post->post_type = isset($type_list[$data['post_type']])? $type_list[$data['post_type']] : '';
        $data_post->save();
        
        if($request->file()) {
            foreach ($request->file() as $key => $file) {
                $service_image = $request->file($key);
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($service_image->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                $upload_location =  'public/image/services/';
                $full_path =  $upload_location.$img_name ;
                $service_image ->move(base_path($upload_location),  $img_name);
                
                $data_file = new Postpic;
                $data_file->pic_path = $full_path;
                $data_file->post_id = $data_post->id;
                $data_file->save();
            }
        }

        return redirect('/admin/content/'.$data['post_type'])->with('status',"Insert successfully");

    }
   
    public function editContet(Request $request)
    {  

        $data = $request->input();
        $data_post = Post::find($data['id']);
        $data_post->post_name_th = $data['post_name_th'];
        $data_post->content_th = $data['content_th'];
        $data_post->post_name_en = $data['post_name_en'];
        $data_post->content_en = $data['content_en'];
        $data_post->created_at = $data['created_at'];
        $data_post->update();

      
        if($request->file()) {
            foreach ($request->file() as $key => $file) {
                if($data['is_update'][$key] == 1){
                    $old_file = $data['old_file'][$key];
                    if(File::exists(base_path($old_file))) {
                        File::delete(base_path($old_file));
                    }

                    $service_image = $request->file($key);
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($service_image->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$img_ext;
                    $upload_location =  'public/image/services/';
                    $full_path =  $upload_location.$img_name ;
                    $service_image ->move(base_path($upload_location),  $img_name);
                    
                    $data_file =  Postpic::where('post_id',$data['id'])->where('pic_path', $old_file)->first();
                    if($data_file){
                        $data_file->pic_path = $full_path;
                        $data_file->update();
                    }else{
                        $data_file = new Postpic;
                        $data_file->pic_path = $full_path;
                        $data_file->post_id = $data['id'];
                        $data_file->save();
                    }
                }
                 
            }
        }
        
        return redirect('/admin/content/'.$data['post_type'])->with('status',"Update successfully");
    }

    public function deleteContet(Request $request)
    {  
        $data = $request->input();
        // delete file path
        $data_file =  Postpic::where('post_id', $data['id'])->get();
        foreach ($data_file as $key => $file) {
            $file = $file['pic_path'];
            if(File::exists(base_path($file))) {
                File::delete(base_path($file));
            }
        }
        // delete content
        $data_post = Post::find($data['id']);
        $data_post->delete();
        return redirect('/admin/content/'.$data['post_type'])->with('status',"Delete successfully");
    }
    
}
