const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'public/mainframe/templates/admin/plugins/jQuery/jquery-2.2.3.min.js',
    // 'public/mainframe/js/jquery-ui-1.10.3.min.js',
    'public/mainframe/templates/admin/plugins/jQueryUI/jquery-ui.js',
    'public/mainframe/templates/admin/bootstrap/js/bootstrap.min.js',
    'public/mainframe/templates/admin/plugins/chartjs/Chart.min.js',
    'public/mainframe/templates/admin/plugins/fastclick/fastclick.js',
    'public/mainframe/js/raphael-min.js',
    'public/mainframe/templates/admin/plugins/morris/morris.min.js',
    'public/mainframe/templates/admin/plugins/sparkline/jquery.sparkline.min.js',
    'public/mainframe/js/gstatic-chart-loader.js',
    'public/mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'public/mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'public/mainframe/templates/admin/plugins/knob/jquery.knob.js',
    'public/mainframe/js/moment.min.js',
    'public/mainframe/templates/admin/plugins/datepicker/bootstrap-datepicker.js',
    'public/mainframe/templates/admin/plugins/daterangepicker/daterangepicker.js',
    'public/mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.js',
    // 'public/mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js',
    'public/mainframe/templates/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'public/mainframe/templates/admin/plugins/fastclick/fastclick.js',
    'public/mainframe/templates/admin/plugins/iCheck/icheck.min.js',
    // 'public/mainframe/templates/admin/plugins/ckeditor/ckeditor.js',
    'public/mainframe/templates/admin/js/app.min.js',
    //'public/mainframe/templates/admin/js/demo.js',
    // mainframe/templates/admin/plugins/validator/validation.js',
    'public/mainframe/templates/admin/plugins/uploadfile/jquery.form.js',
    'public/mainframe/templates/admin/plugins/uploadfile/jquery.uploadfile.js',
    'public/mainframe/templates/admin/plugins/datatables/jquery.dataTables.min.js',
    'public/mainframe/templates/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'public/mainframe/templates/admin/plugins/datatables/jquery.dataTables.fnSetFilteringDelay.js',
    'public/mainframe/templates/admin/plugins/validation/js/languages/jquery.validationEngine-en.js',
    'public/mainframe/templates/admin/plugins/validation/js/jquery.validationEngine.js',
    // 'public/mainframe/templates/admin/plugins/select2-3.5.1/select2.js',
    'public/mainframe/templates/admin/plugins/ionslider/ion.rangeSlider.min.js',
    'public/mainframe/templates/admin/plugins/bootstrap-slider/bootstrap-slider.js',
    // 'public/mainframe/js/vue.min.js',
    // 'public/mainframe/js/axios.min.js',
], 'public/js/all.js');

mix.styles([
    'public/mainframe/templates/admin/css/skins/_all-skins.min.css',
    'public/mainframe/templates/admin/bootstrap/css/bootstrap.min.css',
    'public/mainframe/templates/admin/css/main.css',
    'public/mainframe/templates/admin/plugins/morris/morris.css',
    'public/mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'public/mainframe/templates/admin/plugins/datatables/dataTables.bootstrap.css',
    'public/mainframe/templates/admin/plugins/validation/css/validationEngine.jquery.css',
    // 'public/mainframe/templates/admin/plugins/select2-3.5.1/select2.css',
    'public/mainframe/templates/admin/plugins/uploadfile/uploadfile.css',
    'public/mainframe/templates/admin/plugins/uploadfile/uploadfile.css',
    'public/mainframe/templates/admin/plugins/iCheck/all.css',
    'public/mainframe/templates/admin/plugins/iCheck/square/blue.css',
    'public/mainframe/templates/admin/plugins/datepicker/datepicker3.css',
    'public/mainframe/templates/admin/plugins/daterangepicker/daterangepicker.css',
    'public/mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.css',
    'public/mainframe/templates/admin/plugins/bootstrap-slider/slider.css',
    'public/mainframe/templates/admin/plugins/jQueryUI/jquery-ui.css',
], 'public/css/all.css');