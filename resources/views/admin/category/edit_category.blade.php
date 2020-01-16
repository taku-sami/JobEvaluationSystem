@extends('layouts.admin')

@section('content')
    <div class="row mt-4">
        <h4 class="col-10 mb-0">考課マスタ</h4>
    </div>
    <hr>
    <div class="col-md-6 h5 mx-auto">{{$categories->year}}度年考課編集</div>
    <div class="col-md-6 bg-light border mx-auto" style="border-radius: 15px;">
        <form method="POST" action="/addcategory">
            @csrf
            @php
                $categories = $categories->category;
                $n =0;
            @endphp
            @foreach($categories as $category)
                <div class=" my-4">考課(1)</div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right">考課名：</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$category->category}}" name="input[{{$n}}]" class=" form-control">
                        <input type="hidden" value="{{$category->category}}" name="input[{{$n+1}}]" class="namae form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right">考課基準：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="textarea[0]" value="{{$category->standard}}" required placeholder="考課基準を入力">
                    </div>
                </div>
                <hr>
                <input type="hidden" value="{{$n++}}">
            @endforeach
            <div class="form-group row">
                <div class="col-md-6 mx-auto text-center">
                    <button type="submit" class="btn-pill border py-2 px-4 hover1" style="background-color: #E3FBFF;">登録</button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function() {
            //追加
            $('.addformbox').click(function() {
                //クローンを変数に格納
                var clonecode = $('.box:last').clone(true);

                //数字を＋１し変数に格納
                var cloneno = clonecode.attr('data-formno');
                var cloneno2 = parseInt(cloneno) + 1;
                var cloneno3 = parseInt(cloneno) + 2;
                var title = '考課(' + cloneno3 + ')';

                //data属性の数字を＋１
                clonecode.attr('data-formno',cloneno2);

                //数値
                clonecode.find('.no').html(title);

                //name属性の数字を+1
                var namecode = clonecode.find('input.namae').attr('name');
                namecode = namecode.replace(/input\[[0-9]{1,2}/g,'input[' + cloneno2);
                clonecode.find('input.namae').attr('name',namecode);

                var namecode2 = clonecode.find('textarea.toiawase').attr('name');
                namecode2 = namecode2.replace(/textarea\[[0-9]{1,2}/g,'textarea[' + cloneno2);
                clonecode.find('textarea.toiawase').attr('name',namecode2);

                //HTMLに追加
                clonecode.insertAfter($('.box:last'));
            });


            //削除
            $('.deletformbox').click(function() {
                //クリックされた削除ボタンの親要素を削除
                $(this).parents(".box").remove();

                var scount = 0;
                //番号振り直し
                $('.box').each(function(){
                    var scount2 = scount + 1;

                    //data属性の数字
                    $(this).attr('data-formno',scount);

                    $('.no',this).html(scount2);


                    //input質問タイトル番号振り直し
                    var name = $('input.namae',this).attr('name');
                    name = name.replace(/input\[[0-9]{1,2}/g,'input[' + scount);
                    $('input.namae',this).attr('name',name);

                    var name2 = $('textarea.toiawase',this).attr('name');
                    name2 = name2.replace(/textarea\[[0-9]{1,2}/g,'textarea[' + scount);
                    $('textarea.toiawase',this).attr('name',name2);

                    scount += 1;
                });
            });

        });
    </script>


@endsection
