<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBrowseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_browse_histories',function(Blueprint $table){
            $table->increments('record_id')->comment('记录id');
            $table->integer('uid')->comment('用户id');
            $table->integer('pid')->comment('商品id');
            $table->integer('time')->comment('访问次数');
            $table->dateTime('update_time')->comment('最后一次访问时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user_browse_histories');
    }
}
