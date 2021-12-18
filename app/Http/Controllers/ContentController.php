<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function __construct()
	{
			$this->middleware('auth');
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

        if($data['post_type'] == 'join') {
            $data_post->picture = '';
            if($request->file()) {
                $fileName = time().'_'.$request->file('pdf')->getClientOriginalName();
                $request->file('pdf')->storeAs('/pdf', $fileName);
                $data_post->pdf = $fileName;

                $service_image = $request->file('pdf');
                $name_gen = hexdec(uniqid());

                $img_ext = strtolower($service_image->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;

                $upload_location =  'file/services/';
                $full_path =  $upload_location.$img_name ;
              
                $service_image ->move($upload_location,  $img_name);

                $data_post->pdf = $full_path;
                $data_post->uniqid = $name_gen;
            }
        } else {
            $data_post->pdf = '';
            if($request->file()) {
                $service_image = $request->file('picture');
                $name_gen = hexdec(uniqid());

                $img_ext = strtolower($service_image->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;

                // $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
                // $request->file('picture')->storeAs('/public', $fileName);

                $upload_location =  'image/services/';
                $full_path =  $upload_location.$img_name ;
              
                $service_image ->move($upload_location,  $img_name);

                $data_post->picture = $full_path;
                $data_post->uniqid = $name_gen;

            }
        }
      
        $data_post->save();
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

        if($data['post_type'] == 'join') {
            $data_post->picture = '';
            if($request->file()) {
                $fileName = time().'_'.$request->file('pdf')->getClientOriginalName();
                $request->file('pdf')->storeAs('/pdf', $fileName);
                $data_post->pdf = $fileName;
            }
        } else {
            $data_post->pdf = '';
            if($request->file()) {
                $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs('/public', $fileName);
                $data_post->picture = $fileName;
            }
        }

        $data_post->update();
        return redirect('/admin/content/'.$data['post_type'])->with('status',"Update successfully");

    }

    public function deleteContet(Request $request)
    {  
         $data = $request->input();
        $data_post = Post::find($data['id']);
        $data_post->delete();
        return redirect('/admin/content/'.$data['post_type'])->with('status',"Delete successfully");

    }
    


    
}
