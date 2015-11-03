pimcore.registerNS("pimcore.plugin.backend");

pimcore.plugin.backend = Class.create(pimcore.plugin.admin, {

    getClassName: function() {
        return "pimcore.plugin.backend";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },
 
    pimcoreReady: function (params,broker){
		//CKE config for objects and documents
		pimcore.globalmanager.add('websiteEditorConfig', {
			entities: false,
			entities_greek: false,
			entities_latin: false,
			disableNativeSpellChecker: false,
			allowedContent: true, //this prevents CKE from removing pimcore attributes from elements
			enterMode: 1,
			toolbar: [
				{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
				{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
				{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'Iframe' ] },
				{ name: 'tools', items: [ 'Sourcedialog' ] },
				'/',
				{ name: 'styles', items: [ 'Styles', 'Format' ] },
				{ name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
				{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
				{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
			],
			stylesSet: 'websiteEditorStyles:/plugins/Backend/static/js/cke_styles.js',
			format_tags: 'h1;h2;h3;h4;h5;h6;p'
		});
		CKEDITOR.dtd.$removeEmpty.i = 0;
		pimcore.object.tags.wysiwyg.defaultEditorConfig = pimcore.globalmanager.get('websiteEditorConfig');
    }

});

var backendPlugin = new pimcore.plugin.backend();
