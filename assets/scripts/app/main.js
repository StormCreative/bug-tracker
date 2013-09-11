requirejs.config({
    paths: {
        Backbone: '../utils/backbone',
        jquery: '../utils/jquery'
    },
    shim: {
        'Backbone': {
            deps: ['../utils/lodash', 'jquery'], // load dependencies
            exports: 'Backbone' // use the global 'Backbone' as the module value
        }
    }
});

var modules = [ '../views/Login', '../views/Validate', '../modules/helpers', 'tabs' ];

require( modules, function( Login, Validate, helpers ) {

    var Login = new Login(),
        Validate = new Validate();
});