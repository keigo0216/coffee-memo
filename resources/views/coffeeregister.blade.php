<html>
    <head>coffee</head>
    <body>
        <h1>register</h1>
        <form method="POST" action="{{ route('coffeeregister') }}" enctype="multipart/form-data">
        <table>
            @csrf
            <tr>
                <th>店名</th>
                <td><input type="text" name="shop"></td>
            </tr>
            <tr>
                <!-- 評価値は1~5の5段階 -->
                <th>評価値</th>
                <td>
                    <select name="evaluation">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </tr>
            <tr>
                <th>日付</th>
                <td><input type="text" name="date"></td>
            </tr>
            <tr>
                <th>画像</th>
                <td><input type="file" name="coffee_img"></td>
            </tr>
            <tr>
                <th>抽出方法</th>
                <td>
                    <select name="brewing_method_id">
                        <option value="1">ハンドドリップ</option>
                        <option value="2">フレンチプレス</option>
                        <option value="3">サイフォン</option>
                        <option value="4">エスプレッソ</option>
                        <option value="5">アイスコーヒー</option>
                        <option value="6">水出しコーヒー</option>
                        <option value="7">その他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>国</th>
                <td>
                    <select name="country_id">
                        <option value="1">ブラジル</option>
                        <option value="2">コロンビア</option>
                        <option value="3">インドネシア</option>
                        <option value="4">エチオピア</option>
                        <option value="5">ケニア</option>
                        <option value="6">コスタリカ</option>
                        <option value="7">グアテマラ</option>
                        <option value="8">メキシコ</option>
                        <option value="9">ベネズエラ</option>
                        <option value="10">ベトナム</option>
                        <option value="11">その他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>飲み方</th>
                <td>
                    <select name="way_to_drink_id">
                        <option value="1">ブラック</option>
                        <option value="2">ミルク</option>
                        <option value="3">その他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>ロースト度合い</th>
                <td>
                    <select name="roast_level">
                        <option value="1">浅煎り</option>
                        <option value="2">中浅煎り</option>
                        <option value="3">中煎り</option>
                        <option value="4">中深煎り</option>
                        <option value="5">深煎り</option>
                        <option value="6">その他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>香りの強さ</th>
                <td>
                    <select name="scent_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>苦味の強さ</th>
                <td>
                    <select name="bitterness_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>酸味の強さ</th>
                <td>
                    <select name="acidity_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>甘みの強さ</th>
                <td>
                    <select name="sweetness_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>透明度</th>
                <td>
                    <select name="clearness_level">
                        <option value="1">濁っている</option>
                        <option value="2">やや濁っている</option>
                        <option value="3">普通</option>
                        <option value="4">やや透明</option>
                        <option value="5">透明</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>コク</th>
                <td>
                    <select name="rich_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>余韻</th>
                <td>
                    <select name="aftertaste_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>冷めたとき</th>
                <td>
                    <select name="aftercooled_level">
                        <option value="1">弱い</option>
                        <option value="2">やや弱い</option>
                        <option value="3">普通</option>
                        <option value="4">やや強い</option>
                        <option value="5">強い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>メモ</th>
                <td><input type="text" name="note"></td>
            </tr>
            <tr>
                <td><input type="submit" value="登録"></td>
            </tr>
        </table>
        </form>
    </body>
</html>