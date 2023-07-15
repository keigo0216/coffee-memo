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
        <img src="{{ $coffee->img }}" alt="coffee_image">
        <h2>以下のデータは本当は詳細画面で表示する予定</h2>
        <p>抽出方法:{{ $coffee->brewing_method_id }}</p>
        <p>国:{{ $coffee->country_id }}</p>
        <p>飲み方:{{ $coffee->way_to_drink_id }}</p>
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
        @endforeach
    </body>
</html>