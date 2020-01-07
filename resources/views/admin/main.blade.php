@extends('layouts.admin')
@php
    @endphp
@section('content')

    <h4 class="mt-4">考課残一覧</h4>
    <hr>
    <div class="row">
        <div class="form-group w-25 col-2">
            <label for="" class="h5">評価期間</label>
            {{-- TODO セレクトのデザイン変更 --}}
            <form action="/main" method="post">
                @csrf
                <select class="form-control md-form" name="year" onChange="this.form.submit()">
                    <option value="" disabled>期間を選択してください</option>
                    @foreach($categories as $category)
                        @if($category->year == $year)
                            <option value="{{$category->year}}" selected>{{$category->year}}</option>
                        @else
                            <option value="{{$category->year}}">{{$category->year}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <hr>
    <ul class="responsive-table text-center">
        <li class="table-header">
            <div class="col col-2">氏名</div>
            <div class="col col-2">所属</div>
            <div class="col col-2">役職</div>
            <div class="col col-2">承認未実施</div>
            <div class="col col-2">評価未実施</div>
        </li>
        <div class="overflow-auto" style="height: 260px;">
            @foreach($bosses as $boss)
                <li class="table-row">
                    <div class="col col-2" >{{$boss->name}}</div>
                    <div class="col col-2" >{{$boss->department}}</div>
                    @php
                        $counts = \App\Evaluation::where('department',$boss->department)
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
                    <div class="col col-2" >{{$boss->class}}</div>
                    <div class="col col-2" >{{$count_approval}}名</div>
                    <div class="col col-2" >{{$count_evaluation}}名</div>
                </li>
            @endforeach
        </div>
    </ul>
    <hr>
    <h4 class="mt-4">システムログ</h4>
    <hr>
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
