@extends('layouts.admin')
@section('content')

<body>
<div class="row mt-4">
    <h4 class="col-10 mb-0">CSV入出力</h4>
</div>
<hr>
    <div class="card mt-3">
        <div class="card-header">
            CSV出力
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control m-3">
                <br>
                <button class="btn btn-success">考課データのインポート</button>
                <a class="btn btn-warning" href="{{ route('export') }}">評価のエクスポート</a>
            </form>
        </div>
    </div>
@endsection('content')
