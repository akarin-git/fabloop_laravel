<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('投稿ユーザーID');
            $table->string('category',200)->collate('utf8mb4_general_ci')->comment('カテゴリー');
            $table->string('title',200)->collate('utf8mb4_general_ci')->comment('タイトル');
            $table->longText('description')->collate('utf8mb4_general_ci')->comment('説明');
            $table->string('image_path',200)->comment('画像');
            $table->string('public_id',200)->comment('パブリックID');
            $table->string('web_page',200)->nullable()->comment('WEBページ');
            $table->timestamps();
        });
       DB::statement("ALTER TABLE " . DB::getTablePrefix() . "post_images COMMENT '投稿画像'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_images');
    }
}
