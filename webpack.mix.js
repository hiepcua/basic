const mix = require('laravel-mix')
// const exec = require('child_process').exec
// require('dotenv').config()

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

const glob = require('glob')
// const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    ;(glob.sync('resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/')
        cb(f, f.replace('resources', 'public'))
    })
}

const sassOptions = {
    precision: 5,
    includePaths: ['node_modules', 'resources/assets/']
}

// plugins Core stylesheets
mixAssetsDir('scss/base/plugins/**/!(_)*.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

mixAssetsDir('scss/base/pages/authentication.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// Core stylesheets
mixAssetsDir('scss/base/core/**/!(_)*.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest))

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

function checkResource(src) {
    return src.indexOf('resources/vendors/js/editors/') !== -1 ||
        src.indexOf('resources/vendors/js/tables/datatable') !== -1 ||
        src.indexOf('resources/vendors/js/forms/cleave/addons/cleave-phone') !== -1;
}

mixAssetsDir('vendors/js/**/*.js', function (src, dest) {
    if (!checkResource(src)) {
        mix.scripts(src, dest);
    }
})
mixAssetsDir('vendors/css/**/*.css', function (src, dest) {
    if (!checkResource(src)) {
        mix.copy(src, dest);
    }
})
mixAssetsDir('vendors/**/**/images', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/feather', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/font-awesome', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/**/**/*.css', (src, dest) => mix.copy(src, dest))
mixAssetsDir('images', (src, dest) => mix.copy(src, dest))

mix
    .js('resources/js/core/app-menu.js', 'public/js/core')
    .js('resources/js/core/app.js', 'public/js/core')
    .js('resources/assets/js/scripts.js', 'public/js/core')
    .sass('resources/scss/base/themes/semi-dark-layout.scss', 'public/css/base/themes', {sassOptions})
    .sass('resources/scss/core.scss', 'public/css', {sassOptions})
    .sass('resources/scss/overrides.scss', 'public/css', {sassOptions})
    .sass('resources/assets/scss/style.scss', 'public/css', {sassOptions})
    .version()
