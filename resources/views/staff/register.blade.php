@extends('layouts.staff')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録</div>
                    @isset($message)
                        <div class="card-body">
                            {{$message}}
                        </div>
                    @endisset

                    @empty($message)
                        <div class="card-body mx-auto">
                            <form method="POST" action="{{ route('register.main.registered') }}">
                                @csrf
                                <input type="hidden" name="email_token" value="{{ $email_token }}">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">社員名</label>
                                    <input type="text" class="form-control md-form w-50" disabled value="{{$user->name}}">
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">部署名</label>
                                    <input type="text" class="form-control md-form w-50" disabled value="{{$user->department}}">
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">役職</label>
                                    <input type="text" class="form-control md-form w-50" disabled value="{{$user->class}}">
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">パスワード</label>
                                    <input type="password" name="password" class="form-control md-form w-50"  value="">
                                </div>
                                <div class="form-group row ">
                                        <button type="submit" class="btn btn-primary mx-auto">本登録</button>
                                </div>
                            </form>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
