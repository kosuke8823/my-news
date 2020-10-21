<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        {{-- 以下を追記 --}} 
51                         <!-- Authentication Links --> 
52                         {{-- ログインしていなかったらログイン画面へのリンクを表示 --}} 
53                         @guest 
54                             <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li> 
55                         {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}} 
56                         @else 
57                             <li class="nav-item dropdown"> 
58                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
59                                     {{ Auth::user()->name }} <span class="caret"></span> 
60                                 </a> 
61 
 
62                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
63                                     <a class="dropdown-item" href="{{ route('logout') }}" 
64                                        onclick="event.preventDefault(); 
65                                                      document.getElementById('logout-form').submit();"> 
66                                         {{ __('Logout') }} 
67                                     </a> 
68 
 
69                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
70                                         @csrf 
71                                     </form> 
72                                 </div> 
73                             </li> 
74                             @endguest 
75                             {{-- 以上までを追記 --}} 

                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>