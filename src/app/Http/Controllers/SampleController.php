<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Contacts;

class SampleController extends Controller
{
    public function index(){
        $test = 'test';
        $test1 = 'test1';
        return view('sample', compact('test', 'test1' ));
    }

    public function __construct()
    {
        $this->contact = new Contacts();
    }

    public function contact(){
        $contact = 'contact';
        $contact1 = 'contact1';
        return view('contact', compact('contact', 'contact1' ));
    }

    public function confirm(Request $request, Response $response){
        // dd($request->input()['first_name']);
        $request->url(); // アクセスしたurl
        $request->fullUrl(); // クエリ付きのアクセスしたアドレス
        $request->path(); // ドメイン下のパス部分
        $response->status(); // ステータスコード
        $response->content(); // コンテンツの取得
        $response->setContent('値'); // 引数の値にコンテンツの値を変更する
        return view('confirm', compact('request', 'response'));
    }

    public function complete(Request $request){
        $register = $this->contact->InsertContent($request);
        return view('complete');
    }

}
