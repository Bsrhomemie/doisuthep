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
			$post_list[$key] = Post::where('post_type', $type['id'])
			->orderBy('id','desc')
			->paginate($number);
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
			  'name' =>	'พืช',
			],
			'animals' => [ 
			  'id' =>	4,
			  'name' =>	'สัตว์',
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

		$content_list = Post::where('post_type', $type_id)->get();
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
		$topic_name = [
			'box-exhibition', 'box-learning', 'box-tree', 'box-seed', 'box-research', 'box-activities'
		];

	
		
		$post_list = [
			[
				'topic' => 'exhibition',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
			[
				'topic' => 'learning',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
			[
				'topic' => 'tree',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
			[
				'topic' => 'seed',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
			[
				'topic' => 'research',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
			[
				'topic' => 'activities',
				'detail' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง ',
			],
		];
		return view('services', compact('data_topic', 'topic_name'));
	}

	function suthep() {
		$topic_name = [
			'plants', 'animals', 'fungus', 'geology', 'culture'
		];  
		
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
			$array = [Post::where('post_type', $type['id'])
			->orderBy('id','desc')
			->paginate($number)];
			$post_list[$key]['list'] = $array;
		}
		var_dump($post_list['animals']['list']->post_name_th);
		die();
		return view('suthep', compact('post_list'));
	}

	function empolyee($type)
	{
		$list = [
			"/images/cover3.jpg",
			"/images/cover2.jpg",
			"/images/image-5.jpg", 
		];
		return view('empolyee', compact('list', 'type'));
	}
}
