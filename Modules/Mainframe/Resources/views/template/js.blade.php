<?php
/** @noinspection SpellCheckingInspection */
$script_paths = [
    'mainframe/admin/plugins/jQuery/jquery-2.2.3.min.js',
    'mainframe/js/jquery-ui-1.10.3.min.js',
    'mainframe/admin/bootstrap/js/bootstrap.min.js',
    'mainframe/admin/plugins/chartjs/Chart.min.js',
    'mainframe/admin/plugins/fastclick/fastclick.js',
    'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    'mainframe/admin/plugins/morris/morris.min.js',
    'mainframe/admin/plugins/sparkline/jquery.sparkline.min.js',
    'https://www.gstatic.com/charts/loader.js',
    'mainframe/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'mainframe/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'mainframe/admin/plugins/knob/jquery.knob.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
    'mainframe/admin/plugins/datepicker/bootstrap-datepicker.js',
    'mainframe/admin/plugins/daterangepicker/daterangepicker.js',
    'mainframe/admin/plugins/datetimepicker/bootstrap-datetimepicker.js',
    'mainframe/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js',
    'mainframe/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'mainframe/admin/plugins/fastclick/fastclick.js',
    'mainframe/admin/plugins/iCheck/icheck.min.js',
    'mainframe/admin/plugins/ckeditor/ckeditor.js',
    'mainframe/admin/js/app.min.js',
    //'mainframe/admin/js/demo.js',
    // 'mainframe/admin/plugins/validator/validation.js',
    'mainframe/admin/plugins/uploadfile/jquery.form.js',
    'mainframe/admin/plugins/uploadfile/jquery.uploadfile.js',
    'mainframe/admin/plugins/datatables/jquery.dataTables.min.js',
    'mainframe/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'mainframe/admin/plugins/datatables/jquery.dataTables.fnSetFilteringDelay.js',
    'mainframe/admin/plugins/validation/js/languages/jquery.validationEngine-en.js',
    'mainframe/admin/plugins/validation/js/jquery.validationEngine.js',
    'mainframe/admin/plugins/select2-3.5.1/select2.js',
    'mainframe/admin/plugins/ionslider/ion.rangeSlider.min.js',
    'mainframe/admin/plugins/bootstrap-slider/bootstrap-slider.js',
    'mainframe/admin/js/spyr.js',
    'mainframe/admin/js/spyr-validation.js',
    'mainframe/admin/js/vue.js',
    'mainframe/admin/js/axios.min.js',
    'mainframe/admin/js/custom.js',
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

