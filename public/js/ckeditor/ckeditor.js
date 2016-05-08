CKEDITOR.disableAutoInline = true;
CKEDITOR.plugins.addExternal( 'uploadimage', '/js/ckeditor/plugins/uploadimage/', 'plugin.js' );
CKEDITOR.plugins.addExternal( 'oembed', '/js/ckeditor/plugins/oembed/', 'plugin.js' );
CKEDITOR.on( 'log', function( evt ) {
    // Cancel default listener.
    evt.cancel();
    // Log event data.
    console.log( evt.data.type, evt.data.errorCode, evt.data.additionalData );
} );
function switchEditButton(entryId) {
    var editMode = $('#editor1').attr('contenteditable');

    if (editMode == 'true') {
        postEntry(entryId, CKEDITOR.instances.editor1.getData());
    } else {
        editArticle();
    }
}
function editArticle() {
    $('#editor1').attr('contenteditable', true);
    CKEDITOR.inline('editor1', {
        customConfig: '/js/ckeditor/config.js',
        startupFocus: true
    });
    $('#editButton').html('編集内容を保存する').removeClass('btn-default').addClass('btn-success');
}
function postEntry(entryId, entryBody) {
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
            $('#postEntryButton').val('保存完了');
        },
        error: function() {
            $('#postEntryButton').val('保存に失敗しました');
        }
    })
}
function changeDesign() {
    design_css = $('#changeDesignSelect option:selected').val();
    design_url = '/css/' + design_css;
    design_html = '<!-- @import url(' + design_url + '); -->';
    $('#blog_design').html(design_html);
}
function postDesign(userId) {
    design_css = $('#changeDesignSelect option:selected').val();
    $('#postDesignButton').val('保存中...');
    $.ajax({
        url: '/api/design/' + userId,
        type: 'POST',
        dataType: 'json',
        data: {
            'design_css': design_css
        },
        timeout: 5000,
        success: function(data) {
            $('#postDesignButton').val('保存完了');
        },
        error: function() {
            $('#postDesignButton').val('保存に失敗しました');
        }
    })
}
