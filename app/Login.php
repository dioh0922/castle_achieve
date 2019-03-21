<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    public $timestamps = false;   //タイムスタンプなし → update_atとかつかないようにする
    protected $table = "login"; //接続するテーブルの指定

    public function auth_check($ID, $pass){
      $get_columm = Login::select("accept")
                      ->where("userId", $ID)
                      ->where("pass", $pass)
                      ->first();

      if( (!empty($get_columm->accept))
      &&  ($get_columm->accept == 1) ){
        return true;
      }else{
        return false;
      }
    }
}
