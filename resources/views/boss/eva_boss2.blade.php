@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="my-2">
        <div class="h5">{{$evaluation->user->name}} さんの評価 {{$evaluation->year}}年</div>
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
    <div class="my-2 ">
        <div class="h5">
            評価
        </div>
    </div>
    <form action="/evaluation_boss" method="post">
        @csrf
        <input type="hidden" name="user_eva_id" value="{{$evaluation->id}}">
        <div class="tabs" style="">
            <input id="all" type="radio" name="tab_item" checked>
            <label class="tab_item m-0" for="all">目標</label>
            <input id="programming" type="radio" name="tab_item">
            <label class="tab_item m-0" for="programming">評価</label>
            <div class="tab_content p-0" id="all_content">
                <div class="tab_content_description">
                    <div class="wrap-table100">
                        <div class="table100 ver1 p-0" style="border-radius: 0px">
                            <div class="table100-body js-pscroll py-3" style="background-color: #a1a7ad;">
                                <table >
                                    <tbody >
                                    <tr class="row100 body my-2 text-center">
                                        <th class="cell100 employee_column3" style="background-color: #a1a7ad; font-size: 15px">考課名</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評価基準</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">目標</th>
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
                                        <tr class="row100 body border-bottom">
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
                                        <th class="cell100 employee_column3" style="background-color: #a1a7ad; font-size: 15px">考課名</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評価基準</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">評価者</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">ランク</th>
                                        <th class="cell100 employee_column2" style="background-color: #a1a7ad; font-size: 15px">コメント</th>
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
                                        <input type="hidden" value="{{$n++}}">
                                        <input type="hidden" name="id[{{$n}}]"value="{{$item->id}}">
                                        <tr class="row100 body" style="height: 80px;">
                                            <td rowspan="3" class="cell100 employee_column3 border-bottom">{{$item->category->category}}</td>
                                            <td rowspan="3" class="cell100 employee_column2 border-bottom">{{$item->category->standard}}</td>
                                            <td class="cell100 employee_column2 text-right">被評価者</td>
                                            <td class="cell100 employee_column2 text-center">
                                                @if($item->self_eva == "SS")
                                                    <label class="px-2"><input disabled checked type="radio">SS</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">SS</label>
                                                @endif
                                                @if($item->self_eva == "S")
                                                    <label class="px-2"><input disabled checked type="radio">S</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">S</label>
                                                @endif
                                                @if($item->self_eva == "A")
                                                    <label class="px-2"><input disabled checked type="radio">A</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">A</label>
                                                @endif
                                                @if($item->self_eva == "B")
                                                    <label class="px-2"><input disabled checked type="radio">B</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">B</label>
                                                @endif
                                                @if($item->self_eva == "C")
                                                    <label class="px-2"><input disabled checked type="radio">C</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">C</label>
                                                @endif
                                            </td>
                                            <td rowspan="" class="cell100 employee_column2">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d; border:none;" disabled>{{$item->self_comment}}</textarea>
                                            </td>
                                        </tr>
                                        <tr class="row100 body" style="background-color: #EFEFEF;height: 80px;">
                                            <td class="cell100 employee_column2 text-right">１次評価者</td>
                                            <td class="cell100 employee_column2 text-center">
                                                @if($item->boss1_eva == "5")
                                                    <label class="px-2"><input disabled checked type="radio">SS</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">SS</label>
                                                @endif
                                                @if($item->boss1_eva == "4")
                                                    <label class="px-2"><input disabled checked type="radio">S</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">S</label>
                                                @endif
                                                @if($item->boss1_eva == "3")
                                                    <label class="px-2"><input disabled checked type="radio">A</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">A</label>
                                                @endif
                                                @if($item->boss1_eva == "2")
                                                    <label class="px-2"><input disabled checked type="radio">B</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">B</label>
                                                @endif
                                                @if($item->boss1_eva == "1")
                                                    <label class="px-2"><input disabled checked type="radio">C</label>
                                                @else
                                                    <label class="px-2"><input disabled type="radio">C</label>
                                                @endif
                                            </td>
                                            <td rowspan="" class="cell100 employee_column2" style="color: lightgray">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d; border:none;" disabled>{{$item->boss1_comment}}</textarea>
                                            </td>
                                        </tr>
                                        <tr class="row100 body border-bottom" style="height: 80px;">
                                            <td class="cell100 employee_column2 text-right">２次評価者</td>
                                            <td class="cell100 employee_column2 text-center">
                                                <label class="px-2"><input name="boss2_eva[{{$n}}]" type="radio" value="5">SS</label>
                                                <label class="px-2"><input name="boss2_eva[{{$n}}]" type="radio" value="4">S</label>
                                                <label class="px-2"><input name="boss2_eva[{{$n}}]" type="radio" value="3">A</label>
                                                <label class="px-2"><input name="boss2_eva[{{$n}}]" type="radio" value="2">B</label>
                                                <label class="px-2"><input name="boss2_eva[{{$n}}]" type="radio" value="1">C</label>
                                            </td>
                                            <td rowspan="" class="cell100 employee_column2" style="color: lightgray">
                                                <textarea name="boss2_comment[{{$n}}]" placeholder="" id="" style="resize: none;width:98%;height: 90px;color: #6c757d; border:dimgray 1.5px solid;color: #6c757d; border:dimgray 1.5px solid;"></textarea>
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
                    <a href="/boss" class="btn btn-default col-1 py-2 m-3">戻る</a>
                    <button type="submit" class="btn btn-primary col-1 py-2 m-3">登録する</button>
                </div>
            </div>
        </div>
    </form>

{{--    <form action="/evaluation_boss" method="post">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="user_eva_id" value="{{$evaluation->id}}">--}}
{{--        <div class="form-group">--}}
{{--            <table class="roundedCorners text-center">--}}
{{--                <tr>--}}
{{--                    <th style="width: 10%;" >カテゴリー</th>--}}
{{--                    <th style="width: 20%;" >評価基準</th>--}}
{{--                    <th style="width: 20%;" >目標</th>--}}
{{--                    <th style="width: 45%;" colspan="3">評価</th>--}}
{{--                </tr>--}}
{{--                @php--}}
{{--                    $items = $evaluation->evaluations;--}}
{{--                    $n = 0;--}}
{{--                @endphp--}}
{{--                @foreach($items as $item)--}}
{{--                    <input type="hidden" value="{{$n++}}">--}}
{{--                    <input type="hidden" name="id[{{$n}}]"value="{{$item->id}}">--}}
{{--                    <tr>--}}
{{--                        <td rowspan="3" style="background-color: #b5dee5;color: white;">{{$n}} {{$item->category->category}}</td>--}}
{{--                        <td rowspan="3" class="text-left">{{$item->category->standard}}</td>--}}
{{--                        <td rowspan="3" class="text-left" >{{$item->goal}}</td>--}}
{{--                        <td style="background-color: #b5dee5;color: white;">被評価者</td>--}}
{{--                        <td>{{$item->self_eva}}</td>--}}
{{--                        <td class="p-0 m-0">{{$item->self_comment}}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td style="background-color: #b5dee5;color: white;">１次評価者</td>--}}
{{--                        <td>{{$item->boss1_eva}}</td>--}}
{{--                        <td>{{$item->boss1_comment}}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td style="background-color: #b5dee5;color: white;">２次評価者</td>--}}
{{--                        <td>--}}
{{--                            <div class="radio">--}}
{{--                                <label><input type="radio" name="boss2_eva[{{$n}}]" value="5">SS</label>--}}
{{--                            </div>--}}
{{--                            <div class="radio">--}}
{{--                                <label><input type="radio" name="boss2_eva[{{$n}}]" value="4">S</label>--}}
{{--                            </div>--}}
{{--                            <div class="radio disabled">--}}
{{--                                <label><input type="radio" name="boss2_eva[{{$n}}]" value="3">A</label>--}}
{{--                            </div>--}}
{{--                            <div class="radio disabled">--}}
{{--                                <label><input type="radio" name="boss2_eva[{{$n}}]" value="2">B</label>--}}
{{--                            </div>--}}
{{--                            <div class="radio disabled">--}}
{{--                                <label><input type="radio" name="boss2_eva[{{$n}}]" value="1">C</label>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td class="p-0 m-0">--}}
{{--                            <textarea placeholder="ここにコメントを入力" name="boss2_comment[{{$n}}]" id="" style="resize: none;width:98%;height: 160px;border: none;color: #6c757d;"></textarea>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            </table>--}}
{{--            @if($root >=7)--}}
{{--                <div class="pb-5 pt-3 text-center">--}}
{{--                    <a href="/boss" class="btn btn-primary col-1 py-2 m-3">戻る</a>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="pb-5 pt-3 text-center">--}}
{{--                    <a href="/boss" class="btn btn-primary col-1 py-2 m-3">戻る</a>--}}
{{--                    <button type="submit" class="btn btn-primary col-1 py-2 m-3">登録する</button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </form>--}}
@endsection
