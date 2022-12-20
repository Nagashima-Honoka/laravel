<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $items = Board::all(); // 全レコード呼び出し
        return view('board.index', ['items' => $items]); // $itemsという変数に渡している
    }

    public function add(Request $request)
    {
        return view('board.add'); // 特に何の処理もせずテンプレートに返すだけ
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $board = new Board; // インスタンス作成
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save(); // 保存処理
        return redirect('/board');
    }
}