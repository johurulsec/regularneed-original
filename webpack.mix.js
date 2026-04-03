// // webpack.mix.js
// let mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


// webpack.mix.js
let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Add this if you're using Vue
    .sass('resources/sass/app.scss', 'public/css')
    .version();
