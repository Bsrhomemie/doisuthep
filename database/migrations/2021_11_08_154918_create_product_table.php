<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration 
{
    /**TypeName
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_table', function (Blueprint $table) {
            $table->id();
            $table->text('name_th');
            $table->text('name_en');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->boolean('status');
            $table->text('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_table');
    }
}
