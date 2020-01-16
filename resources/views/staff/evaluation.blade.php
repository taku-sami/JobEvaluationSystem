@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')
    <div class="row mt-4">
        <h4 class="col-10 mb-0">{{$user->name}} さんの評価 {{$evaluation->year}}年</h4>
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
        <h4 class="col-10">評価</h4>
    </div>
    <form action="/evaluation_regist" method="post">
        @csrf
        <input type="hidden" name="user_eva_id" value="{{$evaluation->id}}">
        <div class="p-1">
            <table class="text-center">
                <tr>
                    <th style="width: 10%;" >カテゴリー</th>
                    <th style="width: 20%;" >評価基準</th>
                    <th style="width: 20%;" >目標</th>
                    <th style="width: 45%;" colspan="4">評価</th>
                </tr>
                @php
                    $items = $evaluation->evaluations;
                    $n = 0;
                @endphp
                @foreach($items as $item)
                    <input type="hidden" value="{{$n++}}">
                    <input type="hidden" name="id[{{$n}}]"value="{{$item->id}}">
                    <tr>
                        <td rowspan="3" style="background-color: #b5dee5;color: white;">{{$n}} {{$item->category->category}}</td>
                        <td rowspan="3" class="text-left">{{$item->category->standard}}</td>
                        <td rowspan="3" class="text-left" >{{$item->goal}}</td>
                        <td style="background-color: #b5dee5;color: white;">被評価者</td>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="self_eva[{{$n}}]" value="SS">SS</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="self_eva[{{$n}}]" value="S">S</label>
                            </div>
                            <div class="radio disabled">
                                <label><input type="radio" name="self_eva[{{$n}}]" value="A">A</label>
                            </div>
                            <div class="radio disabled">
                                <label><input type="radio" name="self_eva[{{$n}}]" value="B">B</label>
                            </div>
                            <div class="radio disabled">
                                <label><input type="radio" name="self_eva[{{$n}}]" value="C">C</label>
                            </div>
                        </td>
                        <td class="p-0 m-0">
                            <textarea placeholder="ここにコメントを入力" name="self_comment[{{$n}}]" id="" style="resize: none;width:98%;height: 160px;border: none;color: #6c757d;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #b5dee5;color: white;">１次評価者</td>
                        <td>未設定</td>
                        <td>未設定
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #b5dee5;color: white;">２次評価者</td>
                        <td>未設定</td>
                        <td>未設定
                        </td>
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
