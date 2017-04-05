<template>
    <div
            class="answer-item-action question-like"
            v-bind:class="{'active':liked}"
            v-html="text"
            v-on:click="like"
    >
        <i class="fa fa-star fa-icon-sm"></i>收藏
    </div>
</template>
<script>
    export default{
        props:['question'],
        mounted() {
            this.$http.post('/api/question/isLike',{'question':this.question}).then(response => {
                this.liked = response.data.liked;
            })
        },
        data(){
            return{
                liked: false,
            }
        },
        methods:{
            like(){
                this.$http.post('/api/question/like',{'question':this.question}).then(response => {
                    this.liked = response.data.liked;
                    console.log("like = "+response.data.liked)
                })
            }
        },
        computed: {
            text(){
                return this.liked ? '<i class="fa fa-star fa-icon-sm"></i>已收藏' : '<i class="fa fa-star fa-icon-sm"></i>收藏';
            }
        }
    }
</script>
