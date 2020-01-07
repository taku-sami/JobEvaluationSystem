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
            @if($image_url)
                <img class="d-flex mr-3" src="/{{ $image_url }}" style="width: 128px;height: 128px;">
            @else
                <img class="d-flex mr-3" src="/storage/images/user.jpg" style="width: 128px;height: 128px;">
            @endif        </div>
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
        <h4 class="col-10">目標 / 評価</h4>
    </div>
    <form action="/evaluation_regist" method="post">
        @csrf
        <input type="hidden" value="{{$evaluation->id}}" name="id">
        <div class="form-group">
            <table class="roundedCorners text-center">
                <tr>
                    <th>カテゴリー</th>
                    <th>評価基準</th>
                    <th>目標</th>
                    <th>自己評価</th>
                    <th>１次評価</th>
                    <th>２次評価</th>
                </tr>
                <tr>
                    <td>１ {{$evaluation->category->category1}}</td>
                    <td>{{$evaluation->category->standard1}}</td>
                    <td>
                        <div>
                            {{$evaluation->goal_1}}
                        </div>
                    </td>
                    <td class="w-25">
                        <select class="form-control" name="self_eva1" id="exampleFormControlSelect1" >
                            <option disabled selected class="">評価を選択してください</option>
                            <option>C</option>
                            <option>B</option>
                            <option>A</option>
                            <option>S</option>
                            <option>SS</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>

                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>２ {{$evaluation->category->category2}}</td>
                    <td>{{$evaluation->category->standard2}}</td>
                    <td>
                        <div>
                            {{$evaluation->goal_2}}
                        </div>
                    </td>
                    <td>
                        <select class="form-control" name="self_eva2" id="exampleFormControlSelect1" >
                            <option disabled selected class="">評価を選択してください</option>
                            <option>C</option>
                            <option>B</option>
                            <option>A</option>
                            <option>S</option>
                            <option>SS</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>２ {{$evaluation->category->category3}}</td>
                    <td>{{$evaluation->category->standard3}}</td>
                    <td>
                        <div>
                            {{$evaluation->goal_3}}
                        </div>
                    </td>
                    <td>
                        <select class="form-control" name="self_eva3" id="exampleFormControlSelect1" >
                            <option disabled selected class="">評価を選択してください</option>
                            <option>C</option>
                            <option>B</option>
                            <option>A</option>
                            <option>S</option>
                            <option>SS</option>
                        </select>

                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center">
                        <a href="/staff" class="btn btn-outline-secondary col-1 py-2 m-3">戻る</a>
                        <button type="submit" class="btn btn-outline-secondary col-1 py-2 m-3">登録する</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>


@endsection
