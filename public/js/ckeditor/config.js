CKEDITOR.editorConfig = function( config ) {
    config.language = 'ja';
    config.extraPlugins = 'tableresize,lineutils,sourcedialog';

    config.extraPlugins += ',uploadimage,image2,oembed';
    config.imageUploadUrl = '/api/image';
    config.oembed_maxWidth = '560';
    config.oembed_maxHeight = '315';
};
