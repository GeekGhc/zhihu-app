<template>
    <button class="btn btn-default"
            v-bind:class="{'btn-success':followed}"
            v-text="text"
            v-on:click="follow"
    >
    </button>
</template>

<script>
    export default {
        props:['question'],
        mounted() {
//            console.log(this.question+"--"+this.user);
            this.$http.post('/api/question/isFollow',{'question':this.question}).then(response => {
                this.followed = response.data.followed;
                console.log("question followed is "+response.data.followed);
            })
        },
        data(){
            return {
                followed: false,
            }
        },
        methods:{
            follow(){
                this.$http.post('/api/question/follow',{'question':this.question}).then(response => {
                    this.followed = response.data.followed;
                    console.log(response.data);
                })
            }
        },
        computed: {
            text(){
                return this.followed ? '已关注' : '关注问题';
            }
        }
    }
</script>
