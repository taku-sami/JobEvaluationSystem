@extends('layouts.employee')
@php

    @endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">社員確認画面</h4>
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            @if($image)
                <img class="d-flex mr-3" src="data:image/png;base64,<?= image ?>" style="width: 128px;height: 128px;">
            @else
                <img class="d-flex mr-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width: 128px;height: 128px;">
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
            <div class="col col-2">期間</div>
            <div class="col col-2">ステータス</div>
            <div class="col col-2">評価シート</div>
            <div class="col col-2">評価</div>
            <div class="col col-2">最終更新日</div>
        </li>
        <div class="overflow-auto" style="height: 440px;">
            @foreach($columns as $column)
                @php
                    @endphp
                @if($column->progress == null)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">未登録</div>
                        <div class="col col-2"></div>
                        <div class="col col-2"></div>
                        <div class="col col-2"></div>
                    </li>
                @elseif($column->progress == 2)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">１次承認待ち</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2"></div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @elseif($column->progress == 3)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">２次承認待ち</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2"></div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @elseif($column->progress == 4)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">承認済み ー＞ 評価報告</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2"></div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @elseif($column->progress == 5)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">１次評価待ち</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2"></div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @elseif($column->progress == 6)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">２次評価待ち</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2"></div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @elseif($column->progress == 7)
                    <li class="table-row">
                        <div class="col col-2">{{$column->year}}</div>
                        <div class="col col-2">評価済み</div>
                        <div class="col col-2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                <i class="fas fa-scroll fa-1x"></i>
                            </a></div>
                        <div class="col col-2">{{$column->evaluation}}({{$column->point}}ポイント)</div>
                        <div class="col col-2">{{$column->updated_at->format('Y/m/d')}}</div>
                    </li>
                @endif
            @endforeach
        </div>
    </ul>
@endsection
