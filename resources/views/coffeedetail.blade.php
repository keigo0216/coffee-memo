@extends('layouts.common')

@section('title', 'コーヒー編集画面')
@section('pageStyle')
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}"/>
@endsection

@include('layouts.head')
@include('layouts.header')
@section('img_content')
    <div class="container relative mx-auto h-56 w-full overflow-hidden">
        <div class="absolute top-0 left-3 rating-box in-image-rating-box">
            <div class="stars stars_evaluation">
                @php
                    $evaluation = $coffee->evaluation ?? 0;
                @endphp

                @for($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="evaluation" value="{{ $i }}" class="hidden" {{ $i <= $evaluation ? 'checked' : '' }} disabled />
                    <label for="star{{ $i }}"><i class="fa-solid fa-star {{$i <= $evaluation ? 'active' : ''}}"></i></label>
                @endfor
            </div>
        </div>

        @if($coffee->binary_image && $coffee->binary_image->image != null)
            <img src="{{ $coffee->binary_image->image }}" alt="coffee_image" class="w-full h-full object-cover">
        @else
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/>
            </svg>
        @endif
    </div>
@endsection
@section('content')
    <div class="border-b border-yellow-600 mb-1.5"><inline class="text-yellow-600">商品名</inline><inline class="mx-2">{{$coffee->name}}</inline></div>
    <div class="border-b border-yellow-600 mb-1.5"><inline class="text-yellow-600">お店</inline><inline class="mx-2">{{$coffee->shop}}</inline></div>
    <div class="flex grid-cols-2 justify-between mb-1.5">
        <div class="w-1/2"><div class="mr-1 border-b border-yellow-600"><inline class="text-yellow-600">生産国</inline><inline class="mx-2">{{$country}}</inline></div></div>
        <div class="w-1/2"><div class="ml-1 border-b border-yellow-600"><inline class="text-yellow-600">農場</inline><inline class="mx-2">{{$coffee->farm}}</inline></div></div>
    </div>

    <div class="flex mb-1.5">
        <div class="w-1/2">
            <div class="text-yellow-600">淹れ方</div>
            <!-- BrewingMethodモデルのデータをまとめて取り出して、チェックボックスリストに並べる。$coffee->brewing_method_idに等しいものにチェックを入れる -->
            <div class="flex flex-col">
                @php
                    $brewingMethodArray = App\Models\BrewingMethod::select('id', 'name')->get()->sortBy('id');
                @endphp
                @foreach($brewingMethodArray as $brewingMethod)
                    <div>
                        <input id="brew_{{ $brewingMethod->id }}" type="checkbox" disabled {{ $coffee->brewing_method_id == $brewingMethod->id ? 'checked' : '' }}/>
                        <label for="brew_{{ $brewingMethod->id }}">{{ $brewingMethod->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-1/2">
            <div>
                <div class="text-yellow-600">ローストレベル</div>
                <div class="px-4 py-1 w-full md:w-2/3 lg:w-1/3">
                    <div class="w-full bg-slate-100 h-1">
                        <div class="bg-indigo-400 h-1 rounded" style="width: {{100/8 * $coffee->roast_level}}%"></div>
                    </div>
                </div>
            </div>

            <!-- WayToDrinkモデルのデータをまとめて取り出して、チェックボックスリストに並べる。$coffee->way_to_drink_idに等しいものにチェックボックスを入れる -->
            @php
                $wayToDrinkArray = App\Models\WayToDrink::select('id', 'name')->get();
            @endphp
            <div>
                <div class="flex flex-row">
                    <div class="text-yellow-600 mr-2">飲み方</div>
                    <div class="flex flex-col mt-1">
                        @foreach($wayToDrinkArray as $wayToDrink)
                            <div>
                                <input id="drink_{{ $wayToDrink->id }}" type="checkbox" disabled {{ $coffee->way_to_drink_id == $wayToDrink->id ? 'checked' : '' }}/>
                                <label for="drink_{{ $wayToDrink->id }}">{{ $wayToDrink->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="chart" class="-mt-8"></div>
    <!-- ApexChartsを読み込むスクリプト -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- PHPの変数をJavaScriptに変換して利用 -->
    <script>
        // PHPの変数をJavaScript変数に変換する
        var scentLevel = {{ $coffee->scent_level ?? 0}};
        var bitternessLevel = {{ $coffee->bitterness_level ?? 0}};
        var acidityLevel = {{ $coffee->acidity_level ?? 0}};
        var sweetnessLevel = {{ $coffee->sweetness_level ?? 0}};
        var clearnessLevel = {{ $coffee->clearness_level ?? 0}};
        var richLevel = {{ $coffee->rich_level ?? 0}};
        var aftertasteLevel = {{ $coffee->aftertaste_level ?? 0}};
        var aftercooledLevel = {{ $coffee->aftercooled_level ?? 0}};

        // ApexChartsのオプションを動的に設定する
        var options = {
            series: [{
                name: 'Series 1',
                data: [scentLevel, bitternessLevel, acidityLevel, sweetnessLevel, clearnessLevel, richLevel, aftertasteLevel, aftercooledLevel],
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 400,
                type: 'radar',
            },
            xaxis: {
                categories: ['香り', '苦味', '酸味', '甘み', 'クリア', 'コク', '余韻', '冷めた後'],
                labels: {
                    show: true,
                    style: {
                        fontSize: "16px",
                        colors: ["#ca8a04", "#ca8a04","#ca8a04","#ca8a04","#ca8a04","#ca8a04","#ca8a04","#ca8a04"]
                    }
                }
            },
            yaxis: {
                show: true,
                min: 0,
                max: 5,
                tickAmount: 5,
            },
            fill: {
                colors: ['#713f12'],
                opacity: 0.5,
            },
            stroke: {
                show: false
            },
            markers: {
                size: 0
            },
        };

        // ApexChartsを生成して描画
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <div class="mb-1.5 -mt-12">
        <div class="text-yellow-600">■メモ</div>
        <div class="mx-4">
            {!! nl2br(e($coffee->note)) !!}
        </div>
    </div>

    <!-- 値段と日にちの表示 -->
    <div class="container flex flex-row justify-end">
            <div class="border-b border-yellow-600 mr-2">
                <inline class="text-yellow-600">値段</inline>
                <inline>
                    @if($coffee->price)
                        {{$coffee->price}}円
                    @else
                        未記入
                    @endif
                </inline>
            </div>
            <div class="border-b border-yellow-600">
                <inline class="text-yellow-600">日にち</inline>
                <inline>
                    @if($coffee->date)
                        {{$coffee->date}}
                    @else
                        未記入
                    @endif
                </inline>
            </div>
    </div>
    <div class="h-6"></div>
@endsection