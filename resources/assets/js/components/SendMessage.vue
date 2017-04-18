<template>
    <div class="action-button">
        <button class="btn btn-default send-msg"
                @click="showSendMessageForm"
        >发送私信
        </button>

        <div class="modal fade" id="modal-send-message" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            发送私信
                        </h4>
                    </div>

                    <div class="modal-body">
                        <textarea name="body" class="form-control" v-model="body" v-if="!status"></textarea>
                        <div class="alert alert-success" v-if="status">
                            <strong>私信发送成功</strong>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="store">
                            发送私信
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['user'],
        data(){
            return {
                body: '',
                status:false
            }
        },
        methods: {
            store(){
                this.$http.post('/api/message/store', {'user': this.user,'body':this.body}).then(response => {
                    this.status = response.data.status;
                    this.body = '';
                    setTimeout(function () {
                        this.status = false
                        $('#modal-send-message').modal('hide');
                    },2000);
                })
            },
            showSendMessageForm(){
                $('#modal-send-message').modal('show');
            }
        },
    }
</script>
