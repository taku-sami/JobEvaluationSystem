<template>
    <div id="sample">
        <button class="btn btn-success">New Category</button>
        <!--        <div v-for="(category, index) in categories">-->
        <div>
            <div>
                <div class="my-4" >考課(1)</div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">考課名：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" required placeholder="考課名を入力" v-model="title">
                        <!--                    <p>category name (index:{{ index }})</p>-->
                        <!--                    <p>category name (index:{{ category }})</p>-->
                        <p>{{title}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">考課基準：</label>
                    <div class="col-sm-9">
                        <!--                        <input type="text" class="form-control"  required placeholder="考課基準を入力" v-model="category.standard">-->
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</template>

<!--<script>-->
<!--    window.onload = function(){-->
<!--    new Vue({-->
<!--        el:'#sample',-->
<!--        data:{-->
<!--            categories:[-->
<!--                {-->
<!--                    name:'',-->
<!--                    standard:''-->
<!--                }-->
<!--            ]-->
<!--        }-->
<!--    })}-->
<!--</script>-->
<script>

    export default {
        name:'Sample',
        el
        data:() =>{
            return{
                title:"aa"
            };
        }
    };

    //
    //     mounted(){},
    //     data(){
    //         return{
    //             categories: [
    //                 {
    //                     name: '',
    //                     standard: '',
    //                 }
    //             ],
    //         }
    //     }
    // }
    // console.log("aa");
    //
    // new Vue({
    //     data:{
    //         category:''
    //     }
    // })
</script>
