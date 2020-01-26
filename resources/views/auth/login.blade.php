@extends('layouts.login')

@section('content')
    <div class="full-page text-right p-3">
        <!-- Button trigger modal -->
        <button type="button" class="text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="far fa-question-circle fa-2x"></i>
        </button>
        <!-- Modal -->


        <div class="container-fluid" style=" padding-top:100px;">
            <div class="text-center h3 mb-5">Web 人事考課システム</div>
            <div class="row justify-content-center">
                <div class="col-md-4 bg-light border" style="border-radius: 30px;">
                    <div class="text-center h5 mt-5 mb-4">ログイン</div>
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group w-75 mx-auto my-5">
                                <input type="email" value="{{ old('email') }}" placeholder="メールアドレスを入力してください" name="email" class="form-control border md-form @error('email') is-invalid @enderror" required autocomplete="email" autofocus/>
                                <span class="form-control-feedback"><i class="fas fa-user"></i></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group w-75 mx-auto mt-5 mb-3">

                                <input type="password" value="" placeholder="パスワードを入力してください" class="form-control border md-form @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                <span class="form-control-feedback"><i class="fas fa-lock"></i></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mx-auto text-center mt-3 mb-2">
                                    <button type="submit" class=" btn btn-primary btn-embossed btn-lg">ログイン</button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-10 mx-auto text-center">
                                    <a class="" href="{{ route('password.request') }}" style="font-size: smaller;">
                                        パスワードを忘れた方、パスワード変更の方はこちら
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
