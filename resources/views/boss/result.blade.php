@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row">
        <div class="form-group w-25 col-3">
            <label for="">社員検索</label>
            <form action="/search" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="氏名 / メールアドレス" required class="form-control border" value="{{$keyword}}" name="keyword" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-light border" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10">検索結果</h4>
    </div>
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 employee_column1" >社員番号</th>
                        <th class="cell100 employee_column2" >氏名</th>
                        <th class="cell100 employee_column2" >部署</th>
                        <th class="cell100 employee_column2" >役職</th>
                        <th class="cell100 employee_column2" >メールアドレス</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @if(!$users->isEmpty())
                        @foreach($users as $user)
                            <tr class="row100 body">
                                <td class="cell100 employee_column1">{{$user->id}}</td>
                                <td class="cell100 employee_column2">
                                    <a href="{{ action('EvaluationController@show_staff', $user->id)}}" style="text-decoration: none">
                                        {{$user->name}}
                                    </a>
                                </td>
                                <td class="cell100 employee_column2">{{$user->department}}</td>
                                <td class="cell100 employee_column2">{{$user->class}}</td>
                                <td class="cell100 employee_column2">{{$user->email}}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="col-12 mb-0 alert alert-danger h4 text-center" role="alert">
                            <strong>該当なし</strong>
                        </div>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
