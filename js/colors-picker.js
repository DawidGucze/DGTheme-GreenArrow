// COLORS PICKER
jQuery(document).ready(function() {
	
	"use strict";

	if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ) {
		jQuery( '#dgt_theme_color' ).wpColorPicker();
	} else {
		jQuery( '#colorpicker' ).farbtastic( '#dgt_theme_color' );
	}

});