<html>
    <head>
        <title>list</title>
    </head>
    <body>
        <h1>list</h1>
        @foreach ($coffees as $coffee)
        <p>店名:{{ $coffee->shop }}</p>
        <p>評価値:{{ $coffee->evaluation}}</p>
        <p>{{$coffee->date}}</p>
        <a href="{{ route('coffeeedit', ['id'=>$coffee->id]) }}">
            <img src="{{ asset($coffee->img) }}" alt="coffee_image">
        </a>
        <hr>
        @endforeach
    </body>
</html>