<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use \App\Achieve;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;

class PagesController extends Controller
{
    //
    public function index(){
      return view("Pages.main", [
        "sqlResult" => Achieve::all()
      ]);
    }

    public function castle_record(){
      $is_image = false;
      //ファイルがあるなら表示させる
      //Storageからファイルをとるにはstorage/app/publicにリンクさせる
      //リンクしていないと以下の場所を参照しに行く
      //「laravel_test/storage/app/public」 ここにあるか？
/*
      if(Storage::disk("local")->exists("public/profile_images/test.png") ){
        $is_image = true;
      }
*/
      //アップロード側を先に見に行く、ファイルがあれば表示する
      if(File::exists("profile_images/test.png")){
        $is_image = true;
      }

      return view("Pages.record", ["is_image" => $is_image]);
    }
    //画像アップロード用　リクエストから画像ファイルをとって保存する
    public function img_upload(ProfileRequest $request){
      $f_name = $request->name . ".png";
      //ファイル名を指定してパスに保存
      //「C:\xampp\htdocs\laravel_test\public\profile_images」に指定
      $request->photo->move("profile_images",$f_name);

      //データベースに名前と画像と日時を記録する
      $castle = new Achieve;
      $castle->stamp_name = $f_name;
      $castle->castle_name = $request->name;
      $castle->date = $request->date;
      $castle->save();

      return redirect("record")->with("success","登録完了");
    }

    //実績一覧用ページ、名前と画像を一覧表示する
    public function achive(){
      $is_image = false;

      if(File::exists("profile_images/test.png")){
        $is_image = true;
      }

      return  view("Pages.achive", ["is_image" => $is_image]);
    }
}
