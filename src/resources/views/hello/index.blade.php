@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <p>{{ $msg }}</p>
 <!-- $errorsという変数は、バリデーションで発生したエラーメッセージをまとめて管理するオブジェクト。バリデーションの機能によって組み込まれる。 -->
 @if(count($errors) > 0)
 <div>
    <ul>
<!-- $errors->all()はエラーメッセージを配列にまとめて取り出す -->
        @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
        @endforeach
    </ul>
 </div>
 @endif
 <table>
    <form action="/hello" method="POST">
     {{ csrf_field() }}
     <tr>
        <th>name:</th>
        <td>
            <!-- old('値'): 引数に指定した入力項目の古い値（現在の値が設定される前の値）を返す -->
            <input type="text" name="name" value="{{ old('name') }}">
        </td>
     </tr>
     <tr>
        <th>mail:</th>
        <td>
            <input type="text" name="mail" value="{{ old('mail') }}">
        </td>
     </tr>
     <tr>
        <th>age:</th>
        <td>
            <input type="text" name="age" value="{{ old('age') }}">
        </td>
     </tr>
     <tr>
        <th></th>
        <td>
            <input type="submit" value="send">
        </td>
     </tr>
    </form>
 </table>
@endsection

@section('footer')
copyright 2017 tuyao.
@endsection
