<DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="max-w-content mx-auto">
            <h1>No.1</h1>
            <p>sample</p>
            {{ $test }}
            <p>{{ $test1 }}</p>
            <p>エスケープ処理されなくなり、HTMLタグなどはそのままタグとして機能する → {{!! $test1 !!}}</p>
        </div>
    </body>
</html>
