<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')->unique()->comment('投稿ID');
            $table->string('material_one',100)->comment('材料1');
            $table->string('material_twe',100)->nullable()->comment('材料2');
            $table->string('material_three',100)->nullable()->comment('材料3');
            $table->string('material_four',100)->nullable()->comment('材料4');
            $table->string('material_five',100)->nullable()->comment('材料5');
            $table->string('material_six',100)->nullable()->comment('材料6');
            $table->string('material_seven',100)->nullable()->comment('材料7');
            $table->string('amount_one',100)->comment('量1');
            $table->string('amount_twe',100)->nullable()->comment('量2');
            $table->string('amount_three',100)->nullable()->comment('量3');
            $table->string('amount_four',100)->nullable()->comment('量4');
            $table->string('amount_five',100)->nullable()->comment('量5');
            $table->string('amount_six',100)->nullable()->comment('量6');
            $table->string('amount_seven',100)->nullable()->comment('量7');
            $table->string('goods_one',100)->comment('道具1');
            $table->string('goods_twe',100)->nullable()->comment('道具2');
            $table->string('goods_three',100)->nullable()->comment('道具3');
            $table->string('goods_four',100)->nullable()->comment('道具4');
            $table->string('goods_five',100)->nullable()->comment('道具5');
            $table->timestamps();

            $table->foreign('post_id')
                  ->references('id')
                  ->on('post_images')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
     DB::statement("ALTER TABLE " . DB::getTablePrefix() . "recipes COMMENT 'レシピ'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
