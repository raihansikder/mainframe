<?php
/** @noinspection SpellCheckingInspection */
$script_paths = [
    'templates/admin/plugins/jQuery/jquery-2.2.3.min.js',
    'templates/js/jquery-ui-1.10.3.min.js',
    'templates/admin/bootstrap/js/bootstrap.min.js',
    'templates/admin/plugins/chartjs/Chart.min.js',
    'templates/admin/plugins/fastclick/fastclick.js',
    'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    'templates/admin/plugins/morris/morris.min.js',
    'templates/admin/plugins/sparkline/jquery.sparkline.min.js',
    'https://www.gstatic.com/charts/loader.js',
    'templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'templates/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'templates/admin/plugins/knob/jquery.knob.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
    'templates/admin/plugins/datepicker/bootstrap-datepicker.js',
    'templates/admin/plugins/daterangepicker/daterangepicker.js',
    'templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.js',
    'templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js',
    'templates/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'templates/admin/plugins/fastclick/fastclick.js',
    'templates/admin/plugins/iCheck/icheck.min.js',
    'templates/admin/plugins/ckeditor/ckeditor.js',
    'templates/admin/js/app.min.js',
    //'templates/admin/js/demo.js',
    // 'templates/admin/plugins/validator/validation.js',
    'templates/admin/plugins/uploadfile/jquery.form.js',
    'templates/admin/plugins/uploadfile/jquery.uploadfile.js',
    'templates/admin/plugins/datatables/jquery.dataTables.min.js',
    'templates/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'templates/admin/plugins/datatables/jquery.dataTables.fnSetFilteringDelay.js',
    'templates/admin/plugins/validation/js/languages/jquery.validationEngine-en.js',
    'templates/admin/plugins/validation/js/jquery.validationEngine.js',
    'templates/admin/plugins/select2-3.5.1/select2.js',
    'templates/admin/plugins/ionslider/ion.rangeSlider.min.js',
    'templates/admin/plugins/bootstrap-slider/bootstrap-slider.js',
    'templates/admin/js/spyr.js',
    'templates/admin/js/spyr-validation.js',
    'templates/admin/js/vue.js',
    'templates/admin/js/axios.min.js',
    'templates/admin/js/custom.js',
];
?>

@foreach($script_paths as $script_path)
    <script type="text/javascript" src="{{asset($script_path)}}"></script>
@endforeach

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

