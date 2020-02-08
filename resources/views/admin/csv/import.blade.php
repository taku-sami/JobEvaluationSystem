@php
    print_r(isset($error));
@endphp
@extends('layouts.admin')
@section('content')

    <body>
    <div class="my-2">
        <div class="h5">データ入出力</div>
    </div>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">考課データインポート</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-3">
                    <div>Googleスプレッドシートから考課データをインポートします。</div>
                    <br>
                    <div>よろしいですか？</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <a href="{{ route('register_category') }}" class="btn btn-primary">登録</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card mt-3" style="border-radius: 10px 10px 0px 0px">
        <div class="card-body">
            <div class="border p-3">
                <p class="text-secondary">考課データインポート</p>
                <p class="small text-secondary">入力フォームは<a target=”_blank” href="{{ route('show_sheets') }}"><strong>こちら</strong></a>からアクセスできます。</p>
                <p class="small text-secondary">フォームに入力後、下記ボタンを押下によりデータをインポートできます。</p>
                @if(empty($error))
                @else
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
                <button type="button" class="btn btn-embossed  btn-warning" data-toggle="modal" data-target="#exampleModal" >データのインポート</button>
                <p class="small text-secondary">※Googleスプレッドシートからインポートします。</p>
            </div>
            <br>
            <div class="border p-3">
                <p class="text-black-50">評価データエクスポート</p>
                <a class="btn btn-embossed  btn-warning" target=”_blank” href="{{ route('export') }}">データのエクスポート</a>
                <p class="small text-secondary">※Googleスプレッドシートにエクスポートします。</p>
            </div>
        </div>
    </div>
@endsection('content')
