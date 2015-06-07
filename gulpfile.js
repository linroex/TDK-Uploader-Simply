var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        "ui.css",
        "main.css"
    ]);

    mix.scripts([
        "jquery-2.1.4.js",
        "bootstrap.js"
    ]);

    mix.version(["css/all.css", "js/all.js"]);

    mix.copy("resources/assets/bower_components", "public/bower_components");
    mix.copy("resources/assets/fonts", "public/fonts");
    mix.copy("resources/assets/images", "public/images");
    mix.copy("resources/assets/css/img", "public/css/img/");
    mix.copy("resources/assets/css/ui/images", "public/css/ui/images");

});
