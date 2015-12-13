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
			format_tags: 'h1;h2;h3;h4;h5;h6;p',
			removeDialogTabs: 'image:Upload;table:advanced;iframe:advanced',
			ext: {
				dialogDefinitionCallback: function (ev) {
					var dialogName = ev.data.name;
					var dialogDefinition = ev.data.definition;
					var infoTab = null;
					var advancedTab = null;
					if (dialogName == 'link') {
						advancedTab = dialogDefinition.getContents('advanced');
						advancedTab.remove('advId');
						advancedTab.remove('advLangDir');
						advancedTab.remove('advAccessKey');
						advancedTab.remove('advName');
						advancedTab.remove('advLangCode');
						advancedTab.remove('advTabIndex');
						advancedTab.remove('advContentType');
						advancedTab.remove('advCSSClasses');
						advancedTab.remove('advCharset');
						advancedTab.remove('advRel');
						advancedTab.remove('advStyles');
					} else if (dialogName == 'image') {
						infoTab = dialogDefinition.getContents('info');
						advancedTab = dialogDefinition.getContents('advanced');
						
						infoTab.remove('txtBorder');
						infoTab.remove('txtHSpace');
						infoTab.remove('txtVSpace');
						infoTab.remove('cmbAlign');
						advancedTab.remove('linkId');
						advancedTab.remove('cmbLangDir');
						advancedTab.remove('txtLangCode');
						advancedTab.remove('txtGenLongDescr');
						advancedTab.remove('txtGenClass');
						advancedTab.remove('txtdlgGenStyle');
					} else if (dialogName == 'iframe') {
						infoTab = dialogDefinition.getContents('info');
						infoTab.remove('align');
						infoTab.remove('scrolling');
						infoTab.remove('name');
						infoTab.remove('title');
						infoTab.remove('longdesc');
					} else if (dialogName == 'table') {
						infoTab = dialogDefinition.getContents('info');
						infoTab.remove('txtWidth');
						infoTab.remove('txtHeight');
						infoTab.remove('txtBorder');
						infoTab.remove('txtCellSpace');
						infoTab.remove('txtCellPad');
						infoTab.remove('txtSummary');
						infoTab.remove('cmbAlign');
					}
				}
			}
		});
		CKEDITOR.dtd.$removeEmpty.i = 0;
		CKEDITOR.on('dialogDefinition', pimcore.globalmanager.get('websiteEditorConfig').ext.dialogDefinitionCallback);
		pimcore.object.tags.wysiwyg.defaultEditorConfig = pimcore.globalmanager.get('websiteEditorConfig');
    }

});

var backendPlugin = new pimcore.plugin.backend();
