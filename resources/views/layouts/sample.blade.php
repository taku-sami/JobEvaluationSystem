<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<div id="full-page">
    <div class="app">
        <div id="" style="background-color: #E3FBFF;" class="text-secondary">
            <nav class="navbar navbar-expand-md navbar-light border-bottom" style="background-color: #E3FBFF;">
                <div class="container-fluid">
                    <a class="navbar-brand text-secondary" href="{{ url('/') }}">
                        <h3>Web人事考課システム</h3>
                    </a>
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
                                        <a class="nav-link" style="color: #004BB1;">
                                            こんにちは {{ Auth::user()->name }} さん <span class="caret"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #004BB1;" href="{{ route('logout') }}"
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

            <div class="d-flex" id="wrapper">

                <!-- Sidebar -->
                <div class="border-right" id="sidebar-wrapper" style="background-color: #E3FBFF;">
                    <div class="list-group list-group-flush ">
                        <a href="/main" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-home fa-fw"></i> TOP</a>
                        <a href="/department" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-building fa-fw"></i> 所属マスタ</a>
                        <a href="/classes" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-sitemap"></i> 役職マスタ</a>
                        <a href="/employees" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-address-book fa-fw"></i> 社員マスタ</a>
                        <a href="/categories" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-tasks fa-fw"></i> 考課マスタ</a>
                        <a href="/importExportView" class="list-group-item list-group-item-action navbar-brand text-secondary h5" style="background-color: #E3FBFF;"><i class="fas fa-file-csv fa-fw"></i> CSVマスタ</a>
                    </div>
                </div>
                <main class=""  style="width: 1200px;">
                    <div id="page-content-wrapper">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</body>

</html>

<script>
    var app = new Vue ({
        name:'Sample-app',
        el:'#sample',
        data:{
            categories:[
                {
                    name:'',
                    standard:''
                }
            ]
        },
        methods:{
            addNewCategoryForm(){
                this.categories.push({
                    // title:'title' + (this.categories.length+1),
                    // detail:'detail' + (this.categories.length+1),
                    name:'',
                    standard:''
                })
            },
            deleteCategoryForm(index){
                this.categories.splice(index,1)
            }
        }
    })
</script>
