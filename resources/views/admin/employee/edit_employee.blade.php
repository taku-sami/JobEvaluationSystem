@extends('layouts.admin')
@php
@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">社員マスタ</h4>
    </div>
    <hr>
    <div class="col-md-4 bg-light border mx-auto" style="border-radius: 30px;">
        <div class="">
            <form method="POST" action="/editemployee">
                @csrf
                <input type="hidden" value="{{$user->id}}" name="id">
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class=" h5 my-4">社員情報編集</div>
                        <label for="email" class="">氏名</label>
                        <input type="text" class="form-control md-form" name="username" value="{{ $user->name }}" required placeholder="氏名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <label for="email" class="">メールアドレス</label>
                        <input type="email" class="form-control md-form" name="email" value="{{ $user->email }}" required placeholder="メールアドレスを入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <label for="email" class="">所属部署</label>
                        <select class="form-control md-form" name="department" id="">
                            <option value="">所属部署を選択してくだい</option>
                            @foreach($departments as $department)
                                <option value="{{$department->dep_name}}">{{$department->dep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <label for="email" class="">役職</label>
                        <select class="form-control md-form" name="class" id="">
                            <option value="">役職を選択してください</option>
                            @foreach($classes as $class)
                            <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mx-auto text-center">
                        <button type="submit" class="btn-pill border py-2 px-4" style="background-color: #E3FBFF;">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
