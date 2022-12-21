<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    use HasFactory;

    protected $table = 'restdata'; // テーブル名を指定するためのもの
    protected $guarded = array('id');

    public static $rules = array ( // バリデーションルールの設定
        'message' => 'required',
        'url' => 'required',
    );

    public function getData() { // テキスト出力
        return $this-> id . ':' . $this->message . '(' . $this->url . ')';
    }
}
