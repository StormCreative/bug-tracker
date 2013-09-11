define(['Backbone'], function(){
    
    return Backbone.View.extend({

        initialize: function(){

            this.errors = false;
        },
        
        el: $('body'),
        
        // Selectors are scoped to the parent element
        events: {
            //Event type .element-name : function-name
            'submit .js-process-form' : 'process'
        },

        process: function(e) {

            this.validate();

            if (this.errors) {
                e.preventDefault();
            }
        },
        
        validate: function() {
            var error_count = 0;

            var target = e.target,
                fields = $( target ).find( '.js-validate' );

            $( fields ).each( _.bind( function(key, value) {
                var item = $(value);
                var value = item.val();

                if (!item.hasClass('js-no-valid')) {

                    /**
                     * Check whether radio buttons have been selected
                     */
                    if (item.hasClass('js-radio')) {
                        
                        if ($('input[type=radio]:checked').length == 0 || $('input[type=checkbox]:checked') == 0) {
                            error_count++;
                            value="";
                        }
                
                    }

                    if (item.hasClass('js-select-menu')) {

                        var selected = $( item ).find( ':selected' ).val();
                        
                        if( !selected || selected == null ) {
                            error_count++;
                            value="";
                        }
                
                    }

                    /**
                     * Check whether at least one checkbox has been checked within an area.
                     * The area is fixed to search specifically within the required section
                     */
                    if (item.hasClass('js-checkbox')) {
                        
                        if (item.attr('data-type') != undefined) {

                            if ($('.js-'+item.attr('data-type')+':checkbox:checked').length == 0) {
                                error_count++;
                                value="";
                            }
                        }

                    }

                    //Validate a email address
                    if( !!value && item.attr( 'data-type' ) == 'email' ) {
                        if( !this.email_format( value ) ) {
                            error_count++;
                            $('.js-error-email').text( 'Your email address is in the incorrect format ( user@example.com )' );
                            value = "";
                        }
                    }

                    if( value== "" ) {
                        $('.js-error-'+item.attr('data-type')).removeClass('hide');
                        $('.js-error-'+item.attr('data-type')).show();
                        error_count++;
                    } else {
                        $('.js-error-'+item.attr('data-type')).addClass('hide');
                        $('.js-error-'+item.attr('data-type')).hide();
                    }
                }
                
            }, this ));

            var compare_password = this.compare_password();

            if (!compare_password) {
                error_count++;
            }

            // If we have errors we scroll it up
            if(error_count > 0) {
                $("html, body").animate({ scrollTop: $('#js-form').offset().top }, 300);
                this.errors = true; 
            } else {
                this.errors = false;
            }
        },

        compare_password: function() {

            if ($('.js-password').length != 0) {

                if ($('.js-confirm-password').val() != "") {
                    if ($('.js-password').val() != $('.js-confirm-password').val()) {

                        $(".js-error-confirm_password_match").removeClass('hide').html('Passwords must match');

                        return false;
                    } else {
                        $(".js-error-confirm_password_match").addClass('hide')
                        return true;
                    }
                }
            } else {
                return true;
            }

        },

        validate_dob: function(item) {

          if ($('.js-dob-day').length != 0) {

                var day = $(".js-dob-day");
                var month = $(".js-dob-month");
                var year = $(".js-dob-year");

                if (day.val() == "" || month.val() == "" || year.val() == "") {
                    $('.js-error-dob').removeClass('hide');
                    return false;
                } else {
                    $('.js-error-dob').addClass('hide');
                    return true;
                }
            } else {
                return true;
            }
        },

        /**
         * Removes validation message once the field has been typed in
         */
        remove_validation: function(e) {
            var type = $(e.target).attr('data-type');

            $('.js-error-'+type).addClass('hide');
        },

        email_format: function ( email ) {

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
                result = true;

            if( reg.test( email ) == false ) {
                result = false; 
            }

            return result;
        }
    }); 
});