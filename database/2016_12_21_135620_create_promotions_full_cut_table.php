<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsFullCutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotions_full_cut',function (Blueprint $table){
            $table->increments('pm_id');
            $table->string('name')->comment('活动名称');
            $table->tinyInteger('type')->comment('类型：0-全场商品参与 1-部分商品参与 2-部分商品不参与');
            $table->dateTime('start_time')->comment('开始时间');
            $table->dateTime('end_time')->comment('结束时间');
            $table->tinyInteger('state')->comment('状态');
            $table->decimal('limit_money1')->comment('限制金额1');
            $table->decimal('cut_money1')->comment('优惠金额1');
            $table->decimal('limit_money2')->comment('限制金额2');
            $table->decimal('cut_money2')->comment('优惠金额2');
            $table->decimal('limit_money3')->comment('限制金额2');
            $table->decimal('cut_money3')->comment('优惠金额2');

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
        Schema::dropIfExists('promotions_full_cut');
    }
}
