@extends('layouts.login')

@section('content')
    <div class="full-page text-right p-3">
        <!-- Button trigger modal -->
        <button type="button" class="text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="far fa-question-circle fa-lg"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ヘルプ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <p class="text-primary">アプリの概要</p>
                        <p>アプリの概要についてはgithub.comのページに記載しております。</p>
                        <hr>
                        <p class="text-primary">画面構成</p>
                        <p>「ログイン画面」「管理者画面」「被評価者画面」「承認者画面」の３つの画面で構成されています。</p>
                        <hr>
                        <p class="text-primary">ログイン画面</p>
                        <img src="https://drive.google.com/uc?export=view&id=1Obq2nA7a6UxaP50JV_0xp8UXXoU_9vmH" alt=""><br>
                        <p>ログインページです。認証はメールアドレス、パスワードで行います。</p>
                        <p>パスワードの再設定もこのページで行うことができます。</p>
                        <p>初回ログインはデモユーザーでご利用ください。デモユーザーのメールアドレス、ロールは以下です。</p>
                        <p>※パスワードは「password」です。</p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>部署</th>
                                <th>ロール</th>
                                <th>メールアドレス</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>システム管理者</td>
                                <td>システム管理者</td>
                                <td>admin@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>開発部</td>
                                <td>スタッフ</td>
                                <td>dev_staff1@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>開発部</td>
                                <td>スタッフ</td>
                                <td>dev_staff2@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>開発部</td>
                                <td>スタッフ</td>
                                <td>dev_staff3@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>開発部</td>
                                <td>課長</td>
                                <td>dev_boss1@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>開発部</td>
                                <td>部長</td>
                                <td>dev_boss2@gmail.com</td>
                            </tr>
                            </tbody>
                        </table>
                        <p>部署はこの他に「営業部」「人事部」の２つを用意しています。</p>
                        <p>これらでログインする場合はアドレスの「dev」の部分をそれぞれ「sell」もしくは「hr」としてください。</p>
                        <hr>
                        <p class="text-primary">管理者画面</p><br>
                        <img src="https://drive.google.com/uc?export=view&id=1qjp1tV-Bp6ZjSoM7z5Clnik8v0USVt_D" alt="">
                        <p>ロール「システム管理者」専用画面です。</p>
                        <p>考課登録や社員登録などのDB操作・確認を行います。</p>
                        <hr>
                        <p class="text-primary">被評価者画面</p>
                        <img src="https://drive.google.com/uc?export=view&id=1tk6JgzZqk94FLX6183PKnyWDv9G-NpwB" alt=""><br>
                        <p>ロール「スタッフ」専用画面です。</p>
                        <p>自身の目標登録、評価登録を行います。</p>
                        <hr>
                        <p class="text-primary">承認者画面</p><br>
                        <img src="https://drive.google.com/uc?export=view&id=1-0KoTFo4gG8SS_EkShkHg61Pqb2TFtjp" alt="">
                        <p>ロール「課長 / 部長」専用画面です。</p>
                        <p>同じ部署に所属するスタッフの目標承認、評価を行います。</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style=" padding-top:60px;">
            <div class="text-center h3 mb-5">Web 人事考課システム</div>
            <div class="row justify-content-center">
                <div class="col-md-4 bg-light border" style="border-radius: 30px;">
                    <div class="text-center h5 mt-5 mb-4">ログイン</div>
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group w-75 mx-auto my-5">
                                <input type="email" value="{{ old('email') }}" placeholder="メールアドレスを入力してください" name="email" class="form-control border md-form @error('email') is-invalid @enderror" required autocomplete="email" autofocus/>
                                <span class="form-control-feedback"><i class="fas fa-envelope"></i></span>
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
