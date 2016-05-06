CKEDITOR.editorConfig = function( config ) {
    config.language = 'ja';
    config.extraPlugins = 'tableresize,lineutils,sourcedialog';

    config.extraPlugins += ',uploadimage,image2';
    config.imageUploadUrl = '/api/image';
};
