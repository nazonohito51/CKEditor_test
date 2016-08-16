CKEDITOR.disableAutoInline = true;
CKEDITOR.plugins.addExternal( 'uploadimage', '/js/ckeditor/plugins/uploadimage/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'oembed', '/js/ckeditor/plugins/oembed/', 'plugin.js' );
CKEDITOR.on( 'log', function( evt ) {
    // Cancel default listener.
    evt.cancel();
    // Log event data.
    console.log( evt.data.type, evt.data.errorCode, evt.data.additionalData );
} );
function createButton() {
    postEntry(null, CKEDITOR.instances.editor1.getData());
}
function switchEditButton(entryId) {
    var editMode = $('#editor1').attr('contenteditable');

    if (editMode == 'true') {
        postEntry(entryId, CKEDITOR.instances.editor1.getData());
    } else {
        editArticle();
        $('#editButton').html('編集内容を保存する').removeClass('btn-default').addClass('btn-success');
    }
}
function editArticle() {
    $('#editor1').attr('contenteditable', true);
    CKEDITOR.inline('editor1', {
        customConfig: '/js/ckeditor/config.js',
        startupFocus: true
    });
}
function postEntry(entryId, entryBody) {
    if (entryId == null) {
        createEntry();
    } else {
        updateEntry(entryId, entryBody);
    }
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
