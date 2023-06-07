const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

let chunkFilename = 'js/chunks/[name].js?v=[hash]';

mix.options({
    enableCssModules: true,
    processCssUrls: false
});

mix.webpackConfig({
    output: {
        chunkFilename: chunkFilename,
        filename: '[name].js'
    },

    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            '@root': path.resolve(
                __dirname
            ),

            '@js': path.resolve(
                __dirname,
                'resources/js'
            ),

            '@components': path.resolve(
                __dirname,
                'resources/js/components'
            ),

            'ziggy': path.resolve("vendor/tightenco/ziggy/dist"),
        }
    },

    plugins: [
        new webpack.optimize.LimitChunkCountPlugin({
            maxChunks: 7
        })
    ]
});


mix.js('resources/js/app.js', 'public/js').vue();

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

mix.sass('resources/scss/app.scss', 'public/css').version();
mix.sass('resources/scss/web.scss', 'public/css').version();
