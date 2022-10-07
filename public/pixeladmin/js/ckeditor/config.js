/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    var base_url = window.location.origin;

    var host = window.location.host;

    var pathArray = window.location.pathname.split( '/' );

    config.filebrowserUploadUrl = base_url + '/admin/image-upload';

    config.extraPlugins = 'filebrowser,uploadwidget,uploadimage';

};