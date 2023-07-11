<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Home</h1>
        <p>coffee_name {{ $coffee_data['coffee_name'] }}</p>
        <p>evaluation {{ $coffee_data['evaluation'] }}</p>
        <p>date {{ $coffee_data['date'] }}</p>
        <img src="{{ asset($coffee_data['img']) }}" alt="coffee_image">
    </body>
</html>