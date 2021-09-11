<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class ContentController extends Controller
{
  
    public function viewContet($type)
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
        return view('content.create', compact('type', 'type_text'));

        // if(isset($_REQUEST['id'])) {
        //     $data =	[
        //             'id' => 2,
        //             'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
        //             'title_en' => 'STeP',
        //             'description_th' => 'Mocup',
        //             'description_en' => 'Mocup',
        //         ];
        //     return view('content.edit', compact('type', 'type_text', 'data'));
        // } else {
        // }
    }

    public function addContet(Request $request)
    {
       
        var_dump($request);
        die();
        // Post::create($request->all());
        // return redirect('/admin/content/news')
        //                  ->with('success', 'Created successfully');
    }

   
    // public function show(Content $content)
    // {
    //     return view('content.create');
    // }

    
    // public function edit(Request $request)
    // {
    //     return view('content.edit');

    // }

  
    // public function update(Request $request, Content $content)
    // {
    //     // $request->validate([
    //     //     'title' => 'required',
    //     //     'description' => 'required'
    //     // ]);
    //     // $content->update($request->all());
    //     return redirect()->route('/admin')
    //                     ->with('SUCCESS', 'Updated successfully');

    // }

   
    // public function destroy(Content $content)
    // {
    //     $content->delete();
    //     return redirect()->route('content.index')
    //                     >with('SUCCESS', 'Deleted successfully');
    // }
}
