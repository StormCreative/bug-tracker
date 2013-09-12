requirejs.config({
    paths: {
        Backbone: '../utils/backbone',
        jquery: '../utils/jquery',
        jqueryui: '../utils/jqueryui'
    },
    shim: {
        'Backbone': {
            deps: ['../utils/lodash', 'jquery', 'jqueryui'], // load dependencies
            exports: 'Backbone' // use the global 'Backbone' as the module value
        }
    }
});

require( ['../views/Wysiwyg', '../views/Listing', 'settings', 'mobilenav', 'tabs'], function ( Wysiwyg, Listing ) {
    var wysiwyg = new Wysiwyg(),
        listing = new Listing();
});

if ( window.File && window.FileReader && window.FileList && window.Blob ) {
    require(['../views/ImageUpload'], function(ImageUpload) {
        var imageupload = new ImageUpload ();
    });
}
else
    require([ 'uploader' ]);