define( [ 'jquery' ], function( $ ) {

	return helpers = function() {

		toggle: function( name ) {

			$( '.js-' + name ).slideToggle( 'fast' );

		}
	};
});