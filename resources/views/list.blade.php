<html>
    <head>
        <title>list</title>
    </head>
    <body>
        <h1>list</h1>
        @foreach ($coffees as $coffee)
        <p>{{ $coffee->name }}</p>
        <p>評価値:{{ $coffee->evaluation}}</p>
        <img src="{{ $coffee->img }}" alt="coffee_image">
        @endforeach
    </body>
</html>