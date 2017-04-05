<template>
    <div class="action-button">
    <button class="btn btn-default user-follow"
            v-bind:class="{'btn-success':followed}"
            v-text="text"
            v-on:click="follow"
    >
    </button>
    </div>
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
