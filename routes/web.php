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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'address'], function () {   // railsのmember doみたいな
    Route::get('index', 'CrudController@getIndex');    // 一覧
    Route::get('new', 'CrudController@new_index');    // 入力
    Route::patch('new','CrudController@new_confirm'); // 確認
    Route::post('new', 'CrudController@new_finish');  // 完了
});