<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  function index() {

		// $data = Post::first()->paginate(5);
		$todo = [
				[
					'id' => 1,
					'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
					'title_en' => 'STeP',
					'description_th' => 'Mocup',
					'description_en' => 'Mocup',

				],
				[
					'id' => 2,
					'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
					'title_en' => 'STeP',
					'description_th' => 'Mocup',
					'description_en' => 'Mocup',
				],	
				[
					'id' => 3,
					'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
					'title_en' => 'STeP',
					'description_th' => 'Mocup',
					'description_en' => 'Mocup',
				],
				[
					'id' => 4,
					'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
					'title_en' => 'Mocup',
					'description_th' => 'Mocup',
					'description_en' => 'Mocup',
				],
			];
		return view('admin.index', compact('todo'));
	}

	public function listContent($type)
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
		$type_text = isset($type_list[$type])? $type_list[$type] :'' ;
		$todo = [];
		
		$content = Post::where('post_type', '1')->get();
		
		return view('admin.content', compact('type', 'type_text', 'content'));
	}

	public function listProtuct(Request $request)
	{
		$type = $request['type'];
		
			$todo = [
				[
					'id' => 1,
					'price' => 200,
					'name' => 'สินค้า',
					'status' => 0
				],
				[
					'id' => 2,
					'price' => 200,
					'name' => 'สินค้า',
					'status' => 1
				],	
				[
					'id' => 3,
					'price' => 200,
					'name' => 'สินค้า',
					'status' => 1
				],
				[
					'id' => 4,
					'price' => 200,
					'name' => 'สินค้า',
					'status' => 0
				],
			];
		
		return view('admin.product', compact('todo', 'type'));
	}

	public function listVedio(Request $request)
	{
		$type = $request['type'];
		
			$todo = [
				[
					'id' => 1,
					'link' => '',
				],
				[
					'id' => 2,
					'link' => '',
				],	
				[
					'id' => 3,
					'link' => '',
				],
				[
					'id' => 4,
					'link' => '',
				],
			];
		
		return view('admin.vedio', compact('todo', 'type'));
	}
	
	public function listWork(Request $request)
	{
		$type = $request['type'];
		
		$todo = [
			[
				'id' => $request['type'],
				'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
				'title_en' => 'STeP',
				'description_th' => 'Mocup',
				'description_en' => 'Mocup',

			],
			[
				'id' => 2,
				'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
				'title_en' => 'STeP',
				'description_th' => 'Mocup',
				'description_en' => 'Mocup',
			],	
			[
				'id' => 3,
				'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
				'title_en' => 'STeP',
				'description_th' => 'Mocup',
				'description_en' => 'Mocup',
			],
			[
				'id' => 4,
				'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
				'title_en' => 	$type,
				'description_th' => 'Mocup',
				'description_en' => 'Mocup',
			],
		];
		return view('admin.work', compact('todo', 'type'));
	}


	public function viewContet(Request $request)
	{

		$type = 'product';
		
		$todo = [
			[
				'id' => 1,
				'price' => 200,
				'name' => 'สินค้า',
				'status' => 0
			],
			[
				'id' => 2,
				'price' => 200,
				'name' => 'สินค้า',
				'status' => 1
			],	
			[
				'id' => 3,
				'price' => 200,
				'name' => 'สินค้า',
				'status' => 1
			],
			[
				'id' => 4,
				'price' => 200,
				'name' => 'สินค้า',
				'status' => 0
			],
		];
	 	return view('admin.product', compact('todo', 'type'));
	}

	// public function create()
	// {
	// 	return view('content.create');
	// }
}


