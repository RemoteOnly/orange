<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsFullCutProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotions_full_cut_promotions',function(Blueprint $table){
            $table->increments('record_id')->comment('记录id');
            $table->integer('pm_id')->comment('促销活动id');
            $table->integer('pid')->comment('商品id');
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
        Schema::dropIfExists('promotions_full_cut_promotions');
    }
}
