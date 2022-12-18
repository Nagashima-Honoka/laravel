<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        if(isset($request->id)) {
            $param = ['id' => $request->id]; // ['id' => パラメータ]
            $items = DB::select('select * from people where id = :id', $param); // :id = パラメータの値をはめ込むプレースホルダ（値を確保しておく場所のこと）
        } else {
            $items = DB::select('select * from people');
        }
        return view('hello.index', ['items'=> $items]);
    }

    public function post(HelloRequest $request) {
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }
}
