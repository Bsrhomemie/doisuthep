<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function viewContet($type, $id='')
    {
        $type_list = [
			'news' => 'ข่าวประชาสัมพันธ์',
			'articles' => 'บทความ',
			'plants' => 'พืช',
			'animals' => 'สัตว์',
			'fungus' => 'จุลินทรีย์และฟังไจ',
			'geology' => 'ธรณีวิทยา',
			'culture' => 'สังคมและวัฒนธรรม',
			'exhibition' => 'นิทรรศการดอยสุเทพ',
			'learning' => 'กิจกรรมเรียนรู้ธรรมชาติ',
			'tree' => 'เรือนเพาะชำกล้าไม้ท้องถิ่น',
			'seed' => 'ห้องปฏิบัติการธนาคารเมล็ด',
			'research' => 'งานวิจัยและฐานข้อมูล',
			'activities' => 'พื้นที่จัดกิจกรรม',
		];
		$type = $type;
		$type_text = isset($type_list[$type])? $type_list[$type] :'' ;

        if(empty($id)) {
            return view('content.create', compact('type', 'type_text'));
        } else {
            $content = Post::where('id', $id)->first();;
           
            return view('content.edit', compact('type', 'type_text', 'content'));
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
		];

        $data = $request->input();
        $data_post = new Post;
        $data_post->post_name_th = $data['post_name_th'];
        $data_post->content_th = $data['content_th'];
        $data_post->post_name_en = $data['post_name_en'];
        $data_post->content_en = $data['content_en'];
        $data_post->created_at = $data['created_at'];
        $data_post->post_type = isset($type_list[$data['post_type']])? $type_list[$data['post_type']] : '';
        $data_post->pdf = '';

        if($request->file()) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('/public', $fileName);
            $data_post->picture = $fileName;
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
        if($request->file()) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('/public', $fileName);
            $data_post->picture = $fileName;
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
