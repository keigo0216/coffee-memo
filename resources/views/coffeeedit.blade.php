<html>
    <head>detail</head>
    <body>
        <h1>detail</h1>
        <p>店名:{{ $coffee->shop }}</p>
        <p>評価値:{{ $coffee->evaluation}}</p>
        <p>{{$coffee->date}}</p>
        <img src="{{ asset($coffee->img) }}" alt="coffee_image">
        <p>抽出方法:{{ $brewing_method }}</p>
        <p>国:{{ $country }}</p>
        <p>飲み方:{{ $way_to_drink }}</p>
        <p>名前:{{ $coffee->name }}</p>
        <p>ロースト度合い:{{ $coffee->roast_level }}</p>
        <p>香りの強さ:{{ $coffee->scent_level }}</p>
        <p>苦味の強さ:{{ $coffee->bitterness_level }}</p>
        <p>酸味の強さ:{{ $coffee->acidity_level }}</p>
        <p>甘みの強さ:{{ $coffee->sweetness_level }}</p>
        <p>透明度:{{ $coffee->clearness_level }}</p>
        <p>コクの強さ:{{ $coffee->rich_level }}</p>
        <p>余韻の長さ:{{ $coffee->aftertaste_level }}</p>
        <p>冷めても美味しい:{{ $coffee->aftercooled_level }}</p>
        <p>メモ:{{ $coffee->note }}</p>
        <hr>
    </body>
</html>