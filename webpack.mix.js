const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .vue({ version: 2 })
    .sass("resources/sass/app.scss", "public/css")
    .version();

mix.webpackConfig({
    resolve: {
        fallback: {
            zlib: require.resolve("browserify-zlib"),
            stream: require.resolve("stream-browserify"),
            https: require.resolve("https-browserify"),
            http: require.resolve("stream-http"),
        },
    },
});

// mix.browserSync({
//     open: false,
//     host: 'l.standpoint.com.ua',
//     proxy: 'l.standpoint.com.ua', // or project.dev/app/
//     port: 8080
// });
