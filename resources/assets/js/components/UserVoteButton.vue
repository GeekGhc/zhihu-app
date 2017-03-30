<template>
    <button class="btn btn-default"
            v-bind:class="{'btn-primary':voted}"
            v-text="text"
            v-on:click="vote"
    >
    </button>
</template>

<script>
    export default {
        props:['answer','count'],
        mounted() {
//            console.log(this.question+"--"+this.user);
            this.$http.post('/api/answer/'+this.answer+'/votes/users').then(response => {
                this.voted = response.data.voted;
                console.log(response.data.voted);
            })
        },
        data(){
            return {
                voted: false,
            }
        },
        methods:{
            vote(){
                this.$http.post('/api/answer/vote',{'answer':this.answer}).then(response => {
                    this.voted = response.data.voted;
                    response.data.voted ? this.count++ : this.count--;
                    console.log(response.data);
                })
            }
        },
        computed: {
            text(){
                return this.count;
            }
        }
    }
</script>
