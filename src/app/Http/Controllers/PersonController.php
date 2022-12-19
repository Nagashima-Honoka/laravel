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
        $item = Person::where('name', $request->input)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

}
