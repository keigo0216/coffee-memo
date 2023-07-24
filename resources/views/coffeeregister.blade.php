@extends('layouts.common')

@section('title', 'コーヒー登録画面')
@section('pageStyle')
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
@endsection

@include('layouts.head')
@include('layouts.header')
@section('content')

    <form id="coffeeregister-form" method="POST" action="{{ route('coffeeregister') }}" enctype="multipart/form-data" class="pb-3">
        @csrf
        <div class="mb-1.5">
            <div class="text-yellow-600">お店</div>
            <div class="mx-4">
                <input class="w-full h-7" type="text" name="shop">
            </div>
        </div>
        <hr>

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">評価</div>
            <div class="stars stars_evaluation">
                <input type="radio" id="star1" name="evaluation" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="evaluation" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="evaluation" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="evaluation" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="evaluation" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">
        
        <!-- ファイルのアップロード -->
        <div class="flex items-center justify-center w-full mb-2">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                 <!-- プレビュー画像の表示用の<img>要素 -->
                <img id="preview" class="h-full mx-auto hidden" src="" alt="preview-image">
                <!-- 画像がアップロードされたら非表示 -->
                <div id="register-view" class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" name="coffee_img" />
            </label>
        </div> 

        <div class="mb-1.5">
            <div class="text-yellow-600">商品名</div>
            <div class="mx-4">
                <input class="w-full h-7" type="text" name="name">
            </div>
        </div>
        <hr>

        <div class="flex grid-cols-2 justify-between mb-1">
            <div class="mr-2">
                <div class="text-yellow-600">国</div>
                <div>
                    <select name="country_id">
                        <option value>選択してください</option>
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
                </div>
            </div>
            <div class="mb-1.5 w-full">
                <div class="text-yellow-600">農場</div>
                <div class="mx-4">
                    <input class="w-full h-7" type="text" name="farm">
                </div>
            </div>
        </div>
        <hr>
 
        <div>
            <div class="text-yellow-600">抽出方法</div>
            <div class="flex flex-wrap">
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="1" class="mr-2">
                    ハンドドリップ
                </label>
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="2" class="mr-2">
                    フレンチプレス
                </label>
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="3" class="mr-2">
                    サイフォン
                </label>
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="4" class="mr-2">
                    エスプレッソ
                </label>
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="5" class="mr-2">
                    アイスコーヒー
                </label>
                <label class="inline-flex items-center m-1">
                    <input type="checkbox" name="brewing_method_id" value="6" class="mr-2">
                    水出しコーヒー
                </label>
            </div>
        </div>
        <hr>

        <div class="flex justify-center mb-1.5">
            <div class="w-1/2">
                <div class="text-yellow-600">ローストレベル</div>
                <div class="w-28">
                    <!-- <select name="roast_level">
                        <option value="1">浅煎り</option>
                        <option value="2">中浅煎り</option>
                        <option value="3">中煎り</option>
                        <option value="4">中深煎り</option>
                        <option value="5">深煎り</option>
                        <option value="6">その他</option>
                    </select> -->
                    <select id="roast_leval" name="roast_lavel" size="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>

                </div>
            </div>

            <div class="w-1/2">
                <div class="text-yellow-600">飲み方</div>
                <div class="flex flex-col">
                    <!-- <select name="way_to_drink_id">
                        <option value="1">ブラック</option>
                        <option value="2">ミルク</option>
                        <option value="3">その他</option>
                    </select> -->
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="1" class="mr-2">
                        ブラック
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="2" class="mr-2">
                        ミルク
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="3" class="mr-2">
                        その他
                    </label>
                </div>
            </div>
        </div>
        <hr>

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">香り</div>
            <div class="stars stars_scent">
                <input type="radio" id="star1" name="scent_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="scent_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="scent_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="scent_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="scent_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>苦味の強さ</div>
            <div>
                <select name="bitterness_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">苦味</div>
            <div class="stars stars_bitterness">
                <input type="radio" id="star1" name="bitterness_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="bitterness_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="bitterness_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="bitterness_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="bitterness_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>酸味の強さ</div>
            <div>
                <select name="acidity_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">酸味</div>
            <div class="stars stars_acidity">
                <input type="radio" id="star1" name="acidity_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="acidity_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="acidity_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="acidity_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="acidity_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>甘みの強さ</div>
            <div>
                <select name="sweetness_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->
        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">甘み</div>
            <div class="stars stars_sweetness">
                <input type="radio" id="star1" name="sweetness_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="seetness_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="acidity_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="seetness_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="seetness_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>透明度</div>
            <div>
                <select name="clearness_level">
                    <option value="1">濁っている</option>
                    <option value="2">やや濁っている</option>
                    <option value="3">普通</option>
                    <option value="4">やや透明</option>
                    <option value="5">透明</option>
                </select>
            </div>
        </div> -->
        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">透明度</div>
            <div class="stars stars_clearness">
                <input type="radio" id="star1" name="clearness_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="clearness_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="clearness_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="clearness_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="clearness_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>コク</div>
            <div>
                <select name="rich_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->
        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">コク</div>
            <div class="stars stars_rich">
                <input type="radio" id="star1" name="rich_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="rich_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="rich_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="rich_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="rich_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>余韻</div>
            <div>
                <select name="aftertaste_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->
        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">余韻</div>
            <div class="stars stars_aftertaste">
                <input type="radio" id="star1" name="aftertaste_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="aftertaste_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="aftertaste_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="aftertaste_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="aftertaste_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <!-- <div>
            <div>冷めたとき</div>
            <div>
                <select name="aftercooled_level">
                    <option value="1">弱い</option>
                    <option value="2">やや弱い</option>
                    <option value="3">普通</option>
                    <option value="4">やや強い</option>
                    <option value="5">強い</option>
                </select>
            </div>
        </div> -->
        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">冷めた後の味わい</div>
            <div class="stars stars_aftercooled">
                <input type="radio" id="star1" name="aftercooled_level" value="1" class="hidden"/>
                <label for="star1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="aftercooled_level" value="2" class="hidden"/>
                <label for="star2"><i class="fa-solid fa-star" class="hidden"></i></label>
                <input type="radio" id="star3" name="aftercooled_level" value="3" class="hidden"/>
                <label for="star3"><i class="fa-solid fa-star" ></i></label>
                <input type="radio" id="star4" name="aftercooled_level" value="4" class="hidden"/>
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star5" name="aftercooled_level" value="5" class="hidden"/>
                <label for="star5"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="mb-1.5">
            <div class="text-yellow-600">メモ</div>
            <div class="mx-4">
                <textarea class="w-full h-16" type="text" name="note"></textarea>
            </div>
        </div>
        <hr>

        <div>
            <div class="text-yellow-600">日付</div>
            <div><input type="date" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></div>
        </div>
    </form>

    <script src="{{asset('js/coffeeregister.js')}}"></script>
@endsection