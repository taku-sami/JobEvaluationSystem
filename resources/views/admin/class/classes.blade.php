@extends('layouts.admin')

@section('content')

    <div class="my-2">
        <div class="h5">役職マスタ</div>
    </div>
{{--        <a href="/add_class" type="button" class="btn-pill col-1 py-2 hover1" style="text-decoration: none"><i class="fas fa-plus-circle"></i> 新規登録</a>--}}
    <hr>
    @php
        $n =0;
    @endphp
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 dep_column1">役職一覧</th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column5 text-center" style="background-color: #16ad8f">
                            <a href="/add_class" class="text-light">
                                <i class="fas fa-plus fa-lg"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll py-2" style="background-color: #a1a7ad;">
                <table >
                    <tbody >
                    <tr class="row100 body my-2" >
                        <th class="cell100 class_column1" style="background-color: #a1a7ad;">番号</th>
                        <th class="cell100 class_column2" style="background-color: #a1a7ad;">役職</th>
                        <th class="cell100 class_column2" style="background-color: #a1a7ad;">権限</th>
                        <th class="cell100 class_column3" style="background-color: #a1a7ad;"></th>
                    </tr>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
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
                        <tr class="row100 body">
                            <td class="cell100 class_column1"><input type="hidden" value="{{$n++}}">{{$n}}</td>
                            <td class="cell100 class_column2">{{$column->class_name}}</td>
                            <td class="cell100 class_column2">{{$class_name}}</td>
                            <td class="cell100 class_column3 text-center p-0">
                                <a href="{{ action('StaffClassController@show', $column->id)}}"><i class="fas fa-edit text-info fa-lg px-2"></i></a>
                                <a href="{{ action('StaffClassController@delete', $column->id)}}"><i class="far fa-trash-alt text-danger fa-lg px-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
