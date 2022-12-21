<html>
    <head>
        <title>hello/Rest</title>
        <style>
            body { font-size: 16pt; color: #999; margin: 5px; }
            h1 { font-size: 50pt; text-align: right; color: #f6f6f6; margin: -20px 0px -30px 0px; letter-spacing: -4px; }
            th { background-color: #999; color: fff; padding: 5px 10px; }
            td { border: solid 1px #aaa; color: #999; padding: 5px 10px; }
            .content { margin: 10px; }
        </style>
        <body>
            <h1>Rest</h1>

            @include('rest.create')
            <!-- @include: 指定したテンプレートをその部分に出力するもの。これにより、他のところにあるテンプレートをこのWebページの中に組み込んで表示することができる -->

        </body>
    </head>
</html>
