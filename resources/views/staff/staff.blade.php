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
            @if($image_url)
                <img class="d-flex mr-3" src="/{{ $image_url }}" style="width: 128px;height: 128px;">
            @else
                <img class="d-flex mr-3" src="/storage/images/user.jpg" style="width: 128px;height: 128px;">
            @endif

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
            <div class="col col-1">期間</div>
            <div class="col col-1">ステータス</div>
            <div class="col col-1">自己評価</div>
            <div class="col col-1">１次評価者</div>
            <div class="col col-1">２次評価者</div>
            <div class="col col-2">評価</div>
            <div class="col col-1">最終更新日</div>
        </li>
        <div class="overflow-auto" style="height: 440px;">
            @foreach($columns as $column)
                @if($column->progress == null)
                    @if($boss1_dep ==null)
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">未登録</div>
                            <div class="col col-1"></div>
                            <div class="col col-1"></div>
                            <div class="col col-1"></div>
                            <div class="col col-2"></div>
                            <div class="col col-1"></div>
                        </li>
                    @else
                        <a href="{{ action('EvaluationController@regist', $column->year)}}" class="hover1" style="text-decoration:none;">
                            <li class="table-row">
                                <div class="col col-1">{{$column->year}}</div>
                                <div class="col col-1">未登録</div>
                                <div class="col col-1"></div>
                                <div class="col col-1">{{$boss1_dep->name}}</div>
                                <div class="col col-1">{{$boss2_dep->name}}</div>
                                <div class="col col-2"></div>
                                <div class="col col-1"></div>
                            </li>
                        </a>
                    @endif
                @elseif($column->progress == 1)
                    <a href="{{ action('EvaluationController@regist', $column->year)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">未登録</div>
                            <div class="col col-1"></div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 2)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">１次承認</div>
                            <div class="col col-1"></div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 3)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">２次承認</div>
                            <div class="col col-1"></div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 4)
                    <a href="{{ action('EvaluationController@evaluation', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">承認済み ▶ 評価報告</div>
                            <div class="col col-1"></div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 5)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">１次評価待ち</div>
                            <div class="col col-1">評価済み</div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 6)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">２次評価待ち</div>
                            <div class="col col-1">評価済み</div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2"></div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @elseif($column->progress == 7)
                    <a href="{{ action('EvaluationController@show', $column->id)}}" class="hover1" style="text-decoration:none;">
                        <li class="table-row">
                            <div class="col col-1">{{$column->year}}</div>
                            <div class="col col-1">評価終了</div>
                            <div class="col col-1">評価済み</div>
                            <div class="col col-1">{{$boss1_dep->name}}</div>
                            <div class="col col-1">{{$boss2_dep->name}}</div>
                            <div class="col col-2">{{$column->evaluation}}({{$column->point}}ポイント)</div>
                            <div class="col col-1">{{$column->updated_at->format('Y/m/d')}}</div>
                        </li>
                    </a>
                @endif
            @endforeach
        </div>
    </ul>
@endsection
