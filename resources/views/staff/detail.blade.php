@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')
    <div class="my-2">
        <div class="h5">{{$user->name}} さんの人事考課  {{$category->year}}年</div>
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
    <form action="/addgoal" method="post">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="id">
        <input type="hidden" value="{{$user->name}}" name="name">
        <input type="hidden" value="{{$user->class}}" name="class">
        <input type="hidden" value="{{$category->year}}" name="year">
        <input type="hidden" value="{{$user->department}}" name="department">
        <div class="tabs" style="">
            <input id="all" type="radio" name="tab_item" checked>
            <label class="tab_item m-0" for="all" style="border-radius: 10px 0px 0px 0px ;">目　標</label>
            <input id="programming" type="radio" name="tab_item">
            <label class="tab_item m-0" for="programming" style="border-radius: 0px 10px 0px 0px ;">評　価</label>
            <div class="tab_content p-0" id="all_content">
                <div class="tab_content_description">
                    <div class="wrap-table100">
                        <div class="table100 ver1 p-0" style="border-radius: 0px">
                            <div class="table100-body js-pscroll py-2" style="background-color: #a1a7ad;">
                                <table >
                                    <tbody >
                                    <tr class="row100 body my-2">
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
                                        $category = $category->category;
                                        $n=0;
                                    @endphp
                                    @foreach($category as $item)
                                        @php
                                            $n++;
                                       @endphp
                                        <tr class="row100 body border-bottom">
                                            <input type="hidden" name="category_id[{{$n}}]" value="{{$item->id}}">
                                            <td rowspan="" class="cell100 employee_column3">{{$item->category}}</td>
                                            <td rowspan="" class="cell100 employee_column2">{{$item->standard}}</td>
                                            <td rowspan="" class="cell100 employee_column2">
                                                @if ($errors->has("goal.$n"))
                                                    <div class="alert alert-danger">{{$errors->first("goal.$n")}}</div>
                                                @endif
                                                <textarea placeholder="目標を入力" name="goal[{{$n}}]]" id="" style="resize: none;width:98%;height: 120px;color: #6c757d; border:dimgray 1.5px solid">{{ old("goal.$n")  }}</textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class=" py-2 text-center">
                            <a href="/staff" class="btn btn-default col-1 py-2 m-3">戻る</a>
                            <button type="submit" class="btn btn-primary col-1 py-2 m-3">登録する</button>
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
                                        <th class="cell100 employee_column4 text-center" style="background-color: #a1a7ad; font-size: 15px">評価者</th>
                                        <th class="cell100 employee_column4 text-center" style="background-color: #a1a7ad; font-size: 15px">ランク</th>
                                        <th class="cell100 employee_column4 text-center" style="background-color: #a1a7ad; font-size: 15px">コメント</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="table100-body js-pscroll">
                                <table>
                                    <tbody>
                                    @php
                                        $n=0;
                                    @endphp
                                    @foreach($category as $item)
                                        @php
                                            $n++;
                                        @endphp
                                        <tr class="row100 body" style="height: 80px;">
                                            <td rowspan="3" class="cell100 employee_column3 border-bottom">{{$item->category}}</td>
                                            <td rowspan="3" class="cell100 employee_column2 border-bottom">{{$item->standard}}</td>
                                            <td class="cell100 employee_column4 text-center">被評価者</td>
                                            <td class="cell100 employee_column4 text-center">
                                                <label class="px-2"><input disabled type="radio">SS</label>
                                                <label class="px-2"><input disabled type="radio">S</label>
                                                <label class="px-2"><input disabled type="radio">A</label>
                                                <label class="px-2"><input disabled type="radio">B</label>
                                                <label class="px-2"><input disabled type="radio">C</label>
                                            </td>
                                            <td class="cell100 employee_column4">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px;color: #6c757d;" disabled></textarea>
                                            </td>
                                        </tr>
                                        @if($n%2 == 1)

                                            <tr class="row100 body" style="background-color: white;height: 80px;">
                                            <td class="cell100 employee_column4 text-center">１次評価者</td>
                                            <td class="cell100 employee_column4 text-center">
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
                                                <td class="cell100 employee_column4 text-center">１次評価者</td>
                                                <td class="cell100 employee_column4 text-center">
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
                                            <td class="cell100 employee_column4 text-center">２次評価者</td>
                                            <td class="cell100 employee_column4 text-center">
                                                <label class="px-2"><input disabled type="radio">SS</label>
                                                <label class="px-2"><input disabled type="radio">S</label>
                                                <label class="px-2"><input disabled type="radio">A</label>
                                                <label class="px-2"><input disabled type="radio">B</label>
                                                <label class="px-2"><input disabled type="radio">C</label>
                                            </td>
                                            <td class="cell100 employee_column4">
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
                </div>
            </div>
        </div>



        {{--        <div class="form-group">--}}
        {{--            <table class="roundedCorners text-center">--}}
        {{--                <tr>--}}
        {{--                    <th style="width: 10%;" >カテゴリー</th>--}}
        {{--                    <th style="width: 20%;" >評価基準</th>--}}
        {{--                    <th style="width: 20%;" >目標</th>--}}
        {{--                    <th style="width: 45%;" colspan="3">評価</th>--}}
        {{--                </tr>--}}
        {{--                @php--}}
        {{--                    $category = $category->category;--}}
        {{--                    $n=0;--}}
        {{--                @endphp--}}
        {{--                @foreach($category as $item)--}}
        {{--                    <input type="hidden" value="{{$n++}}">--}}
        {{--                    <tr>--}}
        {{--                        <input type="hidden" name="category_id[{{$n}}]" value="{{$item->id}}">--}}
        {{--                        <td rowspan="3">{{$n}} {{$item->category}}</td>--}}
        {{--                        <td rowspan="3">{{$item->standard}}</td>--}}
        {{--                        <td rowspan="3"><textarea placeholder="ここに目標を入力" name="goal[{{$n}}]]" id="" style="resize: none;width:98%;height: 160px;color: #6c757d;"></textarea></td>--}}
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
        {{--                        <td>{{$item->boss2_eva}}</td>--}}
        {{--                        <td>{{$item->boss2_comment}}</td>--}}
        {{--                    </tr>--}}
        {{--                @endforeach--}}
        {{--            </table>--}}

    </form>
@endsection
