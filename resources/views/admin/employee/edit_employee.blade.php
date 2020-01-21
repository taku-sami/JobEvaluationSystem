@extends('layouts.admin')
@php
    @endphp
@section('content')
    <div class="my-2">
        <div class="h5">社員マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            社員新規登録
        </div>
        <div class="card-body">
            <form method="POST" action="/editemployee">
                @csrf
                <input type="hidden" value="{{$user->id}}" name="id">

                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">氏名</label>
                        <input type="text" class="form-control border" name="username" value="{{ $user->name }}" required placeholder="氏名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">メールアドレス</label>
                        <input type="text" class="form-control border" name="email" value="{{ $user->email }}" required placeholder="メールアドレスを入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">所属部署</label>
                        <select class="form-control md-form" name="department" id="">
                            @foreach($departments as $department)
                                @if($user->department == $department->dep_name)
                                    <option value="{{$department->dep_name}}" selected>{{$department->dep_name}}</option>
                                @else
                                    <option value="{{$department->dep_name}}">{{$department->dep_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">役職</label>
                        <select class="form-control md-form" name="class" id="">
                            <option value=""  disabled>役職を選択してください</option>
                            @foreach($classes as $class)
                                @if($user->class == $class->class_name)
                                    <option value="{{$class->class_name}}" selected>{{$class->class_name}}</option>
                                @else
                                    <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="picture" class="">顔写真<span class="small text-secondary"> ※変更がない場合は未入力</span></label>
                        <input type="file" class="form-control　md-form" name="image">
                        {{ csrf_field() }}
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
