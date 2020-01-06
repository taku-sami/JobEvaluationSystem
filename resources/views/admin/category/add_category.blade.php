@extends('layouts.admin')

@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課マスタ</h4>
    </div>
    <hr>
    <div class="col-md-6 bg-light border mx-auto" style="border-radius: 30px;">
            <form method="POST" action="/addcategory">
                @csrf
                <div class="form-group row ">
                    <div class="col-md-10 mx-auto">
                        <div class=" h5 my-4">考課新規登録</div>
                        <label for="email" class="">考課年度</label>
                        <input type="text" class="form-control md-form w-25" name="year" value="{{ old('class_name') }}" required placeholder="yyyy">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（１）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category1" value="{{ old('category1') }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard1" value="{{ old('standard1') }}" required placeholder="考課基準を入力してください">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（２）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category2" value="{{ old('category2') }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard2" value="{{ old('standard2') }}" required placeholder="考課基準を入力してください">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（３）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category3" value="{{ old('category3') }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard3" value="{{ old('standard3') }}" required placeholder="考課基準を入力してください">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mx-auto text-center">
                        <button type="submit" class="btn-pill border py-2 px-4 hover1" style="background-color: #E3FBFF;">登録</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
