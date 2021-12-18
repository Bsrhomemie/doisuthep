<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('post_name_th')->nullable();
            $table->text('post_name_en')->nullable();
            $table->text('post_type')->nullable();
            $table->text('content_th')->nullable();
            $table->text('content_en')->nullable();
            $table->date('created_at')->nullable();
            $table->text('picture')->nullable();
            $table->text('pdf')->nullable();
            $table->text('uniqid')->nullable();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
