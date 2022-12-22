<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request) {
        // $sql = Person::where('id' , 1)
        // ->toSql();
        // var_dump($sql);
        $user = Auth::user(); // ログインしているユーザーのモデルインスタンス(Authでは、Userというモデルクラスが用意されている)を返す。ログインしていなければnull
        $sort = $request->sort;
        // $sort = $request->sort; は、if文より上に記述する。下にかくと以下のようなエラーが出る
        // SQLSTATE[42S22]: Column not found: 1054 Unknown column '' in 'order clause' (SQL: select * from `people` where `age` > 30 order by `` asc limit 6 offset 0)
        if(!$request->sort) {
            $sort = 'id';
        } else {
            $sort = $request->sort;
        }
        $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $param = ['items'=> $items, 'sort'=> $sort, 'user' => $user];
        return view('hello.index', $param);
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
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param); // peopleテーブルのビルダを取得し、whereで送信されたID番号のレコード指定。さらに、updateメソッドを呼び出し、引数にフォームから送られた値を配列にまとめて指定する。これで指定のレコードが書き換えられる。
        return redirect('/hello');
    }

    public function del(Request $request) {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request) {
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    public function show(Request $request) {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }

    public function rest(Request $request) {
        return view('hello.rest');
    }

    public function ses_get(Request $request) { // /hello/sessionにアクセスした時の処理
        $sesdata = $request->session()->get('msg'); // セッションからmsgという値を取り出している
        return view('hello.session', ['session_data' => $sesdata]); // 取り出した値をsession_dataという名前でテンプレートに渡す
    }

    public function ses_put(Request $request) { // /hello/sessionにformをPOST送信した時の処理
        $msg = $request->input; // $request->inputの値を取り出す
        $request = session()->put('msg', $msg); // 取り出した値をmsgという名前でセッションに保管する
        return redirect('hello/session');
    }

    public function getAuth(Request $request) {
        $param = ['message' => 'ログインしてください。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) { // 送信されたフォームの値でログインの処理を行う
            $msg = 'ログインしました。（' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
    }

}
