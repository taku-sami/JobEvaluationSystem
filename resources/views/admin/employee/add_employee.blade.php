@extends('layouts.admin')
@php
@endphp
@section('content')
    <div class="my-2">
        <div class="h5">社員マスタ</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;" style="border-radius: 10px 0px">
            社員新規登録
        </div>
        <div class="card-body">
            <form method="POST" action="/addemployee" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{$errors->first('name')}}</div>
                            @endif
                            <label for="email" class="">氏名</label>
                        <input type="text" class="form-control border" name="name" value="{{ old('name') }}" placeholder="氏名を入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                        @endif
                        <label for="email" class="">メールアドレス</label>
                        <input type="text" class="form-control border" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('department'))
                            <div class="alert alert-danger">{{$errors->first('department')}}</div>
                        @endif
                        <label for="email" class="">所属部署</label>
                        <select class="form-control md-form" name="department" id="">
                            <option value="" selected>所属部署を選択してくだい</option>
                            @foreach($departments as $department)
                                <option value="{{$department->dep_name}}">{{$department->dep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('class'))
                            <div class="alert alert-danger">{{$errors->first('class')}}</div>
                        @endif
                        <label for="email" class="">役職</label>
                        <select class="form-control md-form" name="class" id="">
                            <option value="" selected>役職を選択してください</option>
                            @foreach($classes as $class)
                                <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        @if ($errors->has('image'))
                            <div class="alert alert-danger">{{$errors->first('image')}}</div>
                        @endif
                        <label for="image" class="">顔写真</label>
                        <input type="file" class="form-control　md-form" name="image" accept="image/*">
                        {{ csrf_field() }}
                    </div>
                    <div class="preview"></div>
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
<script>
    $(function(){
        //画像ファイルプレビュー表示のイベント追加 fileを選択時に発火するイベントを登録
        $('form').on('change', 'input[type="file"]', function(e) {
            var file = e.target.files[0],
                reader = new FileReader(),
                $preview = $(".preview");
            t = this;

            // 画像ファイル以外の場合は何もしない
            if(file.type.indexOf("image") < 0){
                return false;
            }

            // ファイル読み込みが完了した際のイベント登録
            reader.onload = (function(file) {
                return function(e) {
                    //既存のプレビューを削除
                    $preview.empty();
                    // .prevewの領域の中にロードした画像を表示するimageタグを追加
                    $preview.append($('<img>').attr({
                        src: e.target.result,
                        width: "150px",
                        class: "preview",
                        title: file.name
                    }));
                };
            })(file);

            reader.readAsDataURL(file);
        });
    });


</script>
