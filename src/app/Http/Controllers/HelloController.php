<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->get();
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
        $param = [ // 送信フォームの値を保管
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param); // $parmの配列をパラメータ引数のして、DB::insertを呼び出す
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
        $id = $request->id;
        $items = DB::table('people')->where('id', '<=', $id)->get(); // idの値が、クエリ文字列として渡されたidパラメータ以下のものを検索する
        return view('hello.show', ['items' => $items]);
    }
}
