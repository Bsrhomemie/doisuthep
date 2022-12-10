<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoisuthepDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doisuthep_dbs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['plant', 'animal']);
            $table->string('name');
            $table->string('common_name');
            $table->string('local_name');
            $table->string('scientific_name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doisuthep_dbs');
    }
}
