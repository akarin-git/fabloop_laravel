<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->string('name', 100)->collate('utf8mb4_general_ci')->comment('名前');
            $table->string('email', 100)->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "users COMMENT 'ユーザー'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
