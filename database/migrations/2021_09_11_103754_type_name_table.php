<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class TypeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_name', function (Blueprint $table) {
            $table->id();
            $table->string('type_name_th');
            $table->string('type_name_en');
        });



        #Insert Type name
        DB::table('type_name')->insert([
            ['type_name_th' => 'news', 'type_name_en' => 'ข่าวประชาสัมพันธ์'],
            ['type_name_th' => 'articles', 'type_name_en' => 'บทความ'],
            ['type_name_th' => 'plants', 'type_name_en' => 'พืชดอยสุเทพ'],
            ['type_name_th' => 'animals', 'type_name_en' => 'สัตว์ป่าดอยสุเทพ'],
            ['type_name_th' => 'fungus', 'type_name_en' => 'จุลินทรีย์และฟังไจ'],
            ['type_name_th' => 'geology', 'type_name_en' => 'ธรณีวิทยา'],
            ['type_name_th' => 'culture', 'type_name_en' => 'สังคมและวัฒนธรรม'],
            ['type_name_th' => 'exhibition', 'type_name_en' => 'นิทรรศการดอยสุเทพ'],
            ['type_name_th' => 'learning', 'type_name_en' => 'กิจกรรมเรียนรู้ธรรมชาติ'],
            ['type_name_th' => 'tree', 'type_name_en' => 'เรือนเพาะชำกล้าไม้ท้องถิ่น'],
            ['type_name_th' => 'seed', 'type_name_en' => 'ห้องปฏิบัติการธนาคารเมล็ด'],
            ['type_name_th' => 'research', 'type_name_en' => 'งานวิจัยและฐานข้อมูล'],
            ['type_name_th' => 'activities', 'type_name_en' => 'พื้นที่จัดกิจกรรม'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('type_name');
    }
}
