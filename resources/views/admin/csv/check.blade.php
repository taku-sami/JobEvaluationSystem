@extends('layouts.admin')
@section('content')
    <body>
    <div class="my-2">
        <div class="h5">データ入出力</div>
    </div>
    <hr>
    <div class="card mt-3" style="border-radius: 10px 10px 0px 0px">
        <div class="card-header" style="color: #fff; background-color: #1abc9c; border-radius: 10px 10px 0px 0px;padding: 18px 40px">
            Googleスプレッドシート
        </div>
        <form action="/register" method="post">
            @csrf
            <div class="card-body">
                <div class="h5">確認画面</div>
                <hr>
                @php
                    $n=0;
                @endphp
                @foreach($unique_years as $year)
                    <input type="hidden" value="{{$year}}" name="unique_year[]">
                @endforeach
                @foreach($categories as $category)
                    <input type="hidden" value="{{$n++}}">
                    <div>{{$n}}</div>
                    <div class="border p-3">
                        @php
                            $year = $category->{'gsx$年'}->{'$t'};
                            $name = $category->{'gsx$考課名'}->{'$t'};
                            $standard = $category->{'gsx$考課基準'}->{'$t'};
                        @endphp
                        <div>年：{{ $year }}</div>
                        <input type="hidden" value="{{$year}}" name="year[]">
                        <div>考課名：{{ $name }}</div>
                        <input type="hidden" value="{{$name}}" name="name[]">
                        <div>考課基準：{{ $standard }}</div>
                        <input type="hidden" value="{{$standard}}" name="standard[]">

                    </div>
                @endforeach
            </div>
            <div class="col-md-6 mx-auto my-4 text-center">
                <a href="/importExportView" class="text-white btn btn-secondary btn-lg btn-embossed m-3">戻る</a>
                <button type="submit" class="text-white btn btn-primary btn-lg btn-embossed m-3">登録</button>
            </div>
        </form>
    </div>
@endsection('content')
