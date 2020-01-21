@extends('layouts.admin')

@section('content')

    <div class="my-2 h5">{{$year}}年度考課残一覧</div>
    <hr>
    <div class="form-group d-flex align-items-center my-3">
        <form action="/main" method="post">
            @csrf

            <select class="form-control" style="width: 200px" name="year" onChange="this.form.submit()">
                <option value="" disabled　selected>期間を選択してください</option>
                @foreach($categories as $category)
                    @if($category->year == $year)
                        <option value="{{$category->year}}">{{$category->year}}年度</option>
                    @else
                        <option value="{{$category->year}}">{{$category->year}}年度</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110 mb-3">
            <div class="table100-head">
                <table>
                    <thead>
                    <tr class="row100 head">
                        <th class="cell100 class_column1">氏名</th>
                        <th class="cell100 class_column1">所属</th>
                        <th class="cell100 class_column1">役職</th>
                        <th class="cell100 class_column1">承認未実施</th>
                        <th class="cell100 class_column1">評価未実施</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    @foreach($bosses as $boss)
                        <tr class="row100 body">
                            <td class="cell100 class_column1">{{$boss->name}}</td>
                            <td class="cell100 class_column1">{{$boss->department}}</td>
                            @php
                                $counts = \App\UserEvaluation::where('department',$boss->department)
                                ->where('year',$year)
                                ->get();

                                $count_approval = 0;
                                $count_evaluation = 0;

                                if($boss->auth == 'boss1')
                                {
                                    foreach($counts as $count)
                                    {
                                        if($count->progress == 2)
                                        {
                                            $count_approval++;
                                        }elseif($count->progress == 5)
                                        {
                                            $count_evaluation++;

                                        }
                                    }
                                }
                                elseif($boss->auth == 'boss2')
                                {
                                    foreach($counts as $count)
                                    {
                                        if($count->progress == 3)
                                        {
                                            $count_approval++;
                                        }elseif($count->progress == 6)
                                        {
                                            $count_evaluation++;
                                        }
                                    }
                                }
                            @endphp
                            <td class="cell100 class_column1">{{$boss->class}}</td>
                            <td class="cell100 class_column1">{{$count_approval}}名</td>
                            <td class="cell100 class_column1">{{$count_evaluation}}名</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="my-3 h5">システムログ</div>
    <div class="rounded bg-white border px-3 pt-3 overflow-auto text-secondary" id="system_log">
        @php
            $n =0;
        @endphp
        @foreach($logs as $log)
            <input type="hidden" value="{{$n++}}">

            <div class="row">
                <div class="col-1" style="flex: 0 0 4%;">
                    <div>{{$n}}</div>
                </div>
                <div class="col-3" style="flex: 0 0 20%;">
                    <div>{{$log->created_at->format('Y/m/d H:i:s')}}</div>
                </div>
                <div class="col-3">
                    <div>{{$log->class}}　{{$log->name}} さん</div>
                </div>
                <div class="col-5">
                    <div>{{$log->progress}}（{{$log->year}}年）　　@if($log->target_name == !null)対象者　▶︎▶︎▶︎　{{$log->target_name}}@endif</div>
                </div>
            </div>
            <hr class="mt-0">
        @endforeach
    </div>
    <br id="page-content-wrapper">


@endsection
