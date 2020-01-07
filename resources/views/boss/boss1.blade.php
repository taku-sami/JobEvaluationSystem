@extends('layouts.employee')
@php

    @endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">目標・評価一覧</h4>
    </div>
    <hr>
    <div class="row">
        <div class="form-group w-25 col-2">
            <label for="" class="">評価期間</label>
            {{-- TODO セレクトのデザイン変更 --}}
            <form action="/boss" method="post">
                @csrf
                <select class="form-control md-form" name="year" onChange="this.form.submit()">
                    <option value="" disabled>期間を選択してください</option>
                    @foreach($categories as $category)
                        @if($category->year == $year)
                            <option value="{{$category->year}}" selected>{{$category->year}}</option>
                        @else
                            <option value="{{$category->year}}">{{$category->year}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
        <div class="form-group w-25 col-2">
            <label for="">社員検索</label>
            <form action="/search" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="氏名 / メールアドレス" required class="form-control" name="keyword" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-light border" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="bg-white border px-2" style="width: 60%;">
        <div class="container">
            <div class="m-2">
                <div class="row">
                    <div>ステータス</div>
                </div>
                <div class="row text-center">
                    <div class="col-2 border py-3">目標入力中<br><div class="mt-1" style="color: #4476C6">{{$num1}}</div></div>
                    <div class="col-2 border py-3">目標承認中<br><div class="mt-1" style="color: #4476C6">{{$num2}}</div></div>
                    <div class="col-2 border py-3">自己評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num3}}</div></div>
                    <div class="col-2 border py-3">１次評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num4}}</div></div>
                    <div class="col-2 border py-3">２次評価入力中<br><div class="mt-1" style="color: #4476C6">{{$num5}}</div></div>
                    <div class="col-2 border py-3">評価確定済み<br><div class="mt-1" style="color: #4476C6">{{$num6}}</div></div>
                </div>
            </div>
            <div class="m-2">
                <div class="row">
                    <div>最終評価</div>
                </div>
                <div class="row text-center w-75">
                    <div class="col-2 border py-3">SS<br><div class="mt-1"  style="color: #4476C6">{{$count_ss}}</div></div>
                    <div class="col-2 border py-3">S<br><div  class="mt-1" style="color: #4476C6">{{$count_s}}</div></div>
                    <div class="col-2 border py-3">A<br><div  class="mt-1" style="color: #4476C6">{{$count_a}}</div></div>
                    <div class="col-2 border py-3">B<br><div  class="mt-1" style="color: #4476C6">{{$count_b}}</div></div>
                    <div class="col-2 border py-3">C<br><div  class="mt-1" style="color: #4476C6">{{$count_c}}</div></div>
                    <div class="col-2 border py-3">未評価<br><div class="mt-1" style="color: #4476C6">{{$none}}</div></div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <ul class="responsive-table text-center m-auto ">
        <li class="table-header">
            <div class="col col-1.5">氏名</div>
            <div class="col col-1.5">所属</div>
            <div class="col col-1.5">役職</div>
            <div class="col col-1.5">期間</div>
            <div class="col col-1.5">ステータス</div>
            <div class="col col-1.5">目標シート</div>
            <div class="col col-1.5">評価</div>
            <div class="col col-1.5">更新日</div>
        </li>
        <div class="overflow-auto" style="height: 250px;">

            @foreach($columns as $column)
                <li class="table-row">
                    @if($column->progress == null)
                        <div class="col col-1.5">{{$column->name}}</div>
                        <div class="col col-1.5">{{$column->department}}</div>
                        <div class="col col-1.5">{{$column->class}}</div>
                    @elseif($column->progress >= 1)

                        <div class="col col-1.5">{{$column->user->name}}</div>
                        <div class="col col-1.5">{{$column->user->department}}</div>
                        <div class="col col-1.5">{{$column->user->class}}</div>
                    @endif
                    <div class="col col-1.5">{{$year}}</div>
                    @if($column->progress == null)
                        <div class="col col-1.5">未登録</div>
                    @elseif($column->progress == 1)
                        <div class="col col-1.5">差戻</div>
                    @elseif($column->progress == 2)
                        <div class="col col-1.5">１次承認待ち</div>
                    @elseif($column->progress == 3)
                        <div class="col col-1.5">２次承認待ち</div>
                    @elseif($column->progress == 4)
                        <div class="col col-1.5">評価未登録</div>
                    @elseif($column->progress == 5)
                        <div class="col col-1.5">１次評価待ち</div>
                    @elseif($column->progress == 6)
                        <div class="col col-1.5">２次評価待ち</div>
                    @elseif($column->progress == 7)
                        <div class="col col-1.5">評価終了</div>
                    @endif
                    @if($column->progress == null || $column->progress < 2)
                        <div class="col col-1.5">
                            未登録
                        </div>
                    @elseif($column->progress == 5)
                        <div class="col col-1.5">
                            <button class="btn btn-none p-0" type="button" >
                                <a href="{{ action('EvaluationController@eva_boss1', $column->id)}}" class="hover1">
                                    <i class="fas fa-scroll fa-1x"></i>
                                </a>
                            </button>
                        </div>
                    @else
                        <div class="col col-1.5">
                            <button class="btn btn-none p-0" type="button" >
                                <a href="{{ action('EvaluationController@check_for_boss1', $column->id)}}" class="hover1">
                                    <i class="fas fa-scroll fa-1x"></i>
                                </a>
                            </button>
                        </div>
                    @endif
                    @if($column->progress == null || $column->progress < 7)
                        <div class="col col-1.5"></div>
                    @else
                        <div class="col col-1.5">{{$column->evaluation}}({{$column->point}}ポイント)</div>
                    @endif
                    @if($column->progress == null || $column->progress < 2)
                        <div class="col col-1.5">
                        </div>
                    @elseif($column->progress >= 2)
                        <div class="col col-1.5">
                            {{$column->updated_at->format('Y/m/d')}}
                        </div>
                    @endif
                </li>
            @endforeach
        </div>
    </ul>
@endsection
