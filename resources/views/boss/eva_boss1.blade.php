@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</h4>
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
            <div>社員番号：{{$evaluation->user->id}}</div>
            <div>氏名：{{$evaluation->user->name}}</div>
            <div>部署：{{$evaluation->user->department}}</div>
            <div>役職：{{$evaluation->user->class}}</div>
            <div>メールアドレス：{{$evaluation->user->email}}</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10">評価</h4>
    </div>
    <form action="/evaluation_boss" method="post">
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
                        <select class="form-control" name="" disabled id="exampleFormControlSelect1" >
                            <option selected >{{$evaluation->self_eva1}}</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="boss1_eva1" id="exampleFormControlSelect1" >
                            <option selected disabled class="">評価を選択してください</option>
                            <option value="1">C</option>
                            <option value="2">B</option>
                            <option value="3">A</option>
                            <option value="4">S</option>
                            <option value="5">SS</option>
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
                        <select class="form-control" disabled name="" id="exampleFormControlSelect1" >
                            <option selected >{{$evaluation->self_eva2}}</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="boss1_eva2" id="exampleFormControlSelect1" >
                            <option selected disabled class="">評価を選択してください</option>
                            <option value="1">C</option>
                            <option value="2">B</option>
                            <option value="3">A</option>
                            <option value="4">S</option>
                            <option value="5">SS</option>
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
                        <select class="form-control" disabled name="" id="exampleFormControlSelect1" >
                            <option selected >{{$evaluation->self_eva3}}</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="boss1_eva3" id="exampleFormControlSelect1" >
                            <option disabled selected class="">評価を選択してください</option>
                            <option value="1">C</option>
                            <option value="2">B</option>
                            <option value="3">A</option>
                            <option value="4">S</option>
                            <option value="5">SS</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option></option>
                        </select>
                    </td>
                </tr>
                @if($root >=6)
                    <td colspan="6" class="text-center">
                        <br>
                    </td>
                @else
                    <td colspan="6" class="text-center">
                            <button type="submit" class="btn btn-outline-secondary col-1 py-2 m-3">登録する</button>
                    </td>
                @endif
            </table>
        </div>
    </form>


@endsection
