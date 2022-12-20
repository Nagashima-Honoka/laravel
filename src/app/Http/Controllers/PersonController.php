<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

    public function add(Request $request) {
        return view('person.add');
    }

    public function create(Request $request) {
        $this->validate($request, Person::$rules); // 1. バリデーションの実行
        $person = new Person; // 2. Personインスタンスの作成。バリデーションを通過したらモデルの保存作業を行う。
        $form = $request->all(); // 3. 値を用意する
        unset($form['_token']); // フォームに追加される表示フィールドの_tokenだけはunsetで削除しておく。_tokenという値はCSRF用非表示フィールドとして用意される値。これ自身は、テーブルにはないフィールドのため、あらかじめ削除いておく。
        $person->timestamps = false; // 「updated_atカラム」が無いとエラーが出たためタイムスタンプを無効にする
        $person->fill($form)->save(); // 4. インスタンスに値を設定して保存。fill()は、引数に用意されている配列の値をモデルのプロパティに代入するもの。フォームのようにまとまった値がある場合は、fill()を使うことで、個々のプロパティをまとめて設定できる。値が設定されたら、save()を呼び出してインスタンスを保存する。
        return redirect('/person');
    }

    public function edit(Request $request) {
        $person = Person::find($request->id); // Person::findを使ってidパラメータの値を取得
        return view('person.edit', ['form' => $person]); // formという値に設定
    }

    public function update(Request $request) {
        $this->validate($request, Person::$rules); // 1. バリデーションの実行
        $person = Person::find($request->id); // 2. Person::findでインスタンスを用意する。バリデーションを通過したらモデルの保存作業を行う。
        $form = $request->all(); // 3. 値を用意する
        unset($form['_token']); // フォームに追加される表示フィールドの_tokenだけはunsetで削除しておく。_tokenという値はCSRF用非表示フィールドとして用意される値。これ自身は、テーブルにはないフィールドのため、あらかじめ削除いておく。
        $person->timestamps = false; // 「updated_atカラム」が無いとエラーが出たためタイムスタンプを無効にする
        $person->fill($form)->save(); // 4. fill()で送信されたフォームの内容を反映し、save()を呼び出してモデルを更新する。
        return redirect('/person');
    }

    public function delete(Request $request) {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]); // Person::findで検索した値をそのままformという変数に設定してテンプレートに渡す
    }

    public function remove(Request $request) {
        Person::find($request->id)->delete(); // 2. Person::findで指定のIDのモデルを検索し、モデルのdeleteメソッドを呼び出して削除する。
        return redirect('/person');
    }
}
