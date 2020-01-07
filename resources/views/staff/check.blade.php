@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">{{$user->name}} さんの@if($evaluation->progress >=5 )評価@else目標@endif  {{$evaluation->year}}年</h4>
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
        <h4 class="col-10">@if($evaluation->progress >=5 )評価@else目標@endif</h4>
    </div>
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
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        <option selected>{{$evaluation->self_eva1}}</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss1_eva1 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss1_eva1 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss1_eva1 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss1_eva1 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss1_eva1 == 5 )
                            <option selected>SS</option>
                        @endif
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss2_eva1 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss2_eva1 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss2_eva1 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss2_eva1 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss2_eva1 == 5 )
                            <option selected>SS</option>
                        @endif
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
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        <option selected>{{$evaluation->self_eva2}}</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss1_eva2 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss1_eva2 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss1_eva2 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss1_eva2 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss1_eva2 == 5 )
                            <option selected>SS</option>
                        @endif                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss2_eva2 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss2_eva2 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss2_eva2 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss2_eva2 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss2_eva2 == 5 )
                            <option selected>SS</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr>
                <td>３ {{$evaluation->category->category3}}</td>
                <td>{{$evaluation->category->standard3}}</td>
                <td>

                    <div>
                        {{$evaluation->goal_3}}
                    </div>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        <option selected>{{$evaluation->self_eva3}}</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss1_eva3 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss1_eva3 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss1_eva3 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss1_eva3 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss1_eva3 == 5 )
                            <option selected>SS</option>
                        @endif
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" disabled>
                        @if($evaluation->boss2_eva3 == 1 )
                            <option selected>C</option>
                        @elseif($evaluation->boss2_eva3 == 2 )
                            <option selected>B</option>
                        @elseif($evaluation->boss2_eva3 == 3 )
                            <option selected>A</option>
                        @elseif($evaluation->boss2_eva3 == 4 )
                            <option selected>S</option>
                        @elseif($evaluation->boss2_eva3 == 5 )
                            <option selected>SS</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">
                    <a href="/staff" class="col-1 py-2 m-3 btn btn-outline-secondary">戻る</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
