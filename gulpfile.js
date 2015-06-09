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
        "main.css",
        "style.css",
        "jquery-ui.css",
        "jquery-ui.theme.css"
    ]);

    mix.scripts([
        "jquery-2.1.4.js",
        "bootstrap.js",
        "jquery-ui.js"

    ]);

    mix.version(["css/all.css", "js/all.js"]);

    mix.copy("resources/assets/bower_components", "public/bower_components");
    mix.copy("resources/assets/fonts", "public/build/fonts");
    mix.copy("resources/assets/js/ui.js", "public/js/ui.js");
    mix.copy("resources/assets/images", "public/build/images");
    mix.copy("resources/assets/css/img", "public/build/css/img");
    mix.copy("resources/assets/css/ui/images", "public/build/css/ui/images");
    mix.copy("resources/assets/js/dropzone.js", "public/js/dropzone.js");

});
