<template>
    <a id="commentForm">
        <button class="button is-naked delete-button"
                @click="showCommentsForm"
                v-html="text"
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

                    <div class="modal-body" v-if="comments.length > 0">
                        <div>
                            <div class="media" v-for="comment in comments">
                                <div class="media-left">
                                    <a href="#">
                                        <img width="24" class="media-object" :src="comment.user.avatar" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <span class="media-heading">{{comment.user.name}}</span>
                                        <span class="media-comment-time pull-right">{{comment.created_at}}</span>
                                    </div>
                                    {{comment.body}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <input type="text" class="form-control" v-model="body">
                        <button type="button" class="btn btn-primary publish-comment" @click="store">
                            发表评论
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>
<style scoped>
    .media-body{
        color:#000;
    }
    .modal-title{
        color:#1e1e1e;
    }
    .media-body .media-heading{
        color:#00b1b3;
        font-weight:600;
    }
    .modal-body{
        padding-top:0 !important;
    }
    .media{
        margin-top:0 !important;
        padding: 12px 0 10px;
        border-bottom: 1px solid #f0f2f7;
    }
    .media:last-child{
        border:none;
    }
    .media-comment-time{
        color: #8590a6;
        floated:right;
    }
</style>
<script>
    export default {
        props: ['type','model','count'],
        data(){
            return {
                body: '',
                comments:[],
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
                return '<i class="fa fa-comment fa-icon-lg"></i>'+this.count+'条评论';
            },
            total(){
                return this.count
            }
        },
        methods: {
            store(){
                this.$http.post('/api/comment', {'type': this.type,'model':this.model,'body':this.body}).then(response => {
                    let comment = {
                        user : {
                            name:Zhihu.name,
                            avatar:Zhihu.avatar
                        },
                        body: response.data.body,
                        created_at:response.data.created_at
                    }
                    this.comments.push(comment)
                    this.body = ''
                    this.total++;
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

<style>
    .publish-comment{
        margin-top:10px;
    }
</style>