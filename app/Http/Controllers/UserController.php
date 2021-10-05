<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
class UserController extends Controller
{

	function index() {

		$list = [
			"/images/cover3.jpg",
			"/images/cover2.jpg",
			"/images/image-5.jpg", 
		];

		$type_list = [
			'news' => [ 
			  'id' =>	1,
			  'name' =>	'ข่าวประชาสัมพันธ์',
			],
			'articles' => [ 
			  'id' =>	2,
			  'name' =>	'บทความ',
			],
			'join' => [ 
			  'id' =>	14,
			  'name' =>	'ร่วมงานกันเรา',
			],
		];

		$youtube_list = [
			'https://www.youtube.com/embed/Fsh9UkI69hY',
			'https://www.youtube.com/embed/HsoenzSc7vo',
			'https://www.youtube.com/embed/pbMS7ePk20I',
			'https://www.youtube.com/embed/mgPUeT7BKMU',
		];
		
		$post_list = [];
		
		foreach($type_list as $key => $type) {
			$number = 3;
			if($key == 'join') {
				$number = 5;
			}
			$select = Post::where('post_type', $type['id'])
			->orderBy('id','desc')
			->paginate($number);
			$select = json_decode(json_encode($select), true);
			$post_list[$key] = $select['data'];
		}
		return view('index', compact('list', 'post_list', 'youtube_list'));
	}

	function news($type) {
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

		$select = Post::where('post_type', $type_id)->get();
		$select = json_decode(json_encode($select), true);
		$content_list =  $select['data'];
		if($type == 'join') {
			return view('news-job', compact('type_text', 'content_list'));
		} else {
			return view('news', compact('type_text', 'content_list'));
		}
	}

	function news_detail($type, $id) {
		$list = [
			"/images/cover3.jpg",
			"/images/cover2.jpg",
			"/images/image-5.jpg", 
		]; 
	
		$content = Post::where('id', $id)->first();
		if(!$content) {
			$content = (object) [
				'id' => '',
				'created_at' => date('Y-m-d'),
				'post_name_th' => '',
				'post_name_en' => '',
				'content_th' => '',
				'content_en' => '',
				'picture' => '',
			];
		}

		return view('news-detail', compact('list', 'content'));
	}

	function services(){   
		$post_list = [
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
		];

		foreach($post_list as $key => $type) {
			$number = 3;
			$select =Post::where('post_type', $type['id'])
			->orderBy('id','desc')
			->paginate($number);
			$select = json_decode(json_encode($select), true);
			$post_list[$key]['list'] = $select['data'];
		}
		return view('services', compact('post_list'));
	}

	function suthep() {
		$post_list = [
			'plants' => [
										'id' => 3,
										'detail_en' => '',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง',
									],
			'animals'=> [
										'id' => 4,
										'detail_en' => '',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
									],
			'fungus' => [
										'id' => 5,
										'detail_en' => '',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
									],
			'geology' =>[
										'id' => 6,
										'detail_en' => '',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
									],
			'culture' =>[
										'id' => 7,
										'detail_en' => '',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
									],
		];

		foreach($post_list as $key => $type) {
			$number = 3;
			$select =Post::where('post_type', $type['id'])
			->orderBy('id','desc')
			->paginate($number);
			$select = json_decode(json_encode($select), true);
			$post_list[$key]['list'] = $select['data'];
		}
	
		return view('suthep', compact('post_list'));
	}

	function empolyee($type)
	{
		$list = [
			"/images/cover3.jpg",
			"/images/cover2.jpg",
			"/images/image-5.jpg", 
		];

		$employee_list = [];
		if($type == 'administrator')  {
			$employee_list = [
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'รองศาสตราจารย์ ดร. ประสิทธิ์ วังภคพัฒนวงศ์',
					'name_en' => 'Assoc Prof Dr. Prasit Wangpakapattawong',
					'position_th' => 'หัวหน้าศูนย์ธรรมชาติวิทยาดอยสุเทพลิมพระเกียรติฯ',
					'position_en' => 'Head of Doi Suthep Nature Center',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'ผู้ช่วยศาสตราจารย์ ดร. พิมลรัตน์ เทียนสวัสดิ์',
					'name_en' => 'Asst. Prof. Dr. Pimonrat Tiansawat',
					'position_th' => 'รองหัวหน้าศูนย์ธรรมชาติวิทยาดอยสุเทพลิมพระเกียรติฯ',
					'position_en' => 'Deputy Head of Doi Suthep Nature Center',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'อาจารย์ ดร. นที ทองศิริ',
					'name_en' => 'Dr. Natee Tongsiri',
					'position_th' => 'ผู้ช่วยหัวหน้าศูนย์ธรรมชาติวิทยาดอยสุเทพเฉลิมพระเกียรติฯ',
					'position_en' => 'Assistant Head of Doi Suthep Nature Center',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'อาจารย์ ดร. เดีย พนิตนาถ แชนนอน',
					'name_en' => 'Dr. Dia Shannon',
					'position_th' => 'ผู้ช่วยหัวหน้าศูนย์ธรรมชาติวิทยาดอยสุเทพเฉลิมพระเกียรติฯ',
					'position_en' => 'Assistant Head of Doi Suthep Nature Center',
				],
			];
		} else if($type == 'staff') {
			$employee_list = [
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'นางสาวธารางกูร ปั้นเทียน',
					'name_en' => 'Ms.Tharangkul Phuntien',
					'position_th' => 'ฝ่ายบริหารทั่วไป',
					'position_en' => 'General Administration Departmen',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'นางสาวเอื้องอริน สายจันทร์',
					'name_en' => 'Ms.Oeungarin Saichan',
					'position_th' => 'ฝ่ายสื่อสารการตลาด',
					'position_en' => 'Marketing Communication Department',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'นายสุพจน์ อุ่นแก้ว',
					'name_en' => 'Mr. Supoj Aunkaew',
					'position_th' => 'ฝ่ายดิจิทัลครีเอทีฟ',
					'position_en' => 'Digital Creative Department',
				],
				[
					'img_path' => '/images/image-5.jpg',
					'name_th' => 'นายอุเทน ฟูศรี',
					'name_en' => 'Mr. Autian Fusri',
					'position_th' => 'ฝ่ายกายภาพ',
					'position_en' => 'Physical Facilities Department',
				],
			];
		} 
		return view('empolyee', compact('employee_list', 'type'));
	}
}
