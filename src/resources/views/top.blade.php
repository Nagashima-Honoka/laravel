<DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="max-w-content mx-auto flex flex-col items-center">
            <p class="text-4xl font-extrabold text-center text-gray-500 p-10">
               TOP PAGE
            </p>
            <div class="w-64">
                <a href="{{ route('logout') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Log Out</a>
            </div>
        </div>
    </body>
</html>
