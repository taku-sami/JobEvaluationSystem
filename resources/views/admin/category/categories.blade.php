@extends('layouts.admin')
@php

@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課マスタ</h4>
{{--        <a href="/add_category" type="button" class="btn-pill col-1 py-2 hover1" style="text-decoration: none"><i class="fas fa-plus-circle"></i> 新規登録</a>--}}
        <!-- Button trigger modal -->
        <a href="" type="button" class="btn-pill col-1 py-2 hover1" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none">
            <i class="fas fa-plus-circle"></i> 新規登録
        </a>

        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">考課新規登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="category_create" method="post">
                        @csrf
                    <div class="modal-body my-3">
                        <label for="">年度を選択してください：</label>
                        <select name="year" id="" class="text-secondary" style="-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	margin-bottom: 20px;
	padding: 7px 30px 7px 10px;
	font-size: 93%;
	line-height: 1.1em;
	border-radius: 5px;
	border: none;
	background-repeat: no-repeat;
	background-size: 12px 10px;
	background-position: right 10px center;
	background-color: lightgray;">
                            <option value="" selected disabled>年度</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">考課登録画面へ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <ul class="responsive-table text-center m-auto">
        <li class="table-header">
            <div class="col col-3">年</div>
            <div class="col col-3">ステータス</div>
            <div class="col col-2">考課番号</div>
            <div class="col col-3">考課名</div>
            <div class="col col-1"></div>
        </li>
        @if(count($columns) === 0)
        @else
        @foreach( $columns as $column)
            @php
            $categories = $column->category;
            $n =0;
            @endphp
            <li class="table-row">
                <div class="col col-3">{{$column->year}}</div>
                <div class="col col-3 text-center">
                    <p>目標入力期間</p>
                </div>
                <div class="col col-2">
                    @foreach($categories as $category)
                        <input type="hidden" value="{{$n++}}">
                        <p>{{$n}}</p>
                    @endforeach
                </div>
                <div class="col col-3 text-center">
                    @foreach($categories as $category)
                        <p>{{$category->category}}</p>
                    @endforeach
                </div>
                <div class="col col-1 dropdown d-inline">
                    <button type="button" class="bg-white border-0" data-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ action('CategoryController@show', $column->id)}}">編集</a>
                        <a class="dropdown-item" href="{{ action('CategoryController@delete', $column->id)}}">削除</a>
                    </div>
                </div>
            </li>
        @endforeach
        @endif
{{--        @if(count($columns) === 0)--}}
{{--        @else--}}

{{--        <a href="/copy_create" type="button" class="hover1"><i class="fas fa-plus-circle fa-3x"></i></a>--}}
{{--        @endif--}}
    </ul>



@endsection
