<?php
/** @noinspection SpellCheckingInspection */
$script_paths = [
    'js/all.js',
    // 'mainframe/templates/admin/plugins/jQuery/jquery-2.2.3.min.js',
    // // 'mainframe/js/jquery-ui-1.10.3.min.js',
    // 'mainframe/templates/admin/plugins/jQueryUI/jquery-ui.js',
    // 'mainframe/templates/admin/bootstrap/js/bootstrap.min.js',
    // 'mainframe/templates/admin/plugins/chartjs/Chart.min.js',
    // 'mainframe/templates/admin/plugins/fastclick/fastclick.js',
    // 'mainframe/js/raphael-min.js',
    // 'mainframe/templates/admin/plugins/morris/morris.min.js',
    // 'mainframe/templates/admin/plugins/sparkline/jquery.sparkline.min.js',
    // 'mainframe/js/gstatic-chart-loader.js',
    // 'mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    // 'mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    // 'mainframe/templates/admin/plugins/knob/jquery.knob.js',
    // 'mainframe/js/moment.min.js',
    // 'mainframe/templates/admin/plugins/datepicker/bootstrap-datepicker.js',
    // 'mainframe/templates/admin/plugins/daterangepicker/daterangepicker.js',
    // 'mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.js',
    // // 'mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js',
    // 'mainframe/templates/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    // 'mainframe/templates/admin/plugins/fastclick/fastclick.js',
    // 'mainframe/templates/admin/plugins/iCheck/icheck.min.js',
    'mainframe/templates/admin/plugins/ckeditor/ckeditor.js',
    // 'mainframe/templates/admin/js/app.min.js',
    // //'mainframe/templates/admin/js/demo.js',
    // // mainframe/templates/admin/plugins/validator/validation.js',
    // 'mainframe/templates/admin/plugins/uploadfile/jquery.form.js',
    // 'mainframe/templates/admin/plugins/uploadfile/jquery.uploadfile.js',
    // 'mainframe/templates/admin/plugins/datatables/jquery.dataTables.min.js',
    // 'mainframe/templates/admin/plugins/datatables/dataTables.bootstrap.min.js',
    // 'mainframe/templates/admin/plugins/datatables/jquery.dataTables.fnSetFilteringDelay.js',
    // 'mainframe/templates/admin/plugins/validation/js/languages/jquery.validationEngine-en.js',
    // 'mainframe/templates/admin/plugins/validation/js/jquery.validationEngine.js',
    'mainframe/templates/admin/plugins/select2-3.5.1/select2.js',
    // 'mainframe/templates/admin/plugins/ionslider/ion.rangeSlider.min.js',
    // 'mainframe/templates/admin/plugins/bootstrap-slider/bootstrap-slider.js',
    // 'mainframe/js/vue.min.js',
    // 'mainframe/js/axios.min.js',
    // // 'mainframe/js/plugins/date/date.js',
    /**
     * Additional JS added by mainframe.
     */

    'mainframe/js/mainframe.js',
    'mainframe/js/validation.js',
    'mainframe/js/custom.js',
    /**
     * Additional project specific js.
     */

];
?>

@foreach($script_paths as $script_path)
    <script type="text/javascript" src="{{asset($script_path)}}"></script>
@endforeach

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="{{asset('mainframe/js/html5shiv.min.js')}}"></script>
<script src="{{asset('mainframe/js/respond.min.js')}}"></script>
<![endif]-->