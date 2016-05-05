CKEDITOR.editorConfig = function( config ) {
    config.language = 'ja';
    config.extraPlugins = 'uploadimage,image2';
    config.imageUploadUrl = '/api/image';
};
