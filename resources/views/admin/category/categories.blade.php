@extends('layouts.admin')
@php@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課マスタ</h4>
        <a href="/add_category" type="button" class="btn-pill col-1 py-2 hover1" style="text-decoration: none"><i class="fas fa-plus-circle"></i> 新規登録</a>
    </div>
    <hr>

    <ul class="responsive-table text-center m-auto">
        @php
            $n =0;
        @endphp
        <li class="table-header">
            <div class="col col-1.5">考課番号</div>
            <div class="col col-1.5">年</div>
            <div class="col col-1.5">考課（１）</div>
            <div class="col col-1.5">評価基準（１）</div>
            <div class="col col-1.5">考課（２）</div>
            <div class="col col-1.5">評価基準（２）</div>
            <div class="col col-1.5">考課（３）</div>
            <div class="col col-1.5">評価基準（３）</div>
        </li>
        @if(count($columns) === 0)
        @else
        @foreach( $columns as $column)
            <input type="hidden" value="{{$n++}}">
            <li class="table-row">
                <div class="col col-1.5">{{$n}}</div>
                <div class="col col-1.5">{{$column->year}}</div>
                <div class="col col-1.5">{{$column->category1}}</div>
                <div class="col col-1.5">{{$column->standard1}}</div>
                <div class="col col-1.5">{{$column->category2}}</div>
                <div class="col col-1.5">{{$column->standard2}}</div>
                <div class="col col-1.5">{{$column->category3}}</div>
                <div class="col col-1.5">{{$column->standard3}}</div>
                <div class="dropdown d-inline">
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
        @if(count($columns) === 0)
        @else

        <a href="/copy_create" type="button" class="hover1"><i class="fas fa-plus-circle fa-3x"></i></a>
        @endif
    </ul>



@endsection
