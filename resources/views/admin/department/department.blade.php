@extends('layouts.admin')

@section('content')
    <div class="my-2">
        <div class="h5">所属マスタ</div>
    </div>
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
                        <th class="cell100 dep_column1">所属一覧</th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column2"></th>
                        <th class="cell100 dep_column5 text-center" style="background-color: #16ad8f"><a href="/add_department" class="text-light"><i class="fas fa-plus fa-lg"></i></a></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll py-2" style="background-color: #a1a7ad;">
                <table >
                    <tbody >
                    <tr class="row100 body my-2" >
                        <th class="cell100 dep_column1" style="background-color: #a1a7ad;">番号</th>
                        <th class="cell100 dep_column2" style="background-color: #a1a7ad;">所属名</th>
                        <th class="cell100 class_column3" style="background-color: #a1a7ad;"></th>
                    </tr>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @foreach( $columns as $column)
                        <tr class="row100 body">
                            <td class="cell100 dep_column1"><input type="hidden" value="{{$n++}}">{{$n}}</td>
                            <td class="cell100 dep_column2">{{$column->dep_name}}</td>
                            <td class="cell100 class_column3 text-center p-0">
                                <a href="{{ action('DepartmentController@show', $column->id)}}"><i class="fas fa-edit text-info fa-lg px-2"></i></a>
                                <button type="button" class="text-light" data-toggle="modal" data-target="#delete_modal{{$n}}" ><i class="far fa-trash-alt text-danger fa-lg px-2"></i></button>
                            </td>
                            <div class="modal" id="delete_modal{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body my-3"><strong>{{$column->dep_name}}</strong>を削除しますか？</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            <a href="{{ action('DepartmentController@delete', $column->id)}}" class="btn btn-danger">削除する</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
