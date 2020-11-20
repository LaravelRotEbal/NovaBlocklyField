let mix = require('laravel-mix')

mix
  .setPublicPath('dist')
  .js('resources/js/field.js', 'js')
  .sass('resources/sass/field.scss', 'css')


const path = require('path');

mix.copy(path.resolve(__dirname, './node_modules/blockly/media'), path.resolve(__dirname, 'dist/media'));
