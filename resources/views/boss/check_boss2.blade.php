@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        @if((int)$root == 7)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</h4>
            <br>
            <br>
            <div class="col-12 mb-0 alert alert-success h4 text-center" role="alert">
                <strong>評価済み</strong>
            </div>
        @elseif((int)$root == 6)
            <h4 class="col-10 mb-0">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</h4>

        @elseif((int)$root >= 4)
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
        <h4 class="col-10">@if((int)$root >=5)評価@else目標@endif</h4>
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
                            @endif
                        </select>
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
                    <td>２ {{$evaluation->category->category3}}</td>
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
                            @if($evaluation->boss1_eva2 == 1 )
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
                            @if($evaluation->boss1_eva2 == 1 )
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
                </tr>
                <tr>
                    @if((int)$root >= 4)
                        <td colspan="6" class="text-center">
                            <br>
                        </td>
                    @else
                        <td colspan="6" class="text-center">
                            <form action="/denial" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$evaluation->id}}">
                                <button type="submit" class="btn btn-outline-secondary col-1 py-2 m-3">差戻</button>
                            </form>
                            <form action="/approval" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$evaluation->id}}">
                                <input type="hidden" name="name" value="{{$user->name}}">
                                <input type="hidden" name="target_name" value="{{$evaluation->user->name}}">
                                <input type="hidden" name="class" value="{{$user->class}}">
                                <input type="hidden" name="year" value="{{$evaluation->year}}">
                                <button type="submit" class="btn btn-outline-secondary col-1 py-2 m-3">承認</button>
                            </form>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
@endsection
