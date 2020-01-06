@extends('layouts.admin')

@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課マスタ</h4>
    </div>
    <hr>
    <div class="col-md-6 bg-light border mx-auto" style="border-radius: 30px;">
        <div class="">
            <form method="POST" action="/editcategory">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group row ">
                    <div class="col-md-10 mx-auto">
                        <div class=" h5 my-4">考課新規登録</div>
                        <label for="email" class="">考課年度</label>
                        <input type="text" class="form-control md-form w-25" value="{{ $category->year }}" disabled required placeholder="yyyy">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（１）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category1" value="{{ $category->category1 }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard1" value="{{ $category->standard1 }}" required placeholder="考課基準を入力してください">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（２）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category2" value="{{ $category->category2 }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard2" value="{{ $category->standard2 }}" required placeholder="考課基準を入力してください">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-10 mx-auto">
                        <div class="mb-2"><strong>考課（３）</strong></div>
                        <div class="col-11">
                            <label for="password" class="">考課名</label>
                            <input type="text" class="form-control md-form w-50 mb-3" name="category3" value="{{ $category->category3 }}" required placeholder="考課名を入力してください">
                            <label for="password" class="">評価基準</label>
                            <input type="text" class="form-control md-form" name="standard3" value="{{ $category->standard3 }}" required placeholder="考課基準を入力してください">
                        </div>
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
