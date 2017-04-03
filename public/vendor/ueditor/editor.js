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