requirejs.config({
    paths: {
        Backbone: '../utils/libraries/backbone',
        jquery: '../utils/libraries/jquery'
    },
    shim: {
        'Backbone': {
            deps: ['../utils/libraries/lodash', 'jquery'], // load dependencies
            exports: 'Backbone' // use the global 'Backbone' as the module value
        }
    }
});

