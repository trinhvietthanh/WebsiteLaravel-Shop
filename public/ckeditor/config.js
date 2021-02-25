/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
    // config.uiColor = '#AADC6E';
    config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert',		groups:[ 'insert', 'html5audio', 'html5video', 'Youtube'] },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
    config.removeButtons = 'Underline,Subscript,Superscript';
    config.extraPlugins = 'youtube';
	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
 
	
};
			
            // 'filebrowserImageBrowseUrl": "/ckfinder/ckfinder.html?type=Images", 
            // "filebrowserFlashBrowseUrl": "/ckfinder/ckfinder.html?type=Flash", 
            // "filebrowserUploadUrl": "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files", 
            // "filebrowserImageUploadUrl": "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images", 
            // "filebrowserFlashUploadUrl": "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"