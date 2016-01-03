/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize( 'et_origin[box_bg_hover_color]', function( value ) {
		value.bind( function( to ) {
      $('.image-info').css('background', to);
		} );
	} );
} )( jQuery );
