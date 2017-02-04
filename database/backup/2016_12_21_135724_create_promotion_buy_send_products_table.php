<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionBuySendProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotion_buy_send_products',function(Blueprint $table){
            $table->increments('pm_id');
            $table->string('name')->comment('名称');
            $table->dateTime('start_time')->comment('开始时间');
            $table->dateTime('end_time')->comment('结束时间');
            $table->tinyInteger('buy_count')->comment('购买数量');
            $table->tinyInteger('send_count')->comment('赠送数量');

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
        Schema::dropIfExists('promotion_buy_send_products');
    }
}
