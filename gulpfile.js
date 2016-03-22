var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('app.scss');
    mix.styles([
        'libs/bootstrap/dist/css/bootstrap.css',
        'libs/bootstrap/dist/css/bootstrap-theme.css',
        'libs/font-awesome/css/font-awesome.css',
    ], 'public/css/app.css', 'resources/assets');

    mix.styles(['main.css'], 'public/css/main.css', 'resources/assets/css');

    mix.styles([
        'libs/bootstrap/dist/css/bootstrap.css',
        'libs/bootstrap/dist/css/bootstrap-theme.css',
        'libs/fullcalendar/dist/fullcalendar.css',
        'css/events.css',
    ], 'public/css/events.css', 'resources/assets');

    mix.copy([
        'resources/assets/libs/jquery/dist/jquery.js',
        'resources/assets/libs/moment/moment.js',
        'resources/assets/libs/bootstrap/dist/js/bootstrap.js',
        'resources/assets/libs/fullcalendar/dist/fullcalendar.js',
    ], 'public/js');

    mix.scripts([
        //'jquery/dist/jquery.js',
    ], 'public/js/events.js', 'resources/assets/libs');

    mix.scripts([
        'libs/jquery/dist/jquery.js',
        //'libs/vue/dist/vue.js',
        'libs/bootstrap/dist/js/bootstrap.js',
    ], 'public/js/app.js', 'resources/assets');

    mix.scripts(['main.js'], 'public/js/main.js', 'resources/assets/js');

    mix.copy('resources/assets/libs/bootstrap/dist/fonts', 'public/fonts');
    mix.copy('resources/assets/libs/bootstrap/dist/css/bootstrap.css', 'public/css');
    mix.copy('resources/assets/libs/font-awesome/fonts', 'public/fonts');
    mix.copy('resources/assets/css/markdown.css', 'public/css');

    var libs = 'resources/assets/libs';

    mix.copy(libs + '/vue/dist/vue.min.js', 'public/js');

    mix.copy(libs + '/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css', 'public/css');
    mix.copy(libs + '/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js', 'public/js');
    mix.copy(libs + '/Bootstrap-Image-Gallery/img', 'public/img');

    mix.copy(libs + '/blueimp-gallery/css/blueimp-gallery.min.css', 'public/css');
    mix.copy(libs + '/blueimp-gallery/js/jquery.blueimp-gallery.min.js', 'public/js');
    mix.copy(libs + '/blueimp-gallery/img', 'public/img');

    mix.copy(libs + '/dropzone/dist/min/dropzone.min.css', 'public/css');
    mix.copy(libs + '/dropzone/dist/min/dropzone.min.js', 'public/js');

    mix.copy(libs + '/sweetalert/dist/sweetalert.css', 'public/css');
    mix.copy(libs + '/sweetalert/dist/sweetalert.min.js', 'public/js');

    mix.copy(libs + '/leaflet/dist/leaflet.css', 'public/css');
    mix.copy(libs + '/leaflet/dist/leaflet.js', 'public/js');
    mix.copy(libs + '/leaflet/dist/images', 'public/img');

    mix.copy(libs + '/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 'public/css');
    mix.copy(libs + '/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/js');
});
