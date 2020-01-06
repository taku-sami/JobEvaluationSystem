@extends('layouts.admin')

@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">役職マスタ</h4>
        <a href="/add_class" type="button" class="btn-pill col-1 py-2"><i class="fas fa-plus-circle"></i> 新規登録</a>
    </div>
    <hr>

    <ul class="responsive-table text-center w-50 m-auto">
        @php
            $n =0;
        @endphp
        <li class="table-header">
            <div class="col col-3">Id</div>
            <div class="col col-3">役職</div>
            <div class="col col-3">権限</div>
            <div class="col col-1"></div>
        </li>
        @foreach( $columns as $column)
            @if($column->class_auth === 'staff')
                @php
                    $class_name = "被評価者";
                @endphp
            @elseif($column->class_auth === 'boss1')
                @php
                    $class_name = "１次評価者";
                @endphp
            @elseif($column->class_auth === 'boss2')
                @php
                    $class_name = "２次評価者";
                @endphp
            @elseif($column->class_auth === 'admin')
                @php
                    $class_name = "システム管理者";
                @endphp
            @endif
            <input type="hidden" value="{{$n++}}">
            <li class="table-row">
                <div class="col col-3">{{$n}}</div>
                <div class="col col-3">{{$column->class_name}}</div>
                <div class="col col-3">{{$class_name}}</div>
                <div class="col col-1">
                    <div class="dropdown d-inline">
                        <button type="button" class="bg-white border-0" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ action('StaffClassController@show', $column->id)}}">編集</a>
                            <a class="dropdown-item" href="{{ action('StaffClassController@delete', $column->id)}}">削除</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endsection
