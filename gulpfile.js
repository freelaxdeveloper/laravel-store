var elixir = require("laravel-elixir");

elixir(function(mix) {
    mix
        .sass(['store/store.scss'])
        .scripts([
            'store/main.js',
        ], 'public/js/main.js')

        .scripts([
            'store/colpick.js',
        ], 'public/js/colpick.js')

        .scripts([
            'store/jquery.themepunch.tools.min.js',
        ], 'public/js/jquery.themepunch.tools.min.js')

        .scripts([
            'store/bootstrap-switch.min.js',
        ], 'public/js/bootstrap-switch.min.js')

        .scripts([
            'store/jquery.fitvids.js',
        ], 'public/js/jquery.fitvids.js')

        .scripts([
            'store/jquery.selectbox.min.js',
        ], 'public/js/jquery.selectbox.min.js')


        .scripts([
            'store/jquery.prettyPhoto.js',
        ], 'public/js/jquery.prettyPhoto.js')

        .scripts([
            'store/jflickrfeed.min.js',
        ], 'public/js/jflickrfeed.min.js')


        .scripts([
            'store/owl.carousel.min.js',
        ], 'public/js/owl.carousel.min.js')

        .scripts([
            'store/jquery.flexslider-min.js',
        ], 'public/js/jquery.flexslider-min.js')

        .scripts([
            'store/jquery.hoverIntent.min.js',
        ], 'public/js/jquery.hoverIntent.min.js')

        .scripts([
            'store/jquery.placeholder.js',
        ], 'public/js/jquery.placeholder.js')

        .scripts([
            'store/retina.min.js',
        ], 'public/js/retina.min.js')

        .scripts([
            'store/jquery.debouncedresize.js',
        ], 'public/js/jquery.debouncedresize.js')

        .scripts([
            'store/modernizr.custom.js',
        ], 'public/js/modernizr.custom.js')

        .scripts([
            'store/jquery.elastislide.js',
        ], 'public/js/jquery.elastislide.js')

        .scripts([
            'store/smoothscroll.js',
        ], 'public/js/smoothscroll.js')


        .scripts([
            'store/bootstrap.min.js',
        ], 'public/js/bootstrap.min.js')

        .scripts([
            'store/jquery.elevateZoom.min.js',
        ], 'public/js/jquery.elevateZoom.min.js')

        .scripts([
            'store/twitter/jquery.tweet.min.js',
        ], 'public/js/jquery.tweet.min.js')
        
        .scripts([
            'store/jquery.themepunch.revolution.min.js',
        ], 'public/js/jquery.themepunch.revolution.min.js')
        .version([ '/css/*', '/js/*' ])
        .copy('resources/assets/images/*', 'public/images/')
        .copy('resources/assets/images/*.*', 'public/images/')
        .copy('resources/assets/fonts/*.*', 'public/fonts/');
});



// elixir(function(mix) {
//     mix
//         .sass(['dcmsx/dcmsx.scss', 'dcmsx/tree.scss'])
//         .scripts([
//             'dcmsx/jquery-1.12.4.min.js',
//             'dcmsx/jquery-ui.min.js',
//             'dcmsx/dcmsx.js',
//             'dcmsx/bootstrap.min.js',
//             'dcmsx/bootstrap-formhelpers.min.js',
//             'dcmsx/ie10-viewport-bug-workaround.js',
//             'dcmsx/holder.min.js',
//             'dcmsx/buy.js',
//             'dcmsx/spoiler.js',
//             'dcmsx/menu.js',
//             'dcmsx/prism.js',
//             'dcmsx/bootstrap-datetimepicker.min.js',
//             'dcmsx/timeline.js',
//         ], 'public/js/dcmsx.js')
//         .scripts([
//             'dcmsx/tinymce_ru.js',
//         ], 'public/js/tinymce_ru.js')
//         .version([ '/css/*', '/js/*' ])
//         .copy('resources/assets/images/*.*', 'public/images/')
//         .copy('resources/assets/js/dcmsx/select2.min.js', 'public/js/')
//         .copy('resources/assets/fonts/*.*', 'public/fonts/');
// });


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