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

mix
    .sass('resources/frontend/scss/app.scss', 'public/css')
    .sass('resources/admin-assets/scss/app.scss', 'public/admin-assets/css/')

    .js('resources/frontend/js/app.js', 'public/js')
    .js('resources/admin-assets/js/app.js', 'public/admin-assets/js')

    .copyDirectory('resources/frontend/images', 'public/images')
    .copyDirectory('resources/admin-assets/images', 'public/admin-assets/images')

    .copyDirectory('resources/admin-assets/js/plugins', 'public/admin-assets/plugins')

    .version();


mix.webpackConfig({
    output: {
        chunkFilename: 'js/chunks/[name].js',
    },
});
if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    }).sourceMaps()
    // .disableNotifications()
}
