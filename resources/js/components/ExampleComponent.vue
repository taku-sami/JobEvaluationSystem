<template>
    <div class="form-block">
        <button class="btn btn-success"
        >New Category</button>
<!--    <div v-for="(category, index) in categories">-->
    <div >
        <div class="my-4" >考課(1)</div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">考課名：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" required placeholder="考課名を入力"
                    >
                <input type="text" class="form-control" required placeholder="考課名を入力"
                    v-model="categories.name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">考課基準：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  required placeholder="考課基準を入力"
                       >
                <input type="text" class="form-control"  required placeholder="考課基準を入力"
                       v-model="categories.standard">
            </div>
        </div>
        <hr>
    </div>
    </div>
</template>

<script>
    // window.onload = function(){
    // var app = new Vue({
    //     el:'.form-block',
    //     mounted: function() {console.log('tests')},
    //     data:{
    //         categories:[
    //             {
    //                 name:'',
    //                 standard:''
    //             }
    //         ]
    //     }
    // })}

    export default {
        name: "ExampleComponent",
        mounted() {
            console.log("mounted")
        },
        data() {
            return {
                categories: [
                    {
                        name: '',
                        standard: '',
                    }
                ],
            }
        }
    }
</script>
