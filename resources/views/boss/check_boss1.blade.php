@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        @if((int)$root == 6)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</h4>
            <br>
            <br>
            <div class="col-12 mb-0 alert alert-success h4 text-center" role="alert">
                <strong>評価済み</strong>
            </div>
        @elseif((int)$root == 5)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</h4>

        @elseif((int)$root >= 3)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの目標 {{$evaluation->year}}年</h4>
            <br>
            <br>
            <div class="col-12 mb-0 alert alert-success h4 text-center" role="alert">
                <strong>承認済み</strong>
            </div>
        @elseif((int)$root < 4)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの目標 {{$evaluation->year}}年</h4>
        @endif
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            @if($image)
                <img class="d-flex mr-3" src="data:image/png;base64,<?= $image ?>" style="width: 128px;height: 128px;">
            @else
                <img class="d-flex mr-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width: 128px;height: 128px;">
            @endif
        </div>
        <div class=" my-auto">
            <div>社員番号：{{$evaluation->user->id}}</div>
            <div>氏名：{{$evaluation->user->name}}</div>
            <div>部署：{{$evaluation->user->department}}</div>
            <div>役職：{{$evaluation->user->class}}</div>
            <div>メールアドレス：{{$evaluation->user->email}}</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10 py-3">@if((int)$root >=5)評価@else目標@endif</h4>
    </div>
    <div class="form-group">
        <table class="roundedCorners text-center">
            <tr>
                <th style="width: 10%;" >カテゴリー</th>
                <th style="width: 20%;" >評価基準</th>
                <th style="width: 20%;" >目標</th>
                <th style="width: 45%;" colspan="3">評価</th>
            </tr>
            @php
                $items = $evaluation->evaluations;
                $n = 0;
            @endphp
            @foreach($items as $item)
                <input type="hidden" value="{{$n++}}">
                <tr>
                    <td rowspan="3" style="background-color: #b5dee5;color: white;">{{$n}} {{$item->category->category}}</td>
                    <td rowspan="3" class="text-left">{{$item->category->standard}}</td>
                    <td rowspan="3" class="text-left" >{{$item->goal}}</td>
                    <td style="background-color: #b5dee5;color: white;">被評価者</td>
                    <td>{{$item->self_eva}}</td>
                    <td class="p-0 m-0">{{$item->self_comment}}</td>
                </tr>
                <tr>
                    <td style="background-color: #b5dee5;color: white;">１次評価者</td>
                    <td>{{$item->boss1_eva}}</td>
                    <td class="p-0 m-0">{{$item->boss1_comment}}</td>
                </tr>
                <tr>
                    <td style="background-color: #b5dee5;color: white;">２次評価者</td>
                    <td>{{$item->boss2_eva}}</td>
                    <td class="p-0 m-0">{{$item->boss2_comment}}</td>
                </tr>
            @endforeach
        </table>
        @if($root == 2)
            <div class="pb-5 pt-3 text-center">
                <form action="/denial" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary col-1 py-2 m-3">差戻</button>
                </form>
                <form action="/approval" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$evaluation->id}}">
                    <input type="hidden" name="name" value="{{$user->name}}">
                    <input type="hidden" name="target_name" value="{{$evaluation->user->name}}">
                    <input type="hidden" name="class" value="{{$user->class}}">
                    <input type="hidden" name="year" value="{{$evaluation->year}}">
                    <button type="submit" class="btn btn-primary col-1 py-2 m-3">承認</button>
                </form>
            </div>
        @else
            <div class="pb-5 pt-3 text-center">
                <a href="/boss" class="btn btn-primary col-1 py-2 m-3">戻る</a>
            </div>
        @endif
    </div>
@endsection
