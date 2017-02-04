<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionSuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotion_suit',function(Blueprint $table){
            $table->increments('pm_id');
            $table->string('name');
            $table->string('start_time1')->comment('开始时间1');
            $table->string('end_time1')->comment('结束时间1');
            $table->string('start_time2')->comment('开始时间2');
            $table->string('end_time2')->comment('结束时间2');
            $table->string('start_time3')->comment('开始时间3');
            $table->string('end_time3')->comment('结束时间3');
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
        Schema::dropIfExists('promotion_suit');
    }
}
