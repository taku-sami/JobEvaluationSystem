@extends('layouts.admin')

@section('content')

    <div class="my-2">
        <div class="h5">所属マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            所属新規登録
        </div>
        <div class="card-body">
            <form method="POST" action="/adddepartment">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <label for="email" class="">所属名</label>
                        <input type="text" class="form-control border" name="dep_name" value="{{ old('class_name') }}" required placeholder="所属名を入力してください">
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
{{--    <div class="col-md-4 bg-light border mx-auto" style="border-radius: 30px;">--}}
{{--        <div class="">--}}
{{--            <form method="POST" action="/adddepartment">--}}
{{--                @csrf--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-md-10 mx-auto">--}}
{{--                        <div class=" h5 my-4">所属新規登録</div>--}}
{{--                        <label for="email" class="">所属名</label>--}}
{{--                        <input type="text" class="form-control md-form" name="dep_name" value="{{ old('class_name') }}" required placeholder="所属名を入力してください">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-md-6 mx-auto text-center">--}}
{{--                        <button type="submit" class="btn-pill border py-2 px-4" style="background-color: #E3FBFF;">登録</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection
