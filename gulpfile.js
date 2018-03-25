var elixir = require("laravel-elixir");

elixir(function(mix) {
    mix
        .styles([
            'dcmsx/bootstrap.min.css',
            'dcmsx/custom.css',
            'dcmsx/backside.css',
        ], 'public/dcmsx/css/core.css')
        .scripts([
            'dcmsx/jquery-1.11.3.min.js',
            'dcmsx/bootstrap.min.js',
            'dcmsx/ie10-viewport-bug-workaround.js',
            'dcmsx/holder.min.js',
        ], 'public/dcmsx/js/core.js')
});
elixir(function(mix) {
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
        /*.scripts([
            'default/highcharts/vue.min.js',
            'default/highcharts/highcharts.js',
            'default/highcharts/vue-highcharts.min.js',
        ], 'public/default/js/highcharts.js') */
});

elixir(function(mix) {
    mix.version([
        'freelax/css/*',
        'freelax/js/*',
        'dcmsx/css/*',
        'dcmsx/js/*',
    ])
    .copy('resources/assets/fonts/*.*', 'public/build/dcmsx/fonts/')
});
