@extends('layouts.helloapp')

@section('title', 'Session')

@section('menubar')
 @parent
 セッションページ
@endsection

@section('content')
<!-- formからテキストを送信すると、それをセッションに保存し、保存された値を$session_dataに代入して表示する -->
    <p>{{ $session_data }}</p>
    <form action="/hello/session" method="post">
        {{ csrf_field() }}
        <input type="text" name="input">
        <input type="submit" name="send">
    </form>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
