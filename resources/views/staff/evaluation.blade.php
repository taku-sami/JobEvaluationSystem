@extends('layouts.staff')
@php
    $user = Auth::user();
@endphp
@section('content')
    <div class="my-2">
        <div class="h5">{{$user->name}} さんの人事考課  {{$evaluation->year}}年</div>
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            @if($image)
                <img class="d-flex mr-3" src="data:image/png;base64,<?= $image ?>" style="width: 150px;height: 150px;">
            @else
                <img class="d-flex mr-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width: 150px;height: 150px;">
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
    <div class="my-2 ">
        <div class="h5">
            評価登録
        </div>
        @if(count($errors) >= 1)
            <div class="alert alert-danger">入力内容に誤りがあります。</div>
        @endif
    </div>
    <form action="/evaluation_regist" method="post">
        @csrf
        <input type="hidden" name="user_eva_id" value="{{$evaluation->id}}">
        <div class="tabs" style="">
            <input id="all" type="radio" name="tab_item" checked>
            <label class="tab_item m-0" for="all" style="border-radius: 10px 0px 0px 0px ;">目　標</label>
            <input id="programming" type="radio" name="tab_item">
            <label class="tab_item m-0" for="programming" style="border-radius: 0px 10px 0px 0px ;">評　価</label>
            <div class="tab_content p-0" id="all_content">
                <div class="tab_content_description">
                    <div class="wrap-table100">
                        <div class="table100 ver1 p-0" style="border-radius: 0px">
                            <div class="table100-body js-pscroll py-3" style="background-color: #a1a7ad;">
                                <table >
                                    <tbody >
                                    <tr class="row100 body my-2 text-center">
                                        <th class="cell100 employee_column3" style="background-color: #a1a7ad; font-size: 15px">考 課 名</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評 価 基 準</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">目 標</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="table100-body js-pscroll">
                                <table>
                                    <tbody>
                                    @php
                                        $items = $evaluation->evaluations;
                                        $n = 0;
                                    @endphp
                                    @foreach($items as $item)
                                        <tr class="row100 body border-bottom" style="height: 120px">
                                            <td rowspan="" class="cell100 employee_column3">{{$item->category->category}}</td>
                                            <td rowspan="" class="cell100 employee_column2">{{$item->category->standard}}</td>
                                            <td rowspan="" class="cell100 employee_column2">{{$item->goal}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class=" py-2 text-center">
                            <a href="/staff" class="btn btn-default col-1 py-2 m-3">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab_content p-0" id="programming_content">
                <div class="tab_content_description">
                    <div class="wrap-table100">
                        <div class="table100 ver1 p-0" style="border-radius: 0px">
                            <div class="table100-body js-pscroll py-3" style="background-color: #a1a7ad;">
                                <table >
                                    <tbody >
                                    <tr class="row100 body my-2 text-center" >
                                        <th class="cell100 employee_column3" style="background-color: #a1a7ad; font-size: 15px">考 課 名</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評 価 基 準</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評 価 者</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">ラ ン ク</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">コ メ ン ト</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="table100-body js-pscroll">
                                <table>
                                    <tbody>
                                    @php
                                        $n = 0;
                                    @endphp
                                    @foreach($items as $item)
                                        <tr class="row100 body" style="height: 80px;">
                                            <input type="hidden" value="{{$n++}}">
                                            <input type="hidden" name="id[{{$n}}]" value="{{$item->id}}">
                                            <td rowspan="3" class="cell100 employee_column3 border-bottom">{{$item->category->category}}</td>
                                            <td rowspan="3" class="cell100 employee_column2 border-bottom">{{$item->category->standard}}</td>
                                            <td class="cell100 employee_column2 text-center">被評価者</td>
                                            <td class="cell100 employee_column2 text-center">
                                                @if ($errors->has("self_eva.$n"))
                                                    <div class="alert alert-danger">{{$errors->first("self_eva.$n")}}</div>
                                                @endif
                                                <label class="px-2"><input required type="radio" name="self_eva[{{$n}}]" value="SS">SS</label>
                                                <label class="px-2"><input required type="radio" name="self_eva[{{$n}}]" value="S">S</label>
                                                <label class="px-2"><input required type="radio" name="self_eva[{{$n}}]" value="A">A</label>
                                                <label class="px-2"><input required type="radio" name="self_eva[{{$n}}]" value="B">B</label>
                                                <label class="px-2"><input required type="radio" name="self_eva[{{$n}}]" value="C">C</label>
                                            </td>
                                            <td rowspan="" class="cell100 employee_column2">
                                                @if ($errors->has("self_comment.$n"))
                                                    <div class="alert alert-danger">{{$errors->first("self_comment.$n")}}</div>
                                                @endif
                                                <textarea placeholder="ここに目標を入力" name="self_comment[{{$n}}]]" id="" style="resize: none;width:98%;height: 90px; color: #6c757d; border:dimgray 1.5px solid">{{ old("self_comment.$n") }}</textarea>
                                            </td>
                                        </tr>
                                        @if($n%2 == 1)

                                            <tr class="row100 body" style="background-color: white;height: 80px;">
                                                <td class="cell100 employee_column2 text-center" style="color: lightgray">１次評価者</td>
                                                <td class="cell100 employee_column2 text-center" style="color: lightgray">
                                                    <label class="px-2"><input disabled type="radio">SS</label>
                                                    <label class="px-2"><input disabled type="radio">S</label>
                                                    <label class="px-2"><input disabled type="radio">A</label>
                                                    <label class="px-2"><input disabled type="radio">B</label>
                                                    <label class="px-2"><input disabled type="radio">C</label>
                                                </td>
                                                <td class="cell100 employee_column4 text-center">
                                                    <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px;color: #6c757d;" disabled></textarea>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="row100 body" style="background-color: #EFEFEF;height: 80px;">
                                                <td class="cell100 employee_column2 text-center" style="color: lightgray">１次評価者</td>
                                                <td class="cell100 employee_column2 text-center" style="color: lightgray">
                                                    <label class="px-2"><input disabled type="radio">SS</label>
                                                    <label class="px-2"><input disabled type="radio">S</label>
                                                    <label class="px-2"><input disabled type="radio">A</label>
                                                    <label class="px-2"><input disabled type="radio">B</label>
                                                    <label class="px-2"><input disabled type="radio">C</label>
                                                </td>
                                                <td class="cell100 employee_column4 text-center">
                                                    <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px;color: #6c757d;" disabled></textarea>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="row100 body border-bottom" style="height: 80px;">
                                            <td class="cell100 employee_column2 text-center" style="color: lightgray">２次評価者</td>
                                            <td class="cell100 employee_column2 text-center" style="color: lightgray">
                                                <label class="px-2"><input disabled type="radio">SS</label>
                                                <label class="px-2"><input disabled type="radio">S</label>
                                                <label class="px-2"><input disabled type="radio">A</label>
                                                <label class="px-2"><input disabled type="radio">B</label>
                                                <label class="px-2"><input disabled type="radio">C</label>
                                            </td>
                                            <td rowspan="" class="cell100 employee_column2" style="color: lightgray">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px;color: #6c757d;" disabled></textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" py-2 text-center">
                    <a href="/staff" class="btn btn-default col-1 py-2 m-3">戻る</a>
                    <button type="submit" class="btn btn-primary col-1 py-2 m-3">登録する</button>
                </div>
            </div>
        </div>
    </form>
@endsection
