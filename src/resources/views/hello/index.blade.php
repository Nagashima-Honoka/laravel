@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <p>{{ $msg }}</p>
 @if(count($errors) > 0)
    <p>入力に問題があります。再入力してください。</p>
 @endif
 <table>
    <form action="/hello" method="POST">
     <!-- ifディレクティブで、$errors->has('項目名')をチェックする。hasはエラーが発生しているかをチェックするメソッド -->
     @if ($errors->has('msg'))
     <tr>
        <th>ERROR</th>
        <!-- $errors->first('項目名')で、指定した項目の最初のエラーメッセージを取得する -->
        <td>{{ $errors->first('msg') }}</td>
     </tr>
     @endif
     <tr>
        <th>Message:</th>
        <td>
            <input type="text" name="msg" value="{{ old('msg') }}">
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
