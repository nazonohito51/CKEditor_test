CKEDITOR.disableAutoInline = true;
CKEDITOR.plugins.addExternal( 'uploadimage', '/js/ckeditor/plugins/uploadimage/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'oembed', '/js/ckeditor/plugins/oembed/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'youtube', '/js/ckeditor/plugins/youtube/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'codemirror', '/js/ckeditor/plugins/codemirror/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'confighelper', '/js/ckeditor/plugins/confighelper/', 'plugin.js' );

CKEDITOR.on( 'log', function( evt ) {
    // Cancel default listener.
    evt.cancel();
    // Log event data.
    console.log( evt.data.type, evt.data.errorCode, evt.data.additionalData );
} );
function createButton() {
    createEntry(CKEDITOR.instances.editor1.getData());
}
function switchEditButton(entryId) {
    var editMode = $('#editor1').attr('contenteditable');

    if (editMode == 'true') {
        updateEntry(entryId, CKEDITOR.instances.editor1.getData());
    } else {
        editArticle();
        $('#editButton').html('編集内容を保存する').removeClass('btn-default').addClass('btn-success');
    }
}
function editArticle() {
    $('#editor1').attr('contenteditable', true);
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editor1', {
        customConfig: '/js/ckeditor/config_test.js',
        startupFocus: true
    });
}
function createEntry(entryBody) {
    $('#postEntryButton').val('保存中...');
    $.ajax({
        url: '/api/entry/',
        type: 'POST',
        dataType: 'json',
        data: {
            'body': entryBody
        },
        timeout: 5000,
        success: function(data) {
            BootstrapDialog.alert("保存完了しました。");
        },
        error: function() {
            BootstrapDialog.alert("保存に失敗しました。");
        }
    })
}
function updateEntry(entryId, entryBody) {
    $('#postEntryButton').val('保存中...');
    $.ajax({
        url: '/api/entry/' + entryId,
        type: 'POST',
        dataType: 'json',
        data: {
            'body': entryBody
        },
        timeout: 5000,
        success: function(data) {
            BootstrapDialog.alert("保存完了しました。");
        },
        error: function() {
            BootstrapDialog.alert("保存に失敗しました。");
        }
    })
}
