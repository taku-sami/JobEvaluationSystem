@extends('layouts.employee')
@php
    $user = Auth::user();
@endphp
@section('content')

    <div class="my-2 ">
        @if((int)$root == 6)
            <div class="h5">{{$evaluation->user->name}} さんの人事考課 （{{$evaluation->year}}年）</div>
            <br>
            <br>
            <div class="col-12 mb-0 alert alert-success div text-center" role="alert">
                <strong>評価済み</strong>
            </div>
        @elseif((int)$root == 5)
            <div class="h5">{{$evaluation->user->name}} さんの人事考課 （{{$evaluation->year}}年）</div>

        @elseif((int)$root >= 4)
            <div class="h5">{{$evaluation->user->name}} さんの人事考課 （{{$evaluation->year}}年）</div>
            <br>
            <br>
            <div class="col-12 mb-0 alert alert-success div text-center" role="alert">
                <strong>承認済み</strong>
            </div>
        @elseif((int)$root < 4)
            <div class="h5">{{$evaluation->user->name}} さんの人事考課 （{{$evaluation->year}}年）</div>
        @endif
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
            <div>社員番号：{{$evaluation->user->id}}</div>
            <div>氏名：{{$evaluation->user->name}}</div>
            <div>部署：{{$evaluation->user->department}}</div>
            <div>役職：{{$evaluation->user->class}}</div>
            <div>メールアドレス：{{$evaluation->user->email}}</div>
        </div>
    </div>
    <hr>
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
                                <tbody>
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
                                    $items = $evaluation->evaluations;
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
                    @if($root == 2)
                        <div class="pb-5 pt-3 text-center">
                            <form action="/denial" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger col-1 py-2 m-3">差 戻</button>
                            </form>
                            <form action="/approval" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$evaluation->id}}">
                                <input type="hidden" name="name" value="{{$user->name}}">
                                <input type="hidden" name="target_name" value="{{$evaluation->user->name}}">
                                <input type="hidden" name="class" value="{{$user->class}}">
                                <input type="hidden" name="year" value="{{$evaluation->year}}">
                                <button type="submit" class="btn btn-primary col-1 py-2 m-3">承 認</button>
                            </form>
                        </div>
                    @else
                        <div class="pb-5 pt-3 text-center">
                            <a href="/boss" class="btn btn-default col-1 py-2 m-3">戻 る</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab_content p-0" id="programming_content">
            <div class="tab_content_description">
                <div class="wrap-table100">
                    <div class="table100 ver1 p-0" style="border-radius: 0px">
                        <div class="table100-body js-pscroll py-2" style="background-color: #a1a7ad;">
                            <table >
                                <tbody >
                                <tr class="row100 body my-2" >
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
                                    $n =0;
                                @endphp
                                @foreach($items as $item)
                                    @php
                                        $n++;
                                    @endphp

                                    <tr class="row100 body" style="height: 80px;">
                                        <td rowspan="3" class="cell100 employee_column3 border-bottom">{{$item->category->category}}</td>
                                        <td rowspan="3" class="cell100 employee_column2 border-bottom">{{$item->category->standard}}</td>
                                        <td class="cell100 employee_column4 text-center ">被評価者</td>
                                        <td class="cell100 employee_column4 text-center">
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
                                        <td class="cell100 employee_column4 text-center">
                                            <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d;" disabled>{{$item->self_comment}}</textarea>
                                        </td>
                                    </tr>

                                    @if($n%2 == 1)
                                        <tr class="row100 body" style="background-color: white;height: 80px;">
                                            <td class="cell100 employee_column4 text-center">１次評価者</td>
                                            <td class="cell100 employee_column4 text-center">
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
                                            <td class="cell100 employee_column4 text-center">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d;" disabled>{{$item->boss1_comment}}</textarea>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="row100 body" style="background-color: #EFEFEF;height: 80px;">
                                            <td class="cell100 employee_column4 text-center ">１次評価者</td>
                                            <td class="cell100 employee_column4 text-center">
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
                                            <td class="cell100 employee_column4 text-center">
                                                <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d;" disabled>{{$item->boss1_comment}}</textarea>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="row100 body border-bottom" style="height: 80px;">
                                        <td class="cell100 employee_column4 text-center ">２次評価者</td>
                                        <td class="cell100 employee_column4 text-center">
                                            @if($item->boss2_eva == "5")
                                                <label class="px-2"><input disabled checked type="radio">SS</label>
                                            @else
                                                <label class="px-2"><input disabled type="radio">SS</label>
                                            @endif
                                            @if($item->boss2_eva == "4")
                                                <label class="px-2"><input disabled checked type="radio">S</label>
                                            @else
                                                <label class="px-2"><input disabled type="radio">S</label>
                                            @endif
                                            @if($item->boss2_eva == "3")
                                                <label class="px-2"><input disabled checked type="radio">A</label>
                                            @else
                                                <label class="px-2"><input disabled type="radio">A</label>
                                            @endif
                                            @if($item->boss2_eva == "2")
                                                <label class="px-2"><input disabled checked type="radio">B</label>
                                            @else
                                                <label class="px-2"><input disabled type="radio">B</label>
                                            @endif
                                            @if($item->boss2_eva == "1")
                                                <label class="px-2"><input disabled checked type="radio">C</label>
                                            @else
                                                <label class="px-2"><input disabled type="radio">C</label>
                                            @endif
                                        </td>
                                        <td class="cell100 employee_column4 text-center">
                                            <textarea placeholder="" id="" style="resize: none;width:98%;height: 90px; color: #6c757d;" disabled>{{$item->boss2_comment}}</textarea>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pb-5 pt-3 text-center">
                        <a href="/boss" class="btn btn-default col-1 py-2 m-3">戻 る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
