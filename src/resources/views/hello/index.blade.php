@extends('layouts.helloapp')
<style>
    .pagination { font-size: 10pt; }
    .pagination li { display: inline-block; }
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
</style>

@section('title', 'Index')

@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <table>
     <tr>
        <th><a href="/hello?sort=name">name</a></th>
        <th><a href="/hello?sort=mail">mail</a></th>
        <th><a href="/hello?sort=age">age</a></th>
     </tr>
        @foreach($items as $item)
        <tr>
         <td>{{ $item->name }}</td>
         <td>{{ $item->mail }}</td>
         <td>{{ $item->age }}</td>
        </tr>
        @endforeach
 </table>
 {{ $items->append(['sort' => $sort])->links() }}
 <!-- append()メソッドは、生成するリンクにパラメータを追加する
 引数の、['sort' => $sort]でsort=○○といったパラメータが追加された形でリンク先が設定されるようになる
 つまり、aタグのhrefに設定されるアドレスは、/hello?sort=○○&page=○○といったパラメータが追加された形でリンク先が設定されるようになる
 これにより、表示するページ番号とソートするフィールド名をクエリー文字列でサーバーに送ることができる -->
@endsection

@section('footer')
copyright 2017 tuyao.
@endsection
