@extends('layouts.employee')
@php

    @endphp
@section('content')

    <div class="my-2 ">
        <div class="h5">社員確認画面</div>
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
                        <th class="cell100 employee_column1" >期間</th>
                        <th class="cell100 employee_column2" >ステータス</th>
                        <th class="cell100 employee_column2" >評価シート</th>
                        <th class="cell100 employee_column2" >評価</th>
                        <th class="cell100 employee_column2" >最終更新日</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @foreach($columns as $column)
                        <tr class="row100 body">
                            @if($column->progress == null)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2">未登録</td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2"></td>
                            @elseif($column->progress == 2)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2 text-warning">１次承認待ち</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @elseif($column->progress == 3)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2 text-warning">２次承認待ち</td>
                                <td class="cell100 employee_column2"><a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @elseif($column->progress == 4)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2">評価報告</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @elseif($column->progress == 5)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2 text-warning">１次評価待ち</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @elseif($column->progress == 6)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2 text-warning">２次評価待ち</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2"></td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @elseif($column->progress == 7)
                                <td class="cell100 employee_column1">{{$column->year}}</td>
                                <td class="cell100 employee_column2 text-info">評価済み</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                        <i class="fas fa-external-link-alt fa-lg"></i>
                                    </a>
                                </td>
                                <td class="cell100 employee_column2 text-info">{{$column->evaluation}}({{$column->point}}ポイント/5)</td>
                                <td class="cell100 employee_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
