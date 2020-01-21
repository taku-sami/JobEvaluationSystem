@extends('layouts.admin')
@section('content')
    <div class="my-2">
        <div class="h5">考課情報編集</div>
    </div>
    <hr>
    <div class="card mt-3" >
        <div class="card-header" style="color: #fff; background-color: #1abc9c;">
            {{$categories->year}}年度考課編集
        </div>
        <div class="card-body">
            <form action="/editcategory" method="post">
                @csrf
                <div class="col-md-6  mx-auto" style="border-radius: 15px;">
                    <div id="sample">
                        @php
                            $category = $categories->category;
                            $n = 0;
                        @endphp
                        @foreach($category as $item)
                            <input type="hidden" value="{{$n++}}">
                            <input type="hidden" value="{{$item->id}}" name="id[]">
                            <div class="category-form bg-light p-3 border">
                                <div class="my-4" >考課({{$n}})</div>
                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label text-right ">考課名：</label>
                                    <div class="col-sm-9">
                                        <input type="text"class="form-control" value="{{$item->category}}" name="category[]" required placeholder="考課名を入力" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">考課基準：</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$item->standard}}" name="standard[]" required placeholder="考課基準を入力">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

                <div class="form-group row mt-3">
                    <div class="col-md-6 mx-auto text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-embossed ">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
