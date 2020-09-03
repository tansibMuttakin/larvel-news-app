<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->string('main_img');
            $table->string('thumb_img');
            $table->string('list_img');
            $table->integer('view_count');
            $table->integer('hot_news');
            $table->integer('status');
            $table->integer('created_by');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
