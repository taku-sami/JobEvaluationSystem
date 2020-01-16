@extends('layouts.sample')

@section('content')
    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課新規登録</h4>
    </div>
    <hr>
    <form action="/addcategory" method="post">
        @csrf
        <input type="hidden" value="{{$year}}" name="year">
        <div class="col-md-6  mx-auto" style="border-radius: 15px;">
            <div id="sample">
                <div class="h5">{{$year}}年度考課登録</div>
                <div class="text-right mb-3 mr-3">
                    <button class="btn btn-success" v-on:click="addNewCategoryForm">New Category</button>
                </div>
                <div v-for="(category, index) in categories">
                    <span class="float-right m-3" style="coursor:pointer" v-on:click="deleteCategoryForm(index)">X</span>
                    <div class="category-form bg-light p-3 border">
                        <div class="my-4" >考課(@{{index+1}})</div>
                        <div class="form-group row ">
                            <label class="col-sm-3 col-form-label text-right ">考課名：</label>
                            <div class="col-sm-9">
                                <input type="text" v-bind:name="'name[' + index + ']'" class="form-control" required placeholder="考課名を入力" v-model="category.name">
                                <p class="alert-warning">@{{category.name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right">考課基準：</label>
                            <div class="col-sm-9">
                                <input type="text" v-bind:name="'standard[' + index + ']'" class="form-control"  required placeholder="考課基準を入力" v-model="category.standard">
                                <p class="alert-warning">@{{category.standard}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success px-3">登 録</button>
                </div>
            </div>
        </div>
    </form>
@endsection



