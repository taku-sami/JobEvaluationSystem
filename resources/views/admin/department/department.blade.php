@extends('layouts.admin')

@section('content')
            <div class="row mt-4">
                <h4 class="col-10 mb-0">所属マスタ</h4>
                <a href="/add_department" type="button" class="btn-pill col-1 py-2 hover1" style="text-decoration: none;"><i class="fas fa-plus-circle"></i> 新規登録</a>
            </div>
            <hr>

            <ul class="responsive-table text-center w-50 m-auto">
                @php
                    $n =0;
                @endphp
                <li class="table-header">
                    <div class="col col-5">Id</div>
                    <div class="col col-5">所属</div>
                    <div class="col col-1"></div>
                </li>
                @foreach( $columns as $column)
                    <input type="hidden" value="{{$n++}}">
                    <li class="table-row">
                        <div class="col col-5">{{$n}}</div>
                        <div class="col col-5">{{$column->dep_name}}</div>
                        <div class="col col-1" style="flex: 0 0 4.3333333333%;">
                            <div class="dropdown d-inline">
                                <button type="button" class="bg-white border-0" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ action('DepartmentController@show', $column->id)}}">編集</a>
                                    <a class="dropdown-item" href="{{ action('DepartmentController@delete', $column->id)}}">削除</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>



@endsection
