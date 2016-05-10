$("[name='display-switch']").bootstrapSwitch({onText: "公開", offText: "非公開"});
$("[name='display-switch']").on('switchChange.bootstrapSwitch', function(event, state) {
    var entryId = $(this).val();
    var public = 1;
    if (state == false) {
        public = 0;
    }

    $.ajax({
        url: '/api/entry/public/' + entryId,
        type: 'POST',
        dataType: 'json',
        data: {
            'public': public
        },
        timeout: 5000,
        success: function(data) {
            BootstrapDialog.alert("公開状態の変更に成功しました。");
            if (public == 1) {
                $('#blog-post' + entryId).css('opacity', '1.0')
            } else {
                $('#blog-post' + entryId).css('opacity', '0.6')
            }
        },
        error: function() {
            BootstrapDialog.alert("公開状態の変更に失敗しました。");
        }
    })
});
$('#sortable').sortable();
function sortEntry() {
    var ids = [];
    $("#sortable li.list-group-item").each( function() {
        ids.push($(this).val());
    })

    $.ajax({
        url: '/api/entry/priority/',
        type: 'POST',
        dataType: 'json',
        data: {
            'ids[]': ids
        },
        timeout: 5000,
        success: function(data) {
            BootstrapDialog.alert("記事順番の変更に成功しました。");
        },
        error: function() {
            BootstrapDialog.alert("記事順番の変更に失敗しました。");
        }
    })
}
