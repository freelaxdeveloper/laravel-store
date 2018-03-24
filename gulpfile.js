var elixir = require("laravel-elixir");

elixir(function(mix) {
    mix
        .styles([
            'bootstrap.css',
            'mdb.css',
        ], 'public/freelax/css/core.css')
        .styles([
            'tree.css',
        ], 'public/freelax/css/tree.css')
        .scripts([
            'jquery-3.2.1.min.js',
        ], 'public/freelax/js/jquery.js')
        .scripts([
            'popper.min.js',
            'bootstrap.min.js',
        ], 'public/freelax/js/core.js')
        .scripts([
            'mdb.min.js',
        ], 'public/freelax/js/mdb.js')
        /*.scripts([
            'default/highcharts/vue.min.js',
            'default/highcharts/highcharts.js',
            'default/highcharts/vue-highcharts.min.js',
        ], 'public/default/js/highcharts.js') */
        .version([
            'freelax/css/*',
            'freelax/js/*'
        ]);
});
