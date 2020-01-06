@extends('layouts.admin')

@section('content')

            <div class="row mt-4">
            <h4 class="col-10 mb-0">役職マスタ</h4>
            </div>
            <hr>
            <div class="col-md-4 bg-light border mx-auto" style="border-radius: 30px;">
                <div class="">
                    <form method="POST" action="/addclass">
                        @csrf
                        <div class="form-group row ">
                            <div class="col-md-10 mx-auto">
                              <div class=" h5 my-4">役職新規登録</div>
                                <label for="email" class="">役職名</label>
                                <input type="text" class="form-control md-form" name="class_name" value="{{ old('class_name') }}" required placeholder="役職名を入力してください">
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-10 mx-auto">
                                <label for="password" class="">権限</label>
                                <select class="form-control md-form" name="class_auth" id="">
                                    <option value="">権限を選択してください</option>
                                    <option value="staff">被評価者</option>
                                    <option value="boss1">１次評価者</option>
                                    <option value="boss2">２次評価者</option>
                                    <option value="admin">システム管理者</option>
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
