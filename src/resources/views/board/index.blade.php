@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
 @parent
 ボード・ページ
@endsection

@section('content')
 <table>
    <tr>
        <th>Message</th>
        <th>Name</th>
    </tr>
    @foreach($items as $item)
    <!-- 取得したBoardのmessageと、そのperson内にあるnameを一覧表示する -->
    <tr>
        <td>{{ $item->message }}</td>
        <td>{{ $item->person->name }}</td>
    </tr>
    @endforeach
 </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
