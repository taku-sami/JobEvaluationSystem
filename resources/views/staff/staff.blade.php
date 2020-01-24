@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="my-2">
        <div class="h5">社員専用画面</div>
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            @if($image)
                <img class="d-flex mr-3" src="data:image/png;base64,<?= $image ?>" style="width: 150px;height: 150px;">
            @else
                <img class="d-flex mr-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width: 150px;height: 150px;">
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
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 staff_column1">期間</th>
                        <th class="cell100 staff_column1">ステータス</th>
                        <th class="cell100 staff_column1">自己評価</th>
                        <th class="cell100 staff_column1">１次評価者</th>
                        <th class="cell100 staff_column1">２次評価者</th>
                        <th class="cell100 staff_column1">評価</th>
                        <th class="cell100 staff_column1">最終更新日</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @foreach($columns as $column)
                        @if($column->progress == null)
                            @if($boss1_dep ==null)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">未登録</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1"></td>
                                </tr>
                            @else
                                    <tr class="row100 body">
                                        <td class="cell100 staff_column1 ">{{$column->year}}</td>
                                        <td class="cell100 staff_column1 ">
                                            <a href="{{ action('EvaluationController@regist', $column->year)}}" class="text-warning">
                                                未登録 <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td class="cell100 staff_column1 "></td>
                                        <td class="cell100 staff_column1 ">{{$boss1_dep->name}}</td>
                                        <td class="cell100 staff_column1 ">{{$boss2_dep->name}}</td>
                                        <td class="cell100 staff_column1 "></td>
                                        <td class="cell100 staff_column1 "></td>
                                    </tr>
                            @endif
                        @elseif($column->progress == 1)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@regist', $column->year)}}" class="text-danger">
                                            差し戻し <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 2)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@show', $column->id)}}">
                                            １次承認 <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 3)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@show', $column->id)}}">
                                            ２次承認 <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 4)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@evaluation', $column->id)}}" class="text-warning">
                                            評価報告 <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 5)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@show', $column->id)}}">
                                            １次評価待ち <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1">評価済み</td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 6)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1"><a href="{{ action('EvaluationController@show', $column->id)}}">
                                            ２次評価待ち <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1">評価済み</td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1"></td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @elseif($column->progress == 7)
                                <tr class="row100 body">
                                    <td class="cell100 staff_column1">{{$column->year}}</td>
                                    <td class="cell100 staff_column1">
                                        <a href="{{ action('EvaluationController@show', $column->id)}}" class="text-info">
                                            評価終了 <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td class="cell100 staff_column1">評価済み</td>
                                    <td class="cell100 staff_column1">{{$boss1_dep->name}}</td>
                                    <td class="cell100 staff_column1">{{$boss2_dep->name}}</td>
                                    <td class="cell100 staff_column1 text-info">{{$column->evaluation}}({{$column->point}}ポイント/5)</td>
                                    <td class="cell100 staff_column1">{{$column->updated_at->format('Y/m/d')}}</td>
                                </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
