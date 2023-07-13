<html>
    <head>
        <title>list</title>
    </head>
    <body>
        <h1>list</h1>
        @foreach ($coffees as $coffee)
        <p>{{ $coffee->name }}</p>
        @endforeach
    </body>
</html>