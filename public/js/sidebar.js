$('#sidebar-wrapper').load('/html/sidebar.html', function() {
    $('#sidebar').simpleSidebar({
        wrapper: '#main',
        opener: '#sidebarOpener',
        sidebar: {
            align: 'left',
        },
        sbWrapper: {
            display: false
        }
    });
});

function changeDesign(design_css) {
    design_url = '/css/' + design_css;
    design_html = '<!-- @import url(' + design_url + '); -->';
    $('#blog_design').html(design_html);
    postDesign(1, design_css)
}
function postDesign(userId, design_css) {
    $.ajax({
        url: '/api/design/' + userId,
        type: 'POST',
        dataType: 'json',
        data: {
            'design_css': design_css
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
