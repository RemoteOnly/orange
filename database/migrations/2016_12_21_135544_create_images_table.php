<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //存储product、article、comment的图片
        Schema::create('images',function (Blueprint $table){
            $table->increments('img_id')->comment('商品图片id');
            //$table->integer('pid')->comment('商品id');
            $table->string('imageable_type');//关联表
            $table->string('imageable_id');//关联表的id
            $table->string('path')->comment('图片的路径');

            $table->tinyInteger('is_main')->comment('是否为产品的主图');
            $table->tinyInteger('is_thumb')->comment('是否为文章的缩略图');
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
        Schema::dropIfExists('images');
    }
}
