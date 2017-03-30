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
        props:['user'],
        mounted() {
//            console.log(this.question+"--"+this.user);
            this.$http.get('/api/user/followers/'+this.user).then(response => {
                this.followed = response.data.followed;
                console.log(response.data.followed);
            })
        },
        data(){
            return {
                followed: false,
            }
        },
        methods:{
            follow(){
                this.$http.post('/api/user/follow',{'user':this.user}).then(response => {
                    this.followed = response.data.followed;
                    console.log(response.data);
                })
            }
        },
        computed: {
            text(){
                return this.followed ? '已关注' : '关注他';
            }
        }
    }
</script>
