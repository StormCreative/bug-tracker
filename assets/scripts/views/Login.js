define(['../utils/api-caller', 'Backbone'], function(api){
    
    return Backbone.View.extend({

        initialize: function(){

            //Define some properties
            this.all_images = [];
            this.upload_count = window.image_count;
            this.total_images_allowed = 4;
            this.image_info;

            this.image;
            this.image_container = $( '.js-images' );
            this.new_width;
            this.new_height;
        },
        
        el: $('body'),
        
        events: {
            'click .js-forgot-password' : 'forgot_password'
        },

        forgot_password: function ( e ) {

            var target = e.target,
                area = $( target ).attr( 'data-area' );

            console.log( area );
        }
    });
});
