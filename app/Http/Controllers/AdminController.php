<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Product;
use App\Models\Homevideo;
use Illuminate\Http\Request; 

class AdminController extends Controller
{

	public function __construct()
	{
			$this->middleware('auth');
	}


  function index() {
	
		$type =1;
		$type_list = [
			'news' => [ 
			  'id' =>	1,
			  'name' =>	'ข่าวประชาสัมพันธ์',
			],
		];

		$type_text = isset($type_list[$type])? $type_list[$type]['name'] : '' ;
		$type_id = isset($type_list[$type])? $type_list[$type]['id'] : '' ;
		$content = Post::where('post_type', $type_id)
		->orderBy('id','desc')
		->paginate(5); 
	
			return view('admin.work', compact('type', 'type_text', 'content'))->with('i', (request()->input('page', 1)-1) * 5);
	}

	public function listContent($type)
	{
		$type_list = [
			'news' => [ 
			  'id' =>	1,
			  'name' =>	'ข่าวประชาสัมพันธ์',
			],
			'articles' => [ 
			  'id' =>	2,
			  'name' =>	'บทความ',
			],
			'plants' => [ 
			  'id' => 3,
			  'name' =>	'พืชดอยสุเทพ',
			],
			'animals' => [ 
			  'id' =>	4,
			  'name' =>	'สัตว์ป่าดอยสุเทพ',
			],
			'fungus' => [ 
			  'id' =>	5,
			  'name' =>	'จุลินทรีย์และฟังไจ',
			],
			'geology' => [ 
			  'id' =>	6,
			  'name' =>	'ธรณีวิทยา',
			],
			'culture' => [ 
			  'id' =>	7,
			  'name' =>	'สังคมและวัฒนธรรม',
			],
			'exhibition' => [ 
			  'id' =>	8,
			  'name' =>	'นิทรรศการดอยสุเทพ',
			],
			'learning' => [ 
			  'id' =>	9,
			  'name' =>	'กิจกรรมเรียนรู้ธรรมชาติ',
			],
			'tree' => [ 
			  'id' =>	10,
			  'name' =>	'เรือนเพาะชำกล้าไม้ท้องถิ่น',
			],
			'seed' => [ 
			  'id' =>	11,
			  'name' =>	'ห้องปฏิบัติการธนาคารเมล็ด',
			],
			'research' => [ 
			  'id' =>	12,
			  'name' =>	'งานวิจัยและฐานข้อมูล',
			],
			'activities' => [ 
			  'id' =>	13,
			  'name' =>	'พื้นที่จัดกิจกรรม',
			],
			'join' => [ 
			  'id' =>	14,
			  'name' =>	'ร่วมงานกันเรา',
			],
		];


		$type_text = isset($type_list[$type])? $type_list[$type]['name'] : '' ;
		$type_id = isset($type_list[$type])? $type_list[$type]['id'] : '' ;
		$content = Post::where('post_type', $type_id)
		->orderBy('id','desc')
		->paginate(5); 

		if($type != 'join') {
			return view('admin.content', compact('type', 'type_text', 'content'))->with('i', (request()->input('page', 1)-1) * 5);
		} else {
		
			return view('admin.work', compact('type', 'type_text', 'content'))->with('i', (request()->input('page', 1)-1) * 5);
		}
	}

	public function listProtuct()
	{
		$products = Product::orderBy('id','desc')
		->paginate(5); 
		return view('admin.product', compact('products'))->with('i', (request()->input('page', 1)-1) * 5);
	}

	public function listVideo(Request $request)
	{
		$type = $request['type'];
		$video = Homevideo::orderBy('id','asc')->get(); 
		
		return view('admin.video', compact('video', 'type'));
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
	public function listDatabase($type)
	{
		$type_list = [
			'plants' => [
				'id' =>	1,
				'name' =>	'ฐานข้อมูลพืช',
			],
			'animal' => [
				'id' =>	2,
				'name' =>	'ฐานข้อมูลสัตว์',
			],
		];


		$type_text = isset($type_list[$type]) ? $type_list[$type]['name'] : '';
		$type_id = isset($type_list[$type]) ? $type_list[$type]['id'] : '';
		$content = Post::where('post_type', $type_id)
			->orderBy('id', 'desc')
			->paginate(5);

			return view('admin.database', compact('type', 'type_text', 'content'))->with('i', (request()->input('page', 1) - 1) * 5);
	}
}


