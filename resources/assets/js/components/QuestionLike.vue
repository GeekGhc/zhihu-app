<template>
    <div class="answer-item-action question-like">
        <i class="fa fa-star fa-icon-sm"></i>
        收藏
    </div>
</template>
<script>
    import HeaderComponent from './components/header.vue'
    import OtherComponent from './components/other.vue'
    export default{
        data(){
            return{
                msg:'hello vue'
            }
        },
        components:{
            'other-component':OtherComponent,
            HeaderComponent,
        }
    }
</script>
