@extends('layouts.admin')
@php

    @endphp
@section('content')

    <div class="my-2">
        <div class="h5">考課マスタ</div>
    </div>
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">考課新規登録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/category_create" method="post">
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
                            @foreach( $years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                        <p class="text-secondary small">※考課登録済みの年度は削除後に再登録できます。</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">考課登録画面へ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 dep_column1">所属一覧</th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column5 text-center" style="background-color: #16ad8f">
                            <button type="button" class="text-light" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus fa-lg"></i></button>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll py-2" style="background-color: #a1a7ad;">
                <table >
                    <tbody >
                    <tr class="row100 body my-2" >
                        <th class="cell100 class_column1" style="background-color: #a1a7ad;">年</th>
                        <th class="cell100 class_column1" style="background-color: #a1a7ad;">ステータス</th>
                        <th class="cell100 class_column1" style="background-color: #a1a7ad;">考課番号</th>
                        <th class="cell100 class_column1" style="background-color: #a1a7ad;">考課名</th>
                        <th class="cell100 class_column3" style="background-color: #a1a7ad;"></th>
                    </tr>
                </table>
            </div>
            @if(count($columns) === 0)
            @else
                <div class="table100-body js-pscroll">
                    <table>
                        <tbody>
                        @php
                            $n2 =0;
                        @endphp
                        @foreach( $columns as $column)
                            @php
                                $categories = $column->category;
                                $n =0;
                            @endphp
                            <tr class="row100 body">
                                <td class="cell100 class_column1">{{$column->year}}</td>
                                <td class="cell100 class_column1">目標入力期間</td>
                                <td class="cell100 class_column1">
                                    @foreach($categories as $category)
                                        <input type="hidden" value="{{$n++}}">
                                        <p>{{$n}}</p>
                                    @endforeach
                                </td>
                                <td class="cell100 class_column1">
                                    @foreach($categories as $category)
                                        <p>{{$category->category}}</p>
                                    @endforeach
                                </td>
                                <td class="cell100 class_column3 text-center p-0">
                                    <a href="{{ action('CategoryController@show', $column->id)}}"><i class="fas fa-edit text-info fa-lg px-2"></i></a>
                                    <button type="button" class="text-light" data-toggle="modal" data-target="#delete_modal{{$n2}}" ><i class="far fa-trash-alt text-danger fa-lg px-2"></i></button>
                                </td>
                            </tr>
                            <div class="modal" id="delete_modal{{$n2}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body my-3"><strong>{{$column->year}}年度</strong>の考課を削除しますか？</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            <a href="{{ action('CategoryController@delete', $column->id)}}" class="btn btn-danger">削除する</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                            $n2++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    @endif
@endsection
