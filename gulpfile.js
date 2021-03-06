var elixir = require("laravel-elixir");
require('laravel-elixir-vueify');

// elixir(function(mix) {
//     mix
//         .sass('store/store.scss', 'public/css/store.css')
//         .scripts([
//             'store/jquery-1.11.1.min.js',
//             'store/modernizr.custom.js',
//             'store/sweetalert.min.js',
//             'store/bootstrap.min.js',
//             'store/bootstrap-formhelpers.min.js',
//             'store/smoothscroll.js',
//             'store/jquery.debouncedresize.js',
//             'store/retina.min.js',
//             'store/jquery.placeholder.js',
//             'store/jquery.hoverIntent.min.js',
//             'store/buy.js',
//             'store/subscribeEmail.js',
//             'store/jquery.flexslider-min.js',
//             'store/jquery.selectbox.min.js',
//             'store/jquery.fitvids.js',
//             'store/jflickrfeed.min.js',
//             'store/jquery.prettyPhoto.js',
//             'store/jquery.themepunch.tools.min.js',
//             'store/owl.carousel.min.js',
//             'store/jquery.themepunch.revolution.min.js',
//             'store/jquery.elevateZoom.min.js',
//             'store/jquery.elastislide.js',
//             'store/bootstrap-switch.min.js',
//             'store/colpick.js',
//             'store/dcmsx.js',
//             'store/jquery.jscrollpane.min.js',
//             'store/jquery.mousewheel.js',
//             'store/jquery.nouislider.min.js',
//             'store/main.js',
//             'store/spoiler.js',
//         ], 'public/js/main.js')
//         .browserify('store/vue/vue.js', 'public/js/vue.js')
//         .scripts([
//             'store/tinymce_ru.js',
//         ], 'public/js/tinymce_ru.js')
//         .scripts([
//             'store/jquery.jscrollpane.min.js',
//         ], 'public/js/jscrollpane.js')
//         .version([ '/css/*.*', '/js/*.*' ])
//         .copy('resources/assets/js/dcmsx/select2.min.js', 'public/js/')
//         .copy('resources/assets/images/*', 'public/images/')
//         .copy('resources/assets/images/*.*', 'public/images/')
//         .copy('resources/assets/fonts/*.*', 'public/fonts/');
// });



// elixir(function(mix) {
//     mix
//         .sass(['dcmsx/dcmsx.scss', 'dcmsx/tree.scss'])
//         .scripts([
//             'dcmsx/jquery-1.12.4.min.js',
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


elixir(function(mix) {
    mix
        .sass('freelax/freelax.scss', 'public/css/freelax.css')
        // .styles([
        //     'freelax/bootstrap.css',
        //     'freelax/mdb.css',
        // ], 'public/css/core.css')
        .sass('freelax/tree.scss', 'public/css/tree.css')
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
