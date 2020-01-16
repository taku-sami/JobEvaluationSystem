@extends('layouts.admin')

@section('content')
            <div class="row mt-4">
            <h4 class="col-10 mb-0">社員マスタ</h4>
                <a href="/add_employee" type="button" class="btn-pill col-1 py-2 hover1" style="text-decoration: none"><i class="fas fa-plus-circle"></i> 新規登録</a>
            </div>
            <hr>
            <ul class="responsive-table text-center m-auto">

                <li class="table-header">
                    <div class="col col-1">社員番号</div>
                    <div class="col col-2">氏名</div>
                    <div class="col col-2">部署</div>
                    <div class="col col-2">役職</div>
                    <div class="col col-2">権限</div>
                    <div class="col col-2">メールアドレス</div>
                    <div class="col col-1"></div>
                </li>
                @foreach( $columns as $column)
                <li class="table-row">
                    @if($column->auth === 'staff')
                        @php
                            $auth = "被評価者";
                        @endphp
                    @elseif($column->auth === 'boss1')
                        @php
                            $auth = "１次評価者";
                        @endphp
                    @elseif($column->auth === 'boss2')
                        @php
                            $auth = "２次評価者";
                        @endphp
                    @elseif($column->auth === 'admin')
                        @php
                            $auth = "システム管理者";
                        @endphp
                    @endif
                    <div class="col col-1" >{{$column->id}}</div>
                    <div class="col col-2">{{$column->name}}</div>
                    <div class="col col-2">{{$column->department}}</div>
                    <div class="col col-2">{{$column->class}}</div>
                    <div class="col col-2">{{$auth}}</div>
                    <div class="col col-2">{{$column->email}}</div>
                    <div class="col col-1">
                        <div class="dropdown d-inline">
                            <button type="button" class="bg-white border-0" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ action('EmployeeController@show', $column->id)}}">編集</a>
                                <a class="dropdown-item" href="{{ action('EmployeeController@delete', $column->id)}}">削除</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>



@endsection
