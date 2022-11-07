<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-orange-500">No.2</h1>
        <p>contact</p>
        {{ $contact }}
        <p>{{ $contact1 }}</p>
        <h2>Form</h2>
        <form action="/form.php" method="post">
            <div>
                First name: <input type = "text" name = "first_name" />
                Last name: <input type = "text" name = "last_name" />
            </div>
            <div>
                Description :
                <textarea rows = "5" cols = "50" name = "description"></textarea>
            </div>
            <div>
                <input type = "checkbox" name = "maths" value = "on"> Maths
                <input type = "checkbox" name = "physics" value = "on"> Physics
            </div>
            <div>
                <input type = "radio" name = "subject" value = "maths"> Maths
                <input type = "radio" name = "subject" value = "physics"> Physics
            </div>
            <div>
                <select name = "dropdown">
                    <option value = "Maths" selected>Maths</option>
                    <option value = "Physics">Physics</option>
                </select>
            </div>
            <div>
                <input type = "file" name = "fileupload" accept = "image/*" />
            </div>
            <div>
                <input type = "submit" name = "submit" value = "Submit" />
            </div>
        </form>
    </body>
</html>
