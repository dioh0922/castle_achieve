<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//メインページ
Route::get("index", "PagesController@index");
//記録用ページ
Route::get("record", "PagesController@castle_record");

//実績一覧用ページ
Route::get("achieve", "PagesController@achieve");

//DBから城情報取得
Route::get("castle_data", "PagesController@castle_data");

//画像アップロード
Route::post("img_up",[
  "uses" => "PagesController@img_upload",
  "as" => "Pages.upload"
]);
