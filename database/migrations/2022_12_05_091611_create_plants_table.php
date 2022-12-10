<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('kingdom')->nullable();
            $table->string('division')->nullable();
            $table->string('class')->nullable();
            $table->string('order')->nullable();
            $table->string('family')->nullable();
            $table->string('genus')->nullable();
            $table->string('species')->nullable();
            $table->text('stem_th')->nullable();
            $table->text('stem_en')->nullable();
            $table->text('leaf_th')->nullable();
            $table->text('leaf_en')->nullable();
            $table->text('flower_th')->nullable();
            $table->text('flower_en')->nullable();
            $table->text('fruit_th')->nullable();
            $table->text('fruit_en')->nullable();
            $table->text('distribution_th')->nullable();
            $table->text('distribution_en')->nullable();
            $table->text('utilization_th')->nullable();
            $table->text('utilization_en')->nullable();
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
        Schema::dropIfExists('plants');
    }
}
