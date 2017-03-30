<template>
    <div>
        <button class="button is-naked delete-button"
                @click="showCommentsForm"
                v-text="text"
        >发送私信
        </button>

        <div class="modal fade" :id=dialog tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            评论列表
                        </h4>
                    </div>

                    <div class="modal-body">
                        <div v-if="comments.length > 0">
                            <div class="media" v-for="comment in comments">
                                <div class="media-left">
                                    <a href="#">
                                        <img width="24" class="media-object" :src="comment.user.avatar" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{comment.user.name}}</h4>
                                    {{comment.body}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <input type="text" class="form-control" v-model="body">
                        <button type="button" class="btn btn-primary" @click="store">
                            评论
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['type','model','count'],
        data(){
            return {
                body: '',
                comments:[],
                newComment:{
                    user:{
                        name:Zhihu.name,
                        avatar:Zhihu.avatar
                    },
                    'body':'',
                },
            }
        },
        computed:{
            dialog(){
                return 'comments-dialog-'+this.type+'-'+this.model
            },
            dialogId(){
                return '#'+this.dialog;
            },
            text(){
                return this.count+'评论';
            }
        },
        methods: {
            store(){
                this.$http.post('/api/comment', {'type': this.type,'model':this.model,'body':this.body}).then(response => {
                    console.log(response.data)
                    this.newComment.body = response.data.body;
                    this.comments.push(this.newComment);
                    this.body = '';
                    this.count++;
                })
            },
            getComments(){
                this.$http.get('/api/'+this.type+'/'+this.model+'/comments').then(response=>{
                    this.comments = response.data
                })
            },
            showCommentsForm(){
                this.getComments();
                $(this.dialogId).modal('show');
            }
        },
    }
</script>
