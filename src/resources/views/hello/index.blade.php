<!-- layoutsフォルダ内のhelloappファイルをロードし、親レイアウトとして継承する -->
@extends('layouts.helloapp')

<!-- @section('セクション名', 'テキスト・数字など') -->
@section('title', 'Index')

<!-- section ~ endsection -->
@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <p>ここが本文のコンテンツです。</p>
 <table>
    @foreach($data as $item)
    <tr>
        <th>{{ $item['name'] }}</th>
        <td>{{ $item['mail'] }}</td>
    </tr>
    @endforeach
 </table>
@endsection

@section('footer')
copyright 2017 tuyao.
@endsection
