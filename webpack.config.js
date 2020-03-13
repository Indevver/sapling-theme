var Encore = require('@symfony/webpack-encore');
var dotenv = require('dotenv');
const env = dotenv.config();

Encore
    .configureDefinePlugin(options => {
        console.log('is production?: ' + Encore.isProduction());
    })
    .setOutputPath(process.env.OUTPUT_PATH)
    .setPublicPath(process.env.PUBLIC_PATH)
    .setManifestKeyPrefix(process.env.PREFIX)
    .addEntry('app', './assets/js/app.js')
    .addEntry('admin', './assets/js/admin.js')
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureUrlLoader({
        fonts: { limit: 4096 },
        images: { limit: 4096 },
    })
    .enableSassLoader()
    .enablePostCssLoader()
    .enableVueLoader()
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
    })
;

module.exports = Encore.getWebpackConfig();