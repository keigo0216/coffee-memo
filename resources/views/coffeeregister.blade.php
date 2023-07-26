@extends('layouts.common')

@section('title', 'コーヒー登録画面')
@section('pageStyle')
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
@endsection

@include('layouts.head')
@include('layouts.header')

@section('content')
    @if(isset($coffee))
    <form id="coffeeregister-form" method="POST" action="{{ route('coffeeupdate', ['id' => $coffee->id]) }}" enctype="multipart/form-data" class="pb-3">
    @else
    <form id="coffeeregister-form" method="POST" action="{{ route('coffeeregister') }}" enctype="multipart/form-data" class="pb-3">
    @endif
        @csrf
        <div class="mb-1.5">
            <div class="text-yellow-600">お店</div>
            <div class="mx-4">
                <input class="w-full h-7" type="text" name="shop" @if(isset($coffee)) value="{{ $coffee->shop}}" @endif>
            </div>
        </div>
        <hr>

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">評価</div>
            @if(isset($coffee))
                <div class="stars stars_evaluation">
                    @php
                        $evaluation = $coffee->evaluation ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="evaluation" value="{{ $i }}" class="hidden" {{ $i <= $evaluation ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $evaluation ? 'active' : ''}}"></i></label>
                    @endfor
                </div>
            @else
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
            @endif
        </div>
        <hr class="mb-2">
        
        <!-- ファイルのアップロード -->
        <div class="flex items-center justify-center w-full mb-2">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                @if(isset($coffee) && isset($coffee->binary_image))
                    <!-- プレビュー画像の表示用の<img>要素 -->
                    <img id="preview" class="h-full mx-auto" src="{{ $coffee->binary_image->image }}" alt="preview-image">
                @else
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
                @endif
                <input id="dropzone-file" type="file" class="hidden" name="coffee_img" />
            </label>
        </div> 

        <div class="mb-1.5">
            <div class="text-yellow-600">商品名</div>
            <div class="mx-4">
                <input class="w-full h-7" type="text" name="name" @if(isset($coffee)) value="{{ $coffee->name}}" @endif>
            </div>
        </div>
        <hr>

        <div class="flex grid-cols-2 justify-between mb-1">
            <div class="mr-2">
                <div class="text-yellow-600">国</div>
                <div>
                    <!-- $coffee->country_idはデフォルトで選択されるようにする -->
                    <select name="country_id">
                        <option value>選択してください</option>
                        @php
                            $countryArray = App\Models\Country::select('id', 'name')->get()->sortBy('id');
                        @endphp
                        @foreach($countryArray as $country)
                            <option value="{{ $country->id }}" {{ isset($coffee) && $coffee->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-1.5 w-full">
                <div class="text-yellow-600">農場</div>
                <div class="mx-4">
                    <input class="w-full h-7" type="text" name="farm" @if(isset($coffee)) value="{{$coffee->farm}}" @endif>
                </div>
            </div>
        </div>
        <hr>
 
        <div>
            <div class="text-yellow-600">淹れ方</div>
            <div class="flex flex-wrap">
                <!-- 淹れ方のチェックボックスを作り、$coffeeが存在したら$coffee->brewing_method_idのところにチェックをデフォルトで入れる。 -->
                @php
                    $brewingMethodArray = App\Models\BrewingMethod::select('id', 'name')->get()->sortBy('id');
                @endphp
                @foreach($brewingMethodArray as $brewingMethod)
                    <div class="w-1/2">
                        <input id="brew_{{ $brewingMethod->id }}" type="checkbox" name="brewing_method_id" value="{{ $brewingMethod->id }}" class="mr-2" {{ isset($coffee) && $coffee->brewing_method_id == $brewingMethod->id ? 'checked' : '' }}/>
                        <label for="brew_{{ $brewingMethod->id }}">{{ $brewingMethod->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>

        <div class="flex justify-center mb-1.5">
            <div class="w-1/2">
                <div class="text-yellow-600">ローストレベル</div>
                <div class="w-28">
                    <select id="roast_leval" name="roast_lavel" size="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1" {{isset($coffee) && $coffee->roast_level == 1 ? 'selected' : ''}}>1</option>
                        <option value="2" {{isset($coffee) && $coffee->roast_level == 2 ? 'selected' : ''}}>2</option>
                        <option value="3" {{isset($coffee) && $coffee->roast_level == 3 ? 'selected' : ''}}>3</option>
                        <option value="4" {{isset($coffee) && $coffee->roast_level == 4 ? 'selected' : ''}}>4</option>
                        <option value="5" {{isset($coffee) && $coffee->roast_level == 5 ? 'selected' : ''}}>5</option>
                        <option value="6" {{isset($coffee) && $coffee->roast_level == 6 ? 'selected' : ''}}>6</option>
                        <option value="7" {{isset($coffee) && $coffee->roast_level == 7 ? 'selected' : ''}}>7</option>
                        <option value="8" {{isset($coffee) && $coffee->roast_level == 8 ? 'selected' : ''}}>8</option>
                    </select>

                </div>
            </div>

            <div class="w-1/2">
                <div class="text-yellow-600">飲み方</div>
                <div class="flex flex-col">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="1" class="mr-2" {{isset($coffee) && $coffee->way_to_drink_id == 1 ? 'checked' : ''}}>
                        ブラック
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="2" class="mr-2" {{isset($coffee) && $coffee->way_to_drink_id == 2 ? 'checked' : ''}}>
                        ミルク
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="way_to_drink_id" value="3" class="mr-2" {{isset($coffee) && $coffee->way_to_drink_id == 3 ? 'checked' : ''}}>
                        その他
                    </label>
                </div>
            </div>
        </div>
        <hr>

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">香り</div>
            <div class="stars stars_scent">
                @if(isset($coffee))
                    @php
                        $scent_level = $coffee->scent_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="scent_level" value="{{ $i }}" class="hidden" {{ $i <= $scent_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $scent_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">苦味</div>
            <div class="stars stars_bitterness">
                @if(isset($coffee))
                    @php
                        $bitterness_level = $coffee->bitterness_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="bitterness_level" value="{{ $i }}" class="hidden" {{ $i <= $bitterness_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $bitterness_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">酸味</div>
            <div class="stars stars_acidity">
                @if(isset($coffee))
                    @php
                        $acidity_level = $coffee->acidity_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="acidity_level" value="{{ $i }}" class="hidden" {{ $i <= $acidity_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $acidity_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">甘み</div>
            <div class="stars stars_sweetness">
                @if(isset($coffee))
                    @php
                        $sweetness_level = $coffee->sweetness_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="sweetness_level" value="{{ $i }}" class="hidden" {{ $i <= $sweetness_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $sweetness_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">透明度</div>
            <div class="stars stars_clearness">
                @if(isset($coffee))
                    @php
                        $clearness_level = $coffee->clearness_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="clearness_level" value="{{ $i }}" class="hidden" {{ $i <= $clearness_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $clearness_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">コク</div>
            <div class="stars stars_rich">
                @if(isset($coffee))
                    @php
                        $rich_level = $coffee->rich_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rich_level" value="{{ $i }}" class="hidden" {{ $i <= $rich_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $rich_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">余韻</div>
            <div class="stars stars_aftertaste">
                @if(isset($coffee))
                    @php
                        $aftertaste_level = $coffee->aftertaste_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="aftertaste_level" value="{{ $i }}" class="hidden" {{ $i <= $aftertaste_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $aftertaste_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="rating-box mb-1.5">
            <div class="text-yellow-600">冷めた後の味わい</div>
            <div class="stars stars_aftercooled">
                @if(isset($coffee))
                    @php
                        $aftercooled_level = $coffee->aftercooled_level ?? 0;
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="aftercooled_level" value="{{ $i }}" class="hidden" {{ $i <= $aftercooled_level ? 'checked' : '' }} />
                        <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $aftercooled_level ? 'active' : ''}}"></i></label>
                    @endfor
                @else
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
                @endif
            </div>
        </div>
        <hr class="mb-2 clear-both">

        <div class="mb-1.5">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">メモ</label>
            <textarea id="message" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">@if(isset($coffee)) {!! str_replace(["\r\n", "\r", "\n", "<br>", "<br />"], "\n", e($coffee->note)) !!} @endif</textarea>
        </div>
        <hr>

        <div>
            <div class="text-yellow-600">日付</div>
            <div><input type="date" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></div>
        </div>
    </form>

    <script src="{{asset('js/coffeeregister.js')}}"></script>
@endsection