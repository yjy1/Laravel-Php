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

//无限制
Route::group(['middleware' => ['web'] ], function () {
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::any('/login', 'Home\LoginController@login');
    Route::get('/register', 'Home\LoginController@register');
    Route::post('/handle_reg', 'Home\LoginController@handle_reg');
});


//前端页面未登录用户不可进入
Route::group(['middleware' => ['web','home.login'] ], function () {
    Route::get('/', 'Home\IndexController@index');
    Route::get('/cate', 'Home\IndexController@cate');
    Route::get('/article/{id}', 'Home\IndexController@article');
    Route::post('/comm', 'Home\IndexController@comm');
    Route::get('home/logout', 'Home\IndexController@logout');
    Route::any('home/push', 'Home\IndexController@push');
    Route::any('home/nav/{id}', 'Home\IndexController@nav');

});

//后台页面未登录用户不可进入
Route::group(['middleware' => ['web', 'admin.login'],
    'prefix' => 'admin', 'namespace' => 'Admin'],
    function () {
        Route::get('index', 'IndexController@index');
        Route::get('info', 'IndexController@info');
        Route::get('quit', 'LoginController@quit');
        Route::any('pass', 'IndexController@pass');
        //分类资源路由
        Route::resource('category', 'CategoryController');
        //文章
        Route::resource('article', 'ArticleController');
        //友情链接
        Route::resource('links', 'LinksController');
        //导航
        Route::resource('navs', 'NavsController');
        //网站配置
        Route::resource('conf', 'ConfController');
        //将网站配置写入配置文件  Route::any('pass','IndexController@pass');
        Route::get('putfile', 'ConfController@putFile');
    });
