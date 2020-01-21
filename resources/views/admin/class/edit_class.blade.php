@extends('layouts.admin')

@section('content')
    <div class="my-2">
        <div class="h5">役職マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            役職情報編集
        </div>
        <div class="card-body">
            <form method="POST" action="/editclass">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">役職名</label>
                        <input type="hidden" name="id" value="{{$class->id}}">
                        <input type="text" class="form-control border" name="class_name" value="{{$class->class_name}}" required placeholder="役職名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">権限</label>
                        <select class="form-control md-form" name="class_auth" id="">
                            <option disabled>権限を選択してください</option>
                            @if($class->class_auth == "staff")
                                <option value="staff" selected>被評価者</option>
                                <option value="boss1">１次評価者</option>
                                <option value="boss2">２次評価者</option>
                                <option value="admin">システム管理者</option>
                            @elseif($class->class_auth == "boss1")
                                <option value="staff">被評価者</option>
                                <option value="boss1" selected>１次評価者</option>
                                <option value="boss2">２次評価者</option>
                                <option value="admin">システム管理者</option>
                            @elseif($class->class_auth == "boss2")
                                <option value="staff">被評価者</option>
                                <option value="boss1">１次評価者</option>
                                <option value="boss2" selected>２次評価者</option>
                                <option value="admin">システム管理者</option>
                            @elseif($class->class_auth == "admin")
                                <option value="staff">被評価者</option>
                                <option value="boss1">１次評価者</option>
                                <option value="boss2">２次評価者</option>
                                <option value="admin" selected>システム管理者</option>
                            @endif
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
