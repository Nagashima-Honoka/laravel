@extends('layouts.helloapp')
<style>
    .pagination { font-size: 10pt; }
    .pagination li { display: inline-block; }
</style>

@section('title', 'Index')

@section('menubar')
 @parent
 インデックスページ
@endsection

@section('content')
 <table>
     <tr>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
     </tr>
        @foreach($items as $item)
        <tr>
         <td>{{ $item->name }}</td>
         <td>{{ $item->mail }}</td>
         <td>{{ $item->age }}</td>
        </tr>
        @endforeach
 </table>
 {{ $items->links() }}
 <!-- $itemsはsimplePaginateで取得したインスタンス
links()メソッドでイアkのようなタグが生成される
 <ul class="pagination">
    <li class="disabled"><span>&laquo; Previous</span></li>
    <li><a href="http://localhost:8000/hello?page=2" rel="next">Next &raquo;</a></li>
 </ul> -->
@endsection

@section('footer')
copyright 2017 tuyao.
@endsection
