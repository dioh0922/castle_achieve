<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    //
    public $timestamps = false;   //タイムスタンプなし → update_atとかつかないようにする
    protected $table = "login"; //接続するテーブルの指定

    public function auth_check($ID, $pass){
			$get_columm = DB::table("login")
											->select("pass", "accept")
											->where("userID", $ID)
											->first();

			if( (password_verify($pass, $get_columm->pass))
			&& ( ($get_columm->accept == 1) ) )
			{
        return true;
      }else{
        return false;
      }
    }
}
