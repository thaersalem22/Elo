<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Hello ,{{$name}} </h1>
    <form action="about" method="post">
        @csrf
        <input type="text" name="name" id="name"><br><br>
        <select name="department" id="department">
            @foreach($departments as $key => $department )
            <option value="{{$department}}" >{{$department}}</option>


            @endforeach
            
            
        </select><br><br>
        <input type="submit" value="send">
    </form>
</body>
</html>