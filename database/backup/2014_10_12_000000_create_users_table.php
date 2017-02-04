<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile');
            $table->tinyInteger('verify_email')->comment('是否邮箱验证');
            $table->tinyInteger('verify_mobile')->comment('是否手机验证');
            $table->dateTime('lift_ban_time')->comment('解禁时间');
            $table->integer('level_id')->default(0)->comment('用户等级id');

            $table->dateTime('last_visit_time')->comment('上次登录时间');
            $table->string('last_visit_ip')->comment('上次访问的ip');
            $table->string('register_ip')->comment('注册时的ip');
            $table->string('register_rg_id')->comment('注册区域');
            $table->tinyInteger('sex')->comment('性别， 0-男 1-女');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
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
