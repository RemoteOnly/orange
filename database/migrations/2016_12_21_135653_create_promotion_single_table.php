<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionSingleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotion_single',function(Blueprint $table){
            $table->increments('pm_id');
            $table->string('name')->comment('名称');
            $table->integer('pid')->comment('促销活动id');
            $table->dateTime('start_time1')->comment('开始时间1');
            $table->dateTime('end_time1')->comment('结束时间1');
            $table->dateTime('start_time2')->comment('开始时间2');
            $table->dateTime('end_time2')->comment('结束时间2');
            $table->dateTime('start_time3')->comment('开始时间3');
            $table->dateTime('end_time3')->comment('结束时间3');

            $table->string('slogan')->comment('广告语');
            $table->tinyInteger('discount_type')->comment('折扣类型 0-折扣,1-直降');
            $table->decimal('discount_value')->comment('折扣值');

            $table->tinyInteger('state')->comment('状态');
            $table->timestamps();
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
        Schema::dropIfExists('promotion_single');
    }
}
