define(['../utils/api-caller', 'Backbone'], function(api){
    
    return Backbone.View.extend({

        initialize: function(){

        },
        
        el: $('body'),
        
        events: {
            'click .js-forgot-password' : 'forgot_password'
        },

        forgot_password: function ( e ) {

            var target = e.target,
                area = $( target ).attr( 'data-area' );

            helpers.toggle( area );
        }
    });
});
