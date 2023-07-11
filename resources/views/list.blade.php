<html>
    <head>
        <title>list</title>
    </head>
    <body>
        <h1>list</h1>
        <p>coffee_name {{ $coffee_data['coffee_name'] }}</p>
        <p>evaluation {{ $coffee_data['evaluation'] }}</p>
        <p>date {{ $coffee_data['date'] }}</p>
        <img src="{{ asset($coffee_data['img']) }}" alt="coffee_image">
    </body>
</html>