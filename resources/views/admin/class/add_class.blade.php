@extends('layouts.admin')

@section('content')
    <div class="my-2">
        <div class="h5">役職マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            役職新規登録
        </div>
        <div class="card-body">
            <form method="POST" action="/addclass">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="class_name" class="">役職名</label>
                        @if ($errors->has('class_name'))
                            <div class="alert alert-danger">{{$errors->first('class_name')}}</div>
                        @endif
                        <input type="text" class="form-control border" name="class_name" value="{{ old('class_name') }}"  placeholder="役職名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('class_auth'))
                            <div class="alert alert-danger">{{$errors->first('class_auth')}}</div>
                        @endif
                        <label for="class_auth" class="">権限</label>
                        <select class="form-control md-form" name="class_auth" id="">
                            <option value="" selected>権限を選択してください</option>
                            <option value="staff">被評価者</option>
                            <option value="boss1">１次評価者</option>
                            <option value="boss2">２次評価者</option>
                            <option value="admin">システム管理者</option>
                        </select>
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
