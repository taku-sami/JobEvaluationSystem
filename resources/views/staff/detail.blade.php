@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">{{$user->name}} さんの目標  {{$category->year}}年</h4>
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
            <div>社員番号：{{$user->id}}</div>
            <div>氏名：{{$user->name}}</div>
            <div>部署：{{$user->department}}</div>
            <div>役職：{{$user->class}}</div>
            <div>メールアドレス：{{$user->email}}</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10 py-3">目標登録</h4>
    </div>
    <form action="/addgoal" method="post">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="id">
        <input type="hidden" value="{{$user->name}}" name="name">
        <input type="hidden" value="{{$user->class}}" name="class">
        <input type="hidden" value="{{$category->year}}" name="year">
        <input type="hidden" value="{{$user->department}}" name="department">
        <div class="form-group">
            <table class="roundedCorners text-center">
                <tr>
                    <th style="width: 10%;" >カテゴリー</th>
                    <th style="width: 20%;" >評価基準</th>
                    <th style="width: 20%;" >目標</th>
                    <th style="width: 45%;" colspan="3">評価</th>
                </tr>
                @php
                    $category = $category->category;
                    $n=0;
                @endphp
                @foreach($category as $item)
                    <input type="hidden" value="{{$n++}}">
                    <tr>
                        <input type="hidden" name="category_id[{{$n}}]" value="{{$item->id}}">
                        <td rowspan="3">{{$n}} {{$item->category}}</td>
                        <td rowspan="3">{{$item->standard}}</td>
                        <td rowspan="3"><textarea placeholder="ここに目標を入力" name="goal[{{$n}}]]" id="" style="resize: none;width:98%;height: 160px;border: none;color: #6c757d;"></textarea></td>
                        <td style="background-color: #b5dee5;color: white;">被評価者</td>
                        <td>{{$item->self_eva}}</td>
                        <td class="p-0 m-0">{{$item->self_comment}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #b5dee5;color: white;">１次評価者</td>
                        <td>{{$item->boss1_eva}}</td>
                        <td>{{$item->boss1_comment}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #b5dee5;color: white;">２次評価者</td>
                        <td>{{$item->boss2_eva}}</td>
                        <td>{{$item->boss2_comment}}</td>
                    </tr>
                @endforeach
            </table>
            <div class="pb-5 pt-3 text-center">
                <a href="/staff" class="btn btn-primary col-1 py-2 m-3">戻る</a>
                <button type="submit" class="btn btn-primary col-1 py-2 m-3">登録する</button>
            </div>
        </div>
    </form>
@endsection
