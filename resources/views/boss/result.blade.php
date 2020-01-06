@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">

    </div>
    <div class="form-group w-25 col-2">
        <label for="">社員検索</label>
        <form action="/search" method="post">
            @csrf
            <div class="input-group">
                <input type="text" placeholder="氏名 / メールアドレス" required  class="form-control" name="keyword" value="{{$keyword}}" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-light border" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10">検索結果</h4>
    </div>
    <ul class="responsive-table text-center m-auto ">
        <li class="table-header">
            <div class="col col-1.5">職員番号</div>
            <div class="col col-1.5">氏名</div>
            <div class="col col-1.5">所属</div>
            <div class="col col-1.5">役職</div>
            <div class="col col-1.5">メールアドレス</div>
        </li>
        <div class="overflow-auto" style="height: 500px;">
            @if(!$users->isEmpty())
            @foreach($users as $user)
                    <a href="{{ action('EvaluationController@show_staff', $user->id)}}" class="">
                <li class="table-row">
                        <div class="col col-1.5">{{$user->id}}</div>
                        <div class="col col-1.5">{{$user->name}}</div>
                        <div class="col col-1.5">{{$user->department}}</div>
                        <div class="col col-1.5">{{$user->class}}</div>
                        <div class="col col-1.5">{{$user->email}}</div>
                </li>
                    </a>
            @endforeach
                @else
                <div class="col-12 mb-0 alert alert-danger h4 text-center" role="alert">
                    <strong>該当なし</strong>
                </div>
            @endif
        </div>
    </ul>

@endsection
