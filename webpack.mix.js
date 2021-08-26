const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.webpackConfig({
    resolve: {
        fallback:
            {"stream": require.resolve("stream-browserify")}

    }
});
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/wallet.js', 'public/js')
    .js('resources/js/new_wallet.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
