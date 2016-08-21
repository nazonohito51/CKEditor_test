CKEDITOR.plugins.add('my_image',
{
    init : function(editor) {
        editor.addCommand(
            'insertJugemImage',
            {
                exec : function( editor )
                {
                    image_modal.open();
                }
            }
        );

        editor.ui.addButton(
            'my_image',
            {
                label: 'image',
                command: 'insertJugemImage',
                icon: this.path + 'my_image.gif'
            }
        );
    }
});
