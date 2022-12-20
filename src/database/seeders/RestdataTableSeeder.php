<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restdata; // Restdataモデルクラスを使ってレコードを作成

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [ // 保存する値を連想配列にまとめておく
            'message' => 'Google Japan',
            'url' => 'https://www.google.co.jp',
        ];
        $restdata = new Restdata; // インスタンス作成
        $restdata->fill($param)->save(); // 連想配列の値を適用する。save()で保存。
        $param = [
            'message' => 'Yahoo Japan',
            'url' => 'https://www.yahoo.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        $param = [
            'message' => 'MSN Japan',
            'url' => 'https://www.msn.com/jp-jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
    }
}
