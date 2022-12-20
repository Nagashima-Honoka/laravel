<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request){
        $items = Person::all(); // 全レコードを取得。取得されたレコードはIlluminate\Database\Eloquent名前空間のCollectionクラスのインスタンスとして得られる。Collectionクラスはレコード管理専用のコレクションクラス。
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request) { // /findにGETアクセスした時の処理
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request) { // POST送信された時の処理
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first(); // ageGreaterThan = ○○以上, ageLessThan = ○○以下
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

}
