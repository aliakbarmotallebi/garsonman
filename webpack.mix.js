const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/main/javascripts')
   .postCss('resources/css/index.css', 'public/main/styles')
   .postCss('resources/css/app.css', 'public/main/styles');

mix.options({
    postCss: [
        require("tailwindcss")
    ]
});

mix.browserSync({
    proxy: "http://localhost:8000"
});