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
