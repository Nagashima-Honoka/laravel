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
 <p>Controller value<br>'message' = {{ $message }}</p>
 <p>ViewComposer value<br>'view_message' = {{ $view_message }}</p>
@endsection

@section('footer')
copyright 2017 tuyao.
@endsection
