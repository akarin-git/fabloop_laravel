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
            $table->bigIncrements('id');
            $table->string('user_id')->comment('投稿ユーザーID');
            $table->string('category',200)->collate('utf8mb4_general_ci')->comment('カテゴリー');
            $table->string('title',200)->collate('utf8mb4_general_ci')->comment('タイトル');
            $table->longText('descriptionA')->collate('utf8mb4_general_ci')->comment('説明1');
            $table->longText('descriptionB')->collate('utf8mb4_general_ci')->nullable()->comment('説明2');
            $table->longText('descriptionC')->collate('utf8mb4_general_ci')->nullable()->comment('説明3');
            $table->longText('descriptionD')->collate('utf8mb4_general_ci')->nullable()->comment('説明4');
            $table->string('image_path',200)->nullable()->comment('画像');
            $table->string('public_id',200)->nullable()->comment('パブリックID');
            $table->string('web_page',200)->nullable()->comment('WEBページ');
            $table->string('materialA',100)->comment('材料1');
            $table->string('materialB',100)->nullable()->comment('材料2');
            $table->string('materialC',100)->nullable()->comment('材料3');
            $table->string('materialD',100)->nullable()->comment('材料4');
            $table->string('materialE',100)->nullable()->comment('材料5');
            $table->string('materialF',100)->nullable()->comment('材料6');
            $table->string('materialG',100)->nullable()->comment('材料7');
            $table->string('amountA',100)->comment('量1');
            $table->string('amountB',100)->nullable()->comment('量2');
            $table->string('amountC',100)->nullable()->comment('量3');
            $table->string('amountD',100)->nullable()->comment('量4');
            $table->string('amountE',100)->nullable()->comment('量5');
            $table->string('amountF',100)->nullable()->comment('量6');
            $table->string('amountG',100)->nullable()->comment('量7');
            $table->string('goodsA',100)->comment('道具1');
            $table->string('goodsB',100)->nullable()->comment('道具2');
            $table->string('goodsC',100)->nullable()->comment('道具3');
            $table->string('goodsD',100)->nullable()->comment('道具4');
            $table->string('goodsE',100)->nullable()->comment('道具5');
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
