@extends('layouts.employee')
@php
    $user = Auth::user();

@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">社員専用画面</h4>
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            <img class="d-flex mr-3" src="https://2.bp.blogspot.com/-k8YyzamaaDU/V6iIXvAN1jI/AAAAAAAA9BI/0fBlVeSqQYc4dRQymfckGd93WmdDqrrkQCLcB/s800/syoumeisyashin_man.png" style="width: 128px;height: 128px;">
        </div>
        <div class=" my-auto">
            <div>社員番号：{{$user->id}}</div>
            <div>氏名：{{$user->name}}</div>
            <div>部署：{{$user->department}}</div>
            <div>役職：{{$user->class}}</div>
            <div>メールアドレス：{{$user->email}}</div>
        </div>
    </div>
    <hr>
    <ul class="responsive-table text-center m-auto ">
        <li class="table-header">
            <div class="col col-2">期間</div>
            <div class="col col-2">ステータス</div>
            <div class="col col-2">自己評価</div>
            <div class="col col-2">１次評価者</div>
            <div class="col col-2">２次評価者</div>
            <div class="col col-2">最終更新日</div>
        </li>
        <div class="overflow-auto" style="height: 440px;">
            @foreach($columns as $column)
                @php
                    @endphp
                @if($column->progress == null)
                    <a href="{{ action('EvaluationController@regist', $column->year)}}" class="">
                        <li class="table-row">
                            <div class="col col-2">{{$column->year}}</div>
                            <div class="col col-2">未登録</div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                        </li>
                    </a>
                @elseif($column->progress == 2)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="">
                        <li class="table-row">
                            <div class="col col-2">{{$column->year}}</div>
                            <div class="col col-2">１次承認待ち</div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                        </li>
                    </a>
                @elseif($column->progress == 3)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="">
                        <li class="table-row">
                            <div class="col col-2">{{$column->year}}</div>
                            <div class="col col-2">２次承認待ち</div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                        </li>
                    </a>
                @elseif($column->progress == 4)
                    <a href="{{ action('EvaluationController@evaluation', $column->id)}}" class="">
                        <li class="table-row">
                            <div class="col col-2">{{$column->year}}</div>
                            <div class="col col-2">承認済み ー＞ 評価報告</div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                        </li>
                    </a>
                @elseif($column->progress == 5)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="">
                        <li class="table-row">
                            <div class="col col-2">{{$column->year}}</div>
                            <div class="col col-2">１次評価待ち</div>
                            <div class="col col-2">評価済み</div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                            <div class="col col-2"></div>
                        </li>
                    </a>
                @endif
            @endforeach
        </div>
    </ul>
@endsection
