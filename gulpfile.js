var elixir = require("laravel-elixir");

elixir(function(mix) {
    mix
        .sass(['dcmsx/dcmsx.scss', 'dcmsx/tree.scss'])
        .scripts([
            'dcmsx/jquery-1.11.3.min.js',
            'dcmsx/jquery-ui.min.js',
            'dcmsx/dcmsx.js',
            'dcmsx/bootstrap.min.js',
            'dcmsx/bootstrap-formhelpers.min.js',
            'dcmsx/ie10-viewport-bug-workaround.js',
            'dcmsx/holder.min.js',
            'dcmsx/buy.js',
            'dcmsx/spoiler.js',
            'dcmsx/menu.js',
            'dcmsx/prism.js',
            'dcmsx/bootstrap-datetimepicker.min.js',
        ], 'public/js/dcmsx.js')
        .scripts([
            'dcmsx/tinymce_ru.js',
        ], 'public/js/tinymce_ru.js')
        .version([ '/css/*', '/js/*' ])
        .copy('resources/assets/images/*.*', 'public/images/')
        .copy('resources/assets/js/dcmsx/select2.min.js', 'public/js/')
        .copy('resources/assets/fonts/*.*', 'public/fonts/');
});
/* elixir(function(mix) {
    mix
        .styles([
            'freelax/bootstrap.css',
            'freelax/mdb.css',
        ], 'public/freelax/css/core.css')
        .styles([
            'freelax/tree.css',
        ], 'public/freelax/css/tree.css')
        .scripts([
            'freelax/jquery-3.2.1.min.js',
        ], 'public/freelax/js/jquery.js')
        .scripts([
            'freelax/popper.min.js',
            'freelax/bootstrap.min.js',
        ], 'public/freelax/js/core.js')
        .scripts([
            'freelax/mdb.min.js',
        ], 'public/freelax/js/mdb.js')
        //.scripts([
        //   'default/highcharts/vue.min.js',
        //    'default/highcharts/highcharts.js',
        //    'default/highcharts/vue-highcharts.min.js',
        //], 'public/default/js/highcharts.js')
});
 */