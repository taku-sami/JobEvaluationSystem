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
    <link href="{{ asset('css/spur.css') }}" rel="stylesheet" >
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
                <img src="https://drive.google.com/uc?export=view&id==1SYK6NLdASBL8t2qUNRpfm-envRCmcT8V" alt=""><br>
                <hr>
                <p>管理者画面のTOPページです。</p>
                <p>各所属の承認者のタスク進捗確認やシステムログを確認できます。</p>
                <hr>
                <p class="text-primary">所属マスタ</p>
                <img src="https://drive.google.com/uc?export=view&id=1HkgLquu6LAulGGWt8L54p0R-Zi6iGp-5" alt="" style="width: 45%">
                <img src="https://drive.google.com/uc?export=view&id=1oSpybbLbKL_kmjxWq3eZ8z4KwfjOrCFS" alt="" style="width: 45%"><br>
                <hr>
                <p>所属の追加、編集、削除ができます。</p>
                <p>初期状態では「開発部」「人事部」「営業部」の３つです。</p>
                <hr>
                <p class="text-primary">役職マスタ</p>
                <img src="https://drive.google.com/uc?export=view&id=1Gq_y60XNfz845iB9pA63OcEYACxrm7YS" alt="" style="width: 45%">
                <img src="https://drive.google.com/uc?export=view&id=1mj8e8p-Uq1v9J2iEiU7KZ2i3KCCdoysN" alt="" style="width: 45%"><br>
                <hr>
                <p>役職の追加、編集、削除ができます。</p>
                <p>初期状態では「スタッフ（被評価者）」「課長（１次承認者）」「部長（２次承認者）」の３つです。</p>
                <hr>
                <p class="text-primary">社員マスタ</p>
                <img src="https://drive.google.com/uc?export=view&id=1A_pa3x0DlMKQDpdg6sb09UNgc20VWgMm" alt="" style="width: 45%">
                <img src="https://drive.google.com/uc?export=view&id=1SAcaNnBvEWMzPUt6Vo7vW5hC5MYbxUrr" alt="" style="width: 45%">
                <hr>
                <img src="https://drive.google.com/uc?export=view&id=1bEtAhzK2xndML4-zIHZECmHWIbhKQDcL" alt="" style="width: 45%">
                <img src="https://drive.google.com/uc?export=view&id=17NME0SSJzDR4HrhVOUI8MswUkM64Y6QV" alt="" style="width: 45%">
                <hr>
                <p>社員の追加、編集、削除ができます。</p>
                <p>社員を追加した場合は、登録したメールアドレス宛に認証メールが送信されます。（トークン認証）</p>
                <p>メールに記載されているリンクのページからパスワードを設定し社員登録が完了します。</p>
                <p>機能を確認したい場合はご自身のメールアドレスで社員登録を行ってみてください。</p>
                <p>初期状態ではスタッフ３名、１次承認者及び２次承認者が１名ずつ各所属に登録しています。</p>
                <p>実装方法：Mailgun</p>
                <hr>
                <p class="text-primary">考課マスタ</p>
                <img src="https://drive.google.com/uc?export=view&id=1_JZGm6LujlTe5ut-b40XDsUuVHhsZL0d" alt="" style="width: 45%">
                <img src="https://drive.google.com/uc?export=view&id=11WAqeh_b4pj_RYXHTOI2CQnAFom-jTiS" alt="" style="width: 45%"><br>
                <hr>
                <p>考課の追加、編集、削除をができます。</p>
                <p>考課数は動的に登録可能です。</p>
                <p>実装方法：Vue.js</p>
                <hr>
                <p class="text-primary">CSVマスタ</p>
                <img src="https://drive.google.com/uc?export=view&id=11pmuqPkXVKVxyHl2AUsUiU8DCriP1PQz" alt="">
                <hr>
                <p>CSVから特定のDBを操作できます。</p>
                <p>考課科目を一括登録、評価結果の一覧出力をCSVで行えます。</p>
                <p>考課科目の登録の場合は、CSVテンプレートをこのページからダウンロード可能です。</p>
                <p>実装方法：Laravel-Excel</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>

        </div>
    </div>
</div>

<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <a class="navbar-brand text-left" href="{{ url('/') }}" style=" font-size: 19px;color:#1ABC9C;">Web人事考課システム</a>
        <nav class="dash-nav-list">
            <a href="/main" class="dash-nav-item"><i class="fas fa-home fa-fw"></i>　TOP</a>
            <a href="/department" class="dash-nav-item"><i class="fas fa-building fa-fw"></i>　所属管理</a>
            <a href="/classes" class="dash-nav-item"><i class="fas fa-sitemap text-center"></i>　役職管理</a>
            <a href="/employees" class="dash-nav-item"><i class="fas fa-address-book fa-fw"></i>　社員管理</a>
            <a href="/categories" class="dash-nav-item"><i class="fas fa-tasks fa-fw"></i>　考課管理</a>
            <a href="/importExportView" class="dash-nav-item"><i class="fas fa-table fa-fw"></i>　データ入出力</a>
        </nav>
    </div>
    <div class="dash-app">
        <header class="dash-toolbar">
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>

            <div class="tools">
                <a class="nav-link text-secondary">
                    こんにちは {{ Auth::user()->name }} さん <span class="caret"></span>
                </a>
                <button type="button" class="text-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="far fa-question-circle fa-lg"></i>
                </button>
                <a class="nav-link text-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>
        <main class="dash-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ asset('js/spur.js')}}"></script>

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
