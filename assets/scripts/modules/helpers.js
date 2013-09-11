define( [ 'jquery' ], function( $ ) {

	return helpers = {

		toggle: function( name ) {

			$( '.js-' + name ).slideToggle( 'fast' );

		}
	};
});