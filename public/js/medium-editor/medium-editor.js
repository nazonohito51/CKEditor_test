var editor = false;
var editing = false;

function switchEditButton(entryId) {
    if (editing == true) {
        // TODO: postEntryの実装
        //postEntry(entryId, CKEDITOR.instances.editor1.getData());
    } else {
        editArticle();
    }
}
function editArticle() {
    editor = new MediumEditor('#editor1');
    editing = true;
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
            BootstrapDialog.alert("保存完了しました。");
        },
        error: function() {
            BootstrapDialog.alert("保存に失敗しました。");
        }
    })
}
