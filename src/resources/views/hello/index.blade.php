<html>
    <head>
        <title>Hello/Index</title>
        <style>
            body { font-size: 16px; color: #999; }
            h1 { font-size: 50px; text-align: right; color: #f6f6f6; margin: -20px 0px -30x 0px; letter-spacing: -4px; }
        </style>
    </head>
    <body>
        <h1>Blade/Index</h1>
        <p>ifディレクティブ</p>
        @if ($msg ?? '')
        <p>こんにちは、{{ $msg }}さん。</p>
        @else
        <p>何か書いてください。</p>
        @endif
        <p>issetディレクティブ</p>
        @isset ($msg)
        <p>Hello, {{ $msg }}!</p>
        @else
        <p>Please write something.</p>
        @endisset
        <form method="POST" action="/hello">
            {{ csrf_field() }}
            <input type="text" name="msg">
            <input type="submit">
        </form>
        <p>&#064;foreachディレクティブの例</p>
        <ol>
        @foreach($data as $item)
            <li>{{ $item }}</li>
        @endforeach
        </ol>
        <p>&#064;forディレクティブの例</p>
        <ol>
            @for($i =1; $i < 100; $i++ )
            @if($i % 2 == 1)
             @continue
            @elseif($i <= 10)
            <li>No, {{ $i }}</li>
            @else
             @break
            @endif
            @endfor
        </ol>
        <p>&#064;ループ変数</p>
        <ol>
            @foreach($data as $item)
            @if($loop->first)
            <p>※データ一覧</p>
                <ul>
            @endif
                  <li>No,{{ $loop->iteration}}. {{ $item }}</li>
                  @if($loop->last)
                </ul><p>−−ここまで</p>
                  @endif
            @endforeach
        <p>&#064;whileディレクティブの例</p>
        <ol>
            @php
                $counter = 0;
            @endphp
            @while($counter < count($data))
                <li>{{ $data[$counter]}}</li>
            @php
                $counter++
            @endphp
            @endwhile
        </ol>
        <p>MEMO: &#064;phpは必要最小限で使用する</p>
    </body>
</html>
