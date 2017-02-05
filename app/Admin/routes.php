<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {
    $router->get('/index', 'HomeController@index')->name('index');

    //商品管理
    $router->resource('product', 'ProductController');
    //分类管理
    $router->get('category/delete/{cate_id}','BrandController@delete')->name('category.delete');
    $router->resource('category', 'CategoryController');
    //品牌管理
    $router->resource('brand', 'BrandController');
    //属性管理
    $router->resource('attribute','AttributeController');
});
