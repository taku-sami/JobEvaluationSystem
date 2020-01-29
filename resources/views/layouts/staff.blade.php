<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Web人事考課システム', 'Web人事考課システム') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/util.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/flat-ui.css') }}" rel="stylesheet" >

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/chart-js-config.js')}}"></script>
</head>
<body>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ヘルプ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <p class="text-primary">TOP</p>
                <img src="{{asset('images/staff/staff_top.png')}}" alt=""><br>
                <hr>
                <p>スタッフ画面のTOPページです。</p>
                <p>自分の目標・評価の進捗確認や最終評価結果の確認ができます。</p>
                <hr>
                <p class="text-primary">目標登録画面</p>
                <img src="{{asset('images/staff/staff_goal.png')}}" alt="" >
                <br>
                <hr>
                <p>目標の登録ができます。目標は考課ごとに登録します。</p>
                <p>上長は目標の確認を行い、差し戻しされれば目標の再登録が必要となります。</p>
                <hr>
                <p class="text-primary">評価登録画面</p>
                <img src="{{asset('images/staff/staff_eva.png')}}" alt="" >
                <br>
                <hr>
                <p>目標に対する評価を登録できます。</p>
                <p>上長の目標承認後のみ行うことができます。</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>

        </div>
    </div>
</div>
<div class="full-page">
    <div id="app">
        <nav class="navbar navbar-expand-md mb-3">
            <div class="container-fluid">
                <a class="navbar-brand  text-left" href="{{ url('/') }}" ><div class="h5">Web人事考課システム</div></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                <li class="nav-item">
                                    <a class="nav-link text-secondary">
                                        こんにちは {{ Auth::user()->name }} さん <span class="caret"></span>
                                    </a>
                                </li>
                                <button type="button" class="text-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="far fa-question-circle fa-lg"></i>
                                </button>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('js/spur.js')}}"></script>

</body>
</html>
