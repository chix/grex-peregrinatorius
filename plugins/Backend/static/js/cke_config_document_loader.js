CKEDITOR.editorConfig = function( config ) {
	var websiteEditorConfig = pimcore.globalmanager.get('websiteEditorConfig');
	for (var key in websiteEditorConfig) {
		config[key] = websiteEditorConfig[key];
	}
};
CKEDITOR.dtd.$removeEmpty.i = 0;
