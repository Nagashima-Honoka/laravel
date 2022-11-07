<html>
    <h1>No.2</h1>
    <p>contact</p>
    {{ $contact }}
    <p>{{ $contact1 }}</p>
    <h2>Form</h2>
    <form action="/form.php" method="post">
        <div>
            First name: <input type = "text" name = "first_name" />
            <br>
            Last name: <input type = "text" name = "last_name" />
        </div>
        <div>
            Description : <br />
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
</html>
