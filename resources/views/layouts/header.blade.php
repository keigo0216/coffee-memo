@section('header')
<header class="h-11 bg-yellow-900 flex justify-between items-center px-3">
    <!-- ヘッダーの左側をリンクによって変更 -->
    @if(Request::is('/'))
        <a href="{{ route('coffeeregister') }}">
            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1.5em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
            </svg>
        </a>
    @else
        <a href="{{ route('list') }}">
            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 512 512">
                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
            </svg>
        </a>
    @endif

    <!-- ヘッダーの右側をリンクによって変更 -->
    @if(Request::is('/'))
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-white">ログアウト</button>
        </form>
    @else
        <div>
            <input form="coffeeregister-form" type="submit" value="保存" class="text-white">
        </div>
    @endif
</header>
@endsection