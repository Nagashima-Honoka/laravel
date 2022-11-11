<DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="max-w-content mx-auto">
            <form class="w-full max-w-lg p-10" action="{{ route('contact.complete') }}" method="GET"> <!-- post送信ができない！ -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <p class="border border-gray-200 rounded py-3 px-4 leading-tight block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            First Name
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <p class="border border-gray-200 rounded py-3 px-4 leading-tight block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Last Name
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <p class="border border-gray-200 rounded py-3 px-4 leading-tight block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Password
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 md:mb-0 -mx-3">
                    <p class="border border-gray-200 rounded py-3 px-4 leading-tight block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        State
                    </p>
                </div>
                <div class="flex mb-6">
                    <p class="border border-gray-200 rounded py-3 px-4 leading-tight block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Programming Language
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="history.back()">Back</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
