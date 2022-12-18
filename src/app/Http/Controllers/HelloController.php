<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->orderBy('age', 'asc')->get(); // whereなどの検索条件のメソッド, orderBy(), get()の順
        return view('hello.index', ['items'=> $items]);
    }

    public function post(Request $request) {
        $items = DB::select('select * from people');
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) { // 送信されたフォームの内容を元にレコードの作成を行う
        $param = [ // 送信されたフォーム値をもとに、$param変数を用意する
            'name' => $request->name, // 配列になっており、それぞれのフィールド名をキーとして値をまとめてある
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($param); // 配列$paramを引数に指定してinsertメソッドを呼び出す
        return redirect('/hello');
    }

    public function edit(Request $request) {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param); // 受け取ったIDのレコードをDB::selectで検索し、それをformという名前でテンプレートに渡す
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request) {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name=:name, mail=:mail, age=:age where id=:id', $param); // whereで設定するレコードの条件を指定することで、指定したIDのレコードの値が更新できる
        return redirect('/hello');
    }

    public function del(Request $request) {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param); // クエリ文字で渡されたIDパラメータの値を使ってレコードを取得、それをformに設定して表示する
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request) {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param); // whereを使い、指定したIDのレコードをdelete fromで削除する
        return redirect('/hello');
    }

    public function show(Request $request) {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }
}
