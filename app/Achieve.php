<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achieve extends Model
{
    //
    public $timestamps = false;   //タイムスタンプなし → update_atとかつかないようにする
    protected $table = "stamp_data"; //接続するテーブルの指定

}
