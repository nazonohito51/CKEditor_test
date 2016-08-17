CKEDITOR.editorConfig = function( config ) {

    // 共通設定
    config.language = 'ja';
    config.height = 500;
    config.resize_dir = 'vertical';

    // widget plugin使用時にenterModeをいじっていると障害が発生したため、enterModeを元に戻した。
    // 詳細はPRを参照: https://git.pepabo.com/JUGEM/users/pull/1024
    //config.enterMode = CKEDITOR.ENTER_BR;			// EnterでBrタグ改行

    config.shiftEnterMode = CKEDITOR.ENTER_DIV;		// Shift+EnterでDivタグ改行
    config.scayt_autoStartup = false;				// スペルチェック機能無効化（文字入力時に自動的に確定されるのを防ぐ）
    config.skin = 'moono';
    config.browserContextMenuOnCtrl = false;		// CKエディタの右クリックメニューを使わず、ブラウザ標準を使う
    config.pasteFromWordRemoveFontStyles = false;	// ペースト時に装飾タグを除去する
    config.linkShowAdvancedTab = false;
    config.bodyClass = 'contentsEditorBody';
    config.fillEmptyBlocks = false;

    // プラグインを追加（full-allディストリビューションに含まれているプラグイン）
    config.extraPlugins = 'tableresize,lineutils,sourcedialog';

    // 外部プラグインを追加（実体は/manage/ckeditor/$version_num/plugins/で定義）
    config.extraPlugins += ',youtube,uploadimage,image2';

    // 外部プラグインを追加（ブラウザのバージョンごとに対応してるプラグインのみを追加）
    config.extraPlugins += ''
        + ',codemirror'					// CodeMirror (Source) Syntax Highlighting
    ;
    config.removePlugins = 'devtools,magicline,elementspath,smiley,specialchar,pagebreak,scayt';
    config.removeButtons = 'Subscript,Superscript,Flash,Image,Iframe,CreateDiv,Anchor,Styles,About';

    // ConfigHelper
    config.hideDialogFields='link:info:linkType';

    // 画像プレビュー時のダミーテキスト
    config.image_previewText = CKEDITOR.tools.repeat( 'ここにテキストが入ります。', 20 );

    // Disable default CTRL + L keystroke which executes link command by default.
    config.keystrokes = [
        [ CKEDITOR.CTRL + 76, null ],                       // CTRL + L
    ];

    // CodeMirror
    config.codemirror = {
        theme: 'default',				// Set this to the theme you wish to use (codemirror themes)
        lineNumbers: true,				// Whether or not you want to show line numbers
        lineWrapping: true,				// Whether or not you want to use line wrapping
        matchBrackets: true,			// Whether or not you want to highlight matching braces
        autoCloseTags: true,			// Whether or not you want tags to automatically close themselves
        autoCloseBrackets: true,		// Whether or not you want Brackets to automatically close themselves
        enableSearchTools: true,		// Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
        enableCodeFolding: true,		// Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
        enableCodeFormatting: true,		// Whether or not to enable code formatting
        autoFormatOnStart: true,		// Whether or not to automatically format code should be done every time the source view is opened
        autoFormatOnUncomment: true,	// Whether or not to automatically format code 	which has just been uncommented
        highlightActiveLine: true,		// Whether or not to highlight the currently active line
        showSearchButton: true,			// Whether or not to show the search Code button on the toolbar
        highlightMatches: true,			// Whether or not to highlight all matches of current word/selection
        showFormatButton: true,			// Whether or not to show the format button on the toolbar
        showCommentButton: true,		// Whether or not to show the comment button on the toolbar
        showUncommentButton: true,		// Whether or not to show the uncomment button on the toolbar
        showAutoCompleteButton: true	// Whether or not to show the showAutoCompleteButton button on the toolbar
    };

    // Youtube
    config.allowedContent = true;
    config.youtube_width = '560';
    config.youtube_height = '315';
    config.youtube_related = true;
    config.youtube_older = false;
    config.youtube_privacy = false;

    // uploadimage
    config.imageUploadUrl = '/api/image';
    config.oembed_maxWidth = '560';
    config.oembed_maxHeight = '315';

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
        { name: 'document',    groups: [ 'mode' ], items: [ 'Sourcedialog' ] },
        { name: 'about', items: [ 'About' ] }
    ];
    config.toolbar = "Full";

    config.font_names='ＭＳ Ｐゴシック;ＭＳ Ｐ明朝;ＭＳ ゴシック;ＭＳ 明朝;Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif';

};
