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
		$content_list =  $select;
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
	
		$select = Post::where('id', $id)->first();
		$content = json_decode(json_encode($select), true);

		if(!$content) {
			$content =  [
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
										'detail_en' => '&nbsp &nbsp &nbsp &nbsp We can split the plants in the Doi Suthep  - Pui Natural Park into  4 groups the first being 
										<b>Deciduous Forests</b> that are found at the end of the parks. Plants usually include oak, birch, beech, aspen, elm, and maple. 
										<b>Mixed Forest</b> plants include various species of Bamboos, teak trees, Tabaek trees , and padauk. 
										<b>Dry Evergreen Forest</b> is found in valleys and the beginning of rivers such as the Montathan Waterfall, Sanpayang Waterfall, and Huay Mae Luad Waterfall, plants such as red rubber trees, Dipterocarpus alatus Roxb, Takhianthong, spur, the wild mahogany tree, and the Orchid tree. 
										<b>The Evergreen Forests</b> with important plants such as  Kao Pan tree, Kor Luad pannt, the Magnolia Liliifera plant, the Pierre plant, the Annesley Fragrans Wall Plant, the Strychnos axillaris Colebr plant.
										',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สังคมพืชในพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุยสามารถจำแนกออกเป็น 4 ประเภท ได้แก่ <b>ป่าเต็งรัง</b>  พบกระจายอยู่บริเวณรอบ ๆ ชายขอบของอุทยานฯ พืชพรรณส่วนใหญ่ประกอบด้วย เต็ง รัง เหียง พลวง พะยอม <b>ป่าเบญจพรรณ</b> มีไผ่ชนิดต่าง ๆ ขึ้นปะปนอยู่หลายชนิด พืชพรรณประกอบด้วย สัก ตะแบก ประดู่ <b> ป่าดิบแล้ง </b> พบกระจาย ตามบริเวณหุบเขา บริเวณต้นน้ำลำธาร เช่น บริเวณน้ำตกมณฑาธาร น้ำตกสันป่ายาง และห้วยแม่ลวด ฯลฯ ชนิดไม้ที่สำคัญได้แก่ ยางแดง ยางนา ตะเคียนทอง ก่อเดือย ก่อแดง มะไฟป่า เสี้ยวป่าดอกขาว <b>ป่าดิบเขา</b> พรรณไม้เด่นที่สำคัญได้แก่ ก่อแป้น ก่อเลือด ก่อนก มณฑาหลวง จำปีป่า สารภีดอย กำลังเสือโคร่ง',
									],
			'animals'=> [
										'id' => 4,
										'detail_en' => '&nbsp &nbsp &nbsp &nbsp The wildlife of Doi Suthep – Pui Natural Park is an endangered area, especially with the small and medium-sized mammals that are decreasing such as the barking dear, wild deers, and the gibbon, also some large animals have got extinct from this area for example wild elephants, bulls, bed bulls, and tigers. Currently, the animals that we can find in this area such as the wild pigs, civets, the bamboo rat, the ground squirrels, the splatter, the bats, various types of rats, the big-headed turtle, the salamander, snakes, frogs, and more than 300 species of birds such as the red-sided warbler, the Chinese francolin, the kingfisher bird, the blue magpie, the big dove, and the Taiga Flycatcher.',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp สัตว์ป่าในเขตอุทยานแห่งชาติดอยสุเทพ-ปุย จัดได้ว่าเป็นทรัพยากรที่อยู่ในสภาพวิกฤติ โดยเฉพาะอย่างยิ่งสัตว์เลี้ยงลูกด้วยนมขนาดเล็กและขนาดกลางมีจำนวนลดลงมาก เช่น เก้ง กวางป่า ลิง ชะนี ฯลฯ และสัตว์ขนาดใหญ่บางชนิดได้สูญพันธุ์ไปจากพื้นที่ เช่น ช้างป่า กระทิง วัวแดง และเสือ เป็นต้น ปัจจุบันสัตว์ป่าที่ยังคงพบเห็นในพื้นที่ได้แก่ หมูป่า อีเห็นเครือ อีเห็นข้างลาย เม่นหางพวง อ้นเล็ก กระจ้อน กระเล็นขน ปลายหูสั้น ค้างคาวมงกฏเล็ก หนูขนเสี้ยนดอย หนูท้องขาว เฒ่าปูลู กิ้งก่าหัวแดง งูสายม่านพระอินทร์ งูแส้หางม้าเทา อึ่งกรายหัวเล็ก และนกนานาชนิดกว่า 300 ชนิดเช่น นกกระจิบหญ้าสีข้างแดง นกกระทาทุ่ง นกกระเต็นน้อย นกขุนแผน นกเขาใหญ่ นกจับแมลงคอแดง เป็นต้น',
									],
			'fungus' => [
										'id' => 5,
										'detail_en' => '&nbsp &nbsp &nbsp &nbsp <b>Microorganisms</b> are small living things that we cant see with our naked eyes. Mold is a type of Microorganisms that includes yeast, mushrooms, and also strips. Both of these organisms have important roles because they are the decomposers in the ecosystem and nature. In Doi Suthep – Pui Natural Park we can find these groups of Microorganisms and fungi in every type of forests such as Muscodor suthepensisi, the Marasmius, and the Egg Mushroom.',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp <b>จุลินทรีย์</b> เป็นสิ่งมีชีวิตเล็ก ๆ ที่ไม่สามารถมองเห็นได้ด้วยตาเปล่า เชื้อรา เป็นกลุ่มของจุลินทรีย์ซึ่งรวมถึงยีสต์ ราเห็ด และเชื้อราที่มีเส้นใย ทั้งสองมีบทบาทสำคัญโดยเป็นผู้ย่อยสลายในธรรมชาติและสิ่งแวดล้อม ในเขตอุทยานแห่งชาติดอยสุเทพ-ปุย สามารถค้นพบสังคมจุลินทรีย์และฟังไจได้ทุกสภาพป่า เช่น Muscodor suthepensis เห็ดร่มก้านดำ เห็ดไข่ เป็นต้น',
									],
			'geology' =>[
										'id' => 6,
										'detail_en' => '&nbsp &nbsp &nbsp &nbsp The geography of Doi Suthep – Pui Natural Park were high mountains within the Thanon Thong Chai mountain range that came from the Himalayas the elevation is between 330 – 1,685 meters above sea level, with the peak of Doi Pui being the highest part. This mountain consists of Igneous rocks, mostly granites and also metamorphic rocks. The mountain range is an important start of many rivers in Chaing Mai city, and the surrounding areas such as Mae Lim, Hang Dong, Sa Mueng, Mae Tang with important creeks such as Tueng Tai, Kaew, Chang Kean, Pong Noi, Mae Hue, Mae NaSai, Mae Pon.',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp ลักษณะของพื้นที่อุทยานแห่งชาติดอยสุเทพ-ปุย เป็นภูเขาสูงสลับซับซ้อนอยู่ในแนวเทือกเขาถนนธงไชยที่สืบเนืองต่อจากเทือกเขาหิมาลัย ความสูงของพื้นที่อยู่ระหว่าง 330-1,685 เมตรจากระดับน้ำทะเล โดยมียอดดอยปุยเป็นจุดที่สูงที่สุด ลักษณะโครงสร้างทางธรณีโดยทั่วไปประกอบด้วย หินอัคนี ชนิดที่สำคัญได้แก่ หินแกรนิต นอกจากนี้ยังมีหินชั้นหินแปร เป็นแหล่งต้นน้ำลำธารที่สำคัญของตัวเมืองเชียงใหม่ และพื้นที่บางส่วนของอำเภอรอบ ๆ ได้แก่ อำเภอแม่ริม อำเภอหางดง อำเภอสะเมิง และอำเภอแม่แตง มีลำห้วยที่สำคัญได้แก่ ห้วยตึงเฒ่า ห้วยแม่หยวก ห้วยแก้ว ห้วยช่างเคี่ยน ห้วยปงน้อย ห้วยแม่เหียะ ห้วยแม่นาไทร และห้วยแม่ปอน เป็นต้น',
									],
			'culture' =>[
										'id' => 7,
										'detail_en' => '&nbsp &nbsp &nbsp &nbsp Doi Suthep has many names such as “Doi Kala” which in thai means the Crows have left, and don’t want to stay here another name is “Doi Oi Chang ” or “Uj Bunpot”. Oi means bamboo due to in the past there were a lot of bamboos. The word “Doi Suthep ” is the name of a hermit that came to be an ascetic in a cave in the period of the 11 – 12 Century B.E. his name was “Suthewa Reu see” or “Reu see wasuthep” later gone missing so all the villagers named this place   “ Doi Suthep ” currently Doi Suthep has many mountain tribes such as  Hmong, Yao people, Akha people, and Lishu they also have some important traditions such as the tradition of walking up Doi Suthep to worship Doi Suthep pagoda also Lanna culture such as “Leang Dong” or Worshipping Ghosts',
										'detail_th' => '&nbsp &nbsp &nbsp &nbsp ดอยสุเทพมีชื่อเรียกกันหลายชื่อ เช่น “ดอยกาละ” หมายถึง อีกาทิ้งละไม่กล้าอยู่หรือไม่มีอีกา อีกชื่อ คือ “ดอยอ้อยช้าง” หรือ “อุฉจบรรต” คำว่า อ้อย หมายถึง ไม้ไผ่ เนื่องจากอดีตมีไผ่อยู่เยอะ ส่วนชื่อว่า “ดอยสุเทพ” โดยเรียกตามชื่อของ ฤาษีตนหนึ่ง ซึ่งมาสร้างพรตบำเพ็ญตะบะ อยู่ ณ ถ้ำฤาษี เมื่อราวพุทธศตวรรษที่ 11-12 นามว่า “สุเทวฤาษี” หรือ “ฤาษีวาสุเทพ” ภายหลังได้หายสาบสูญไปอย่างลึกลับ คนทั้งหลายจึงเรียกชื่อดอยนี้ว่า “ดอยสุเทพ” ปัจจุบันดอยสุเทพมีหมู่บ้านชาวเขาเผ่าต่าง ๆ ได้ เช่น ชาวม้ง เย้า อาข่า ลีซอ มูเซอ เป็นต้น มีงานประเพณีที่สำคัญ ได้แก่ งานประเพณีเตียวขึ้นดอยเพื่อสักการะพระธาตุดอยสุเทพฯ และประเพณีเลี้ยงดง” หรือ “ผีปู่แสะย่าแสะ',
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
