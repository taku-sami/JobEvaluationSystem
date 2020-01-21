@extends('layouts.admin')
@section('content')

    <body>
    <div class="my-2">
        <div class="h5">CSVマスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            CSV入出力
        </div>
        <div class="card-body">
            <div class="border p-3">
                <p class="text-secondary">考課データインポート</p>
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control m-3">
                    <button class="btn btn-embossed  btn-warning">CSVデータのインポート</button>
                </form>
                <br>
                <p class="small text-secondary">テンプレートは<a href="{{ route('template_export') }}">こちら</a>からダウンロードできます。</p>
            </div>
            <br>
            <div class="border p-3">
                <p class="text-black-50">評価データエクスポート</p>
                <a class="btn btn-embossed  btn-warning" href="{{ route('export') }}">CSVデータのエクスポート</a>
                <br>
            </div>
        </div>
    </div>
@endsection('content')
