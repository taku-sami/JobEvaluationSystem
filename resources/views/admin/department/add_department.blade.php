@extends('layouts.admin')

@section('content')

    <div class="my-2">
        <div class="h5">所属マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            所属新規登録
        </div>
        <div class="card-body">
            <form method="POST" action="/adddepartment">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('dep_name'))
                            <div class="alert alert-danger">{{$errors->first('dep_name')}}</div>
                        @endif
                        <label for="email" class="">所属名</label>
                        <input type="text" class="form-control border" name="dep_name" value="{{ old('class_name') }}" placeholder="所属名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mx-auto text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-embossed ">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
