<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use \App\Achieve;
use \App\Castle;
use \App\Login;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;

class PagesController extends Controller
{
    //
    public function index(){
      $select_list = Achieve::all();
      //画像名からファイルのパスとしてビューに渡す
      foreach($select_list as $list){
        $path = "profile_images/".$list->stamp_name;
        $list->img_path = $path;

        //画像ファイルが存在するか判定し、表示するか決定
        if(File::exists($path)){
          $list->img_exist = true;
        }else{
          $list->img_exist = false;
        }
      }

      return  view("Pages.main", [
        //"is_image" => $is_image,
        "achieve_list" => $select_list
      ]);
    }

    //登録ページへの指定
    public function castle_record(){

      //ログインしてれば登録画面に、してなければログイン画面に入れる
      if(session("login") != "admin"){
        return redirect("login");
      }

    //データベースから行ってない残りのリストを取得
      $yet     = Castle::select()
              ->leftJoin("stamp_data", "name", "=", "castle_name")
              ->whereNull("stamp_name")
              ->get();

      return view("Pages.record", ["list_data" => $yet]);
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
      //$castle->date = $request->date;
      $castle->save();

      session()->forget("login");

      return redirect("record")->with("success","登録完了");
    }

    //実績一覧用ページ、名前と画像を一覧表示する
    public function achieve(){
      //地図上にプロットしていく等の表示をさせる
      return view("Pages.achieve");
    }

    //DBからajaxでget
    public function castle_data(){
      //$all = Catsle::all();
      //行った城を実績から抽出する
      $already = Castle::select()
              ->join("stamp_data", "name", "=", "castle_name")
              ->get();

      //行ってない残りのリストを取得
      $yet     = Castle::select()
              ->leftJoin("stamp_data", "name", "=", "castle_name")
              ->whereNull("stamp_name")
              ->get();

      return response()->json([
        "already" => $already,
        "yet" => $yet
      ]);
    }

    //ログイン情報の入力画面
    function login(){
      return view("Pages.login");
    }

    //入力データの判定
    function login_check(Request $request){

      $login_user = new Login;
      $accept = $login_user->auth_check($request->login_id, $request->login_pass);

      if($accept == true){
        //セッションを開始する
        session(["login" => "admin"]);
        return redirect("record");
      }else{
        return redirect("login")->with("login_failed", "ID・パスワードが間違っています");;
      }
    }

    //ログアウト処理 セッションを消しておく
    function logout(){
      session()->forget("login");
      return redirect("index");
    }
}
