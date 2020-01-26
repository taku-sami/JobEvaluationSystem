@extends('layouts.employee')
@php
    @endphp
@section('content')

    <div class="my-5">
        <div class="h5">{{$year}}年度 考課一覧</div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group w-25 col-2">
            <label for="">年度選択</label>
            <form action="/boss" method="post">
                @csrf
                <select class="form-control md-form" name="year" onChange="this.form.submit()">
                    <option value=""  selected disabled>期間を選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{$category->year}}" >{{$category->year}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="form-group w-25 col-3">
            <label for="">社員検索</label>
            <form action="/search" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="氏名 / メールアドレス" required class="form-control border" name="keyword" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-light border" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-light p-3 mb-4" style="width: 80%;border-radius: 10px; border:3px solid #dee2e6!important">
        <div class="container">
            <div class="m-2">
                <div class="row">
                    <div>ステータス</div>
                </div>
                <div class="row text-center">
                    <div class="col-2 border py-3 bg-white">目標入力中<br><div class="mt-1" style="color: #4476C6">{{$num1}}</div></div>
                    <div class="col-2 border py-3 bg-white">目標承認中<br><div class="mt-1" style="color: #4476C6">{{$num2}}</div></div>
                    <div class="col-2 border py-3 bg-white">自己評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num3}}</div></div>
                    <div class="col-2 border py-3 bg-white">１次評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num4}}</div></div>
                    <div class="col-2 border py-3 bg-white">２次評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num5}}</div></div>
                    <div class="col-2 border py-3 bg-white">評価確定済み<br><div class="mt-1" style="color: #4476C6">{{$num6}}</div></div>
                </div>
            </div>
            <div class="m-2">
                <div class="row">
                    <div>最終評価</div>
                </div>
                <div class="row text-center w-75">
                    <div class="col-2 border py-3 bg-white">SS<br><div class="mt-1"  style="color: #4476C6">{{$count_ss}}</div></div>
                    <div class="col-2 border py-3 bg-white">S<br><div class="mt-1" style="color: #4476C6">{{$count_s}}</div></div>
                    <div class="col-2 border py-3 bg-white">A<br><div class="mt-1" style="color: #4476C6">{{$count_a}}</div></div>
                    <div class="col-2 border py-3 bg-white">B<br><div class="mt-1" style="color: #4476C6">{{$count_b}}</div></div>
                    <div class="col-2 border py-3 bg-white">C<br><div class="mt-1" style="color: #4476C6">{{$count_c}}</div></div>
                    <div class="col-2 border py-3 bg-white">未評価<br><div class="mt-1" style="color: #4476C6">{{$none}}</div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 boss_column1">氏名</th>
                        <th class="cell100 boss_column2">所属</th>
                        <th class="cell100 boss_column2">役職</th>
                        <th class="cell100 boss_column2">期間</th>
                        <th class="cell100 boss_column2">ステータス</th>
                        <th class="cell100 boss_column2">目標シート</th>
                        <th class="cell100 boss_column2">評価</th>
                        <th class="cell100 boss_column2">更新日</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @foreach($columns as $column)
                        @if($column->progress == null)
                            <tr class="row100 body">
                                <td class="cell100 boss_column1">{{$column->name}}</td>
                                <td class="cell100 boss_column2">{{$column->department}}</td>
                                <td class="cell100 boss_column2">{{$column->class}}</td>
                                @elseif($column->progress >= 2)
                                    <td class="cell100 boss_column1">{{$column->user->name}}</td>
                                    <td class="cell100 boss_column2">{{$column->user->department}}</td>
                                    <td class="cell100 boss_column2">{{$column->user->class}}</td>
                                @endif
                                <td class="cell100 boss_column2">{{$year}}</td>
                                @if($column->progress == null)
                                    <td class="cell100 boss_column2">未登録</td>
                                @elseif($column->progress == 1)
                                    <td class="cell100 boss_column2">差戻</td>
                                @elseif($column->progress == 2)
                                    <td class="cell100 boss_column2 text-warning">１次承認待ち</td>
                                @elseif($column->progress == 3)
                                    <td class="cell100 boss_column2">２次承認待ち</td>
                                @elseif($column->progress == 4)
                                    <td class="cell100 boss_column2">評価未登録</td>
                                @elseif($column->progress == 5)
                                    <td class="cell100 boss_column2 text-warning">１次評価待ち</td>
                                @elseif($column->progress == 6)
                                    <td class="cell100 boss_column2">２次評価待ち</td>
                                @elseif($column->progress == 7)
                                    <td class="cell100 boss_column2 text-info">評価終了</td>
                                @endif
                                @if($column->progress == null || $column->progress < 2)
                                    <td class="cell100 boss_column2">未登録</td>
                                @elseif($column->progress == 5)
                                    <td class="cell100 boss_column2">
                                        <a href="{{ action('EvaluationController@eva_boss1', $column->id)}}">
                                            <i class="fas fa-external-link-alt fa-lg"></i>
                                        </a>
                                    </td>
                                @else
                                    <td class="cell100 boss_column2">
                                        <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}">
                                            <i class="fas fa-external-link-alt fa-lg"></i>
                                        </a>
                                    </td>
                                @endif
                                @if($column->progress == null || $column->progress < 7)
                                    <td class="cell100 boss_column2"></td>
                                @else
                                    <td class="cell100 boss_column2 text-info">{{$column->evaluation}}({{$column->point}}ポイント/5)</td>
                                @endif
                                @if($column->progress == null || $column->progress < 2)
                                    <td class="cell100 boss_column2"></td>
                                @elseif($column->progress >= 2)
                                    <td class="cell100 boss_column2">{{$column->updated_at->format('Y/m/d')}}</td>
                                @endif
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
