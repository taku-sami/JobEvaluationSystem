@extends('layouts.login')

@section('content')
    <div class="full-page">
        <div class="container-fluid" style=" padding-top:100px;">
            <div class="text-center h2 mb-5">Web 人事考課システム</div>
            <div class="row justify-content-center">
                <div class="col-md-4 bg-light border" style="border-radius: 30px;">
                    <div class="text-center h5 mt-4">ログイン</div>
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row ">
                                <div class="col-md-10 mx-auto">
                                    <label for="email" class="">メールアドレス</label>
                                    <input id="email" type="email" class="form-control md-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-10 mx-auto">
                                    <label for="password" class="">パスワード</label>
                                    <input id="password" type="password" class="form-control md-form @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mx-auto text-center">

                                <button type="submit" class="btn-pill border py-2 px-4" style="background-color: #E3FBFF;">ログイン</button>
                            </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 mx-auto">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link form-control" href="{{ route('password.request') }}" style="font-size: smaller;">
                                        >>パスワードを忘れた方はこちら
                                    </a>
                                @endif
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
