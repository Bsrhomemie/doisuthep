<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('kingdom')->nullable();
            $table->string('phylum')->nullable();
            $table->string('class')->nullable();
            $table->string('order')->nullable();
            $table->string('family')->nullable();
            $table->string('genus')->nullable();
            $table->string('species')->nullable();
            $table->text('characteristics_th')->nullable();
            $table->text('characteristics_en')->nullable();
            $table->text('behavior_th')->nullable();
            $table->text('behavior_en')->nullable();
            $table->text('habitat_th')->nullable();
            $table->text('habitat_en')->nullable();
            $table->text('food_th')->nullable();
            $table->text('food_en')->nullable();
            $table->text('conservation_status_th')->nullable();
            $table->text('conservation_status_en')->nullable();
            $table->text('references_th')->nullable();
            $table->text('references_en')->nullable();
            // define foreign key
            $table->foreignId('doisuthep_db_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
