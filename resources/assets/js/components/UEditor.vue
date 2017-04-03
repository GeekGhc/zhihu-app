<template>
    <div id="container" name="body" type="text/plain" style="height:120px;">
    </div>
</template>

<script>
    import '../../../../public/vendor/ueditor/ueditor.config.js'
    import '../../../../public/vendor/ueditor/ueditor.all.js'
    export default{
        data(){
            return{

            }
        },
        components:{

        }
    }
</script>

<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container', {
        toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'fullscreen']
        ],
        elementPathEnabled: false,
        enableContextMenu: false,
        autoClearEmptyNode: true,
        wordCount: false,
        imagePopup: false,
        autotypeset: {indent: true, imageBlockLine: 'center'}
    });
    ue.ready(function () {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
