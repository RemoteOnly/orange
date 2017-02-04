<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
////return app_path('Http'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'Admin');
//    return view('admin.index');
//});

/*
 *
// 后台
Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',function (){
        return view('admin.login');
    });

    Route::get('/sign',function (){
        return view('admin.sign-up');
    });
});

//Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function (){
Route::group(['prefix'=>'admin'],function (){
    Route::get('/',function(){
        return view('admin.index');
    });



    Route::get('/form',function (){
        return view('admin.form');
    });

    Route::get('/table-list',function (){
        return view('admin.table-list');
    });

    Route::get('/table-list-img',function (){
        return view('admin.table-list-img');
    });

    Route::get('/tables',function (){
        return view('admin.tables');
    });

    Route::get('/chart',function (){
        return view('admin.chart');
    });

    Route::get('/calendar',function (){
        return view('admin.calendar');
    });
});
*/