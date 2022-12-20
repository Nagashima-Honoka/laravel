@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <table>
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
        <td>
            @if($item->board != null)
             {{ $item->board->getData() }}
             <!-- Personモデルにboardメソッドを追加した
             メソッドだから、本来は$item->board()となるはず
             リレーションの設定を行った場合、このように$this->boardというプロパティとして扱えるようになる
             このboardプロパティには、関連づけられたBoardモデルのインスタンスが入っている。そこから必要な情報を取り出して利用できる -->
            @endif
        </td>
    </tr>
    @endforeach
 </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
