<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categories',function(Blueprint $table){
            $table->increments('cate_id');
            $table->string('name');
            $table->string('price_range')->comment('价格范围 用,分割区间');
            $table->integer('parent_id')->comment('父id');
            $table->tinyInteger('layer')->comment('级别');
            $table->tinyInteger('has_child')->comment('是否有子节点');
            $table->string('path')->comment('路径');

            $table->integer('order')->comment('排序');
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
        //
        Schema::dropIfExists('categories');
    }
}
