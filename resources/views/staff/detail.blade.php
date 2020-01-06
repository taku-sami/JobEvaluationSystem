@extends('layouts.employee')
@php
$user = Auth::user();
@endphp
@section('content')

    <div class="row mt-4">
        <h4 class="col-10 mb-0">{{$user->name}} さんの目標  {{$category->year}}年</h4>
    </div>
    <hr>
    <div class="row ml-2">
        <div class="">
            <img class="d-flex mr-3" src="https://2.bp.blogspot.com/-k8YyzamaaDU/V6iIXvAN1jI/AAAAAAAA9BI/0fBlVeSqQYc4dRQymfckGd93WmdDqrrkQCLcB/s800/syoumeisyashin_man.png" style="width: 128px;height: 128px;">
        </div>
        <div class=" my-auto">
            <div>社員番号：{{$user->id}}</div>
            <div>氏名：{{$user->name}}</div>
            <div>部署：{{$user->department}}</div>
            <div>役職：{{$user->class}}</div>
            <div>メールアドレス：{{$user->email}}</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-10">目標</h4>
    </div>
    <form action="/addgoal" method="post">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="id">
        <input type="hidden" value="{{$user->name}}" name="name">
        <input type="hidden" value="{{$user->class}}" name="class">
        <input type="hidden" value="{{$category->year}}" name="year">
        <input type="hidden" value="{{$user->department}}" name="department">
        <div class="form-group">
            <table class="roundedCorners text-center">
                <tr>
                    <th>カテゴリー</th>
                    <th>評価基準</th>
                    <th>目標</th>
                    <th>自己評価</th>
                    <th>１次評価</th>
                    <th>２次評価</th>
                </tr>
                <tr>
                    <td>１ {{$category->category1}}</td>
                    <td>{{$category->standard1}}</td>
                    <td>
                        <textarea class="form-control w-50 mx-auto" name="goal_1" id="" rows="3"></textarea>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>２ {{$category->category2}}</td>
                    <td>{{$category->standard2}}</td>
                    <td>
                        <textarea class="form-control w-50 mx-auto" name="goal_2" id="" rows="3"></textarea>
                    </td>
                    <td>
                        <select class="form-control " id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>２ {{$category->category3}}</td>
                    <td>{{$category->standard3}}</td>
                    <td>
                        <textarea class="form-control w-50 mx-auto" name="goal_3" id="" rows="3"></textarea>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center">
                        <a href="/staff" class="btn btn-outline-secondary col-1 py-2 m-3">戻る</a>
                        <button type="submit" class="btn btn-outline-secondary col-1 py-2 m-3">登録する</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>


@endsection
