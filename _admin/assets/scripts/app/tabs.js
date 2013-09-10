define(['jquery'], function(){

    var hash = window.location.hash.replace( '#', '' );
    change_tab( hash );

    if( !!window.search_type && typeof window.search_type != 'undefined' ) {
        change_tab( window.search_type );
    }

    $('.js-tabs').on('click', function(e) {

        var element = $(e.target);
        var action = element.attr('data-action');

        change_tab( action );

        e.preventDefault();
    });

    function change_tab( action ) {

        var block;
        var none;
        var hide;

        $( '.js-tab-value' ).val( action );
        window.location.hash = '#' + action;

        if ( action == 'pending' ) {
            none = 'fixed';
            hide ='closed';
            block = 'pending';
        }

        if ( action == 'fixed' ) {
            none = 'pending';
            hide = 'closed';
            block = 'fixed';
        }

         if ( action == 'closed' ) {
            none = 'pending';
            hide = 'fixed';
            block = 'closed';
        }

        // Hide or show the relevant stories
        $('.'+none).css('display','none');
        $('.'+hide).css('display','none');
        $('.'+block).css('display','block');

        // Show which tab is active
        $('.'+none+'-tab').removeClass('active-tab');
        $('.'+hide+'-tab').removeClass('active-tab');
        $('.'+block+'-tab').addClass('active-tab');
    }
});