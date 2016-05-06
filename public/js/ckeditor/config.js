CKEDITOR.editorConfig = function( config ) {
    config.language = 'ja';
    config.extraPlugins = 'tableresize,lineutils,sourcedialog';
    config.removePlugins = 'devtools,magicline,elementspath,smiley,specialchar,pagebreak,scayt';
    config.removeButtons = 'Subscript,Superscript,Flash,Image,Iframe,CreateDiv,Anchor,Styles,About';
    config.toolbar_Full = [
        { name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'styles', items: [ 'FontSize', 'Font' ] },
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ], items: [ 'Undo', 'Redo' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        '/',
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'others', items: [ 'jugem_picto', 'jugem_image', 'jugem_review', 'instagram', 'petaguru', 'Youtube' ] },
        { name: 'insert', items: [ 'Table', 'HorizontalRule' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
        { name: 'document',    groups: [ 'mode' ], items: [ 'Source' ] },
        { name: 'about', items: [ 'About' ] }
    ];
    config.toolbar = "Full";
    config.font_names='£Í£Ó £Ð¥´¥·¥Ã¥¯;£Í£Ó £ÐÌÀÄ«;£Í£Ó ¥´¥·¥Ã¥¯;£Í£Ó ÌÀÄ«;Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif';

    config.extraPlugins += ',uploadimage,image2';
    config.imageUploadUrl = '/api/image';
};
