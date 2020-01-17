<?php

$scripts = [
    /**
     * Admin Lte CSS
     */
    'mainframe/templates/admin/css/skins/_all-skins.min.css',
    'mainframe/templates/admin/bootstrap/css/bootstrap.min.css',
    'mainframe/templates/admin/css/main.css',
    'mainframe/templates/admin/plugins/morris/morris.css',
    'mainframe/templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'mainframe/templates/admin/plugins/datatables/dataTables.bootstrap.css',
    'mainframe/templates/admin/plugins/validation/css/validationEngine.jquery.css',
    'mainframe/templates/admin/plugins/select2-3.5.1/select2.css',
    'mainframe/templates/admin/plugins/uploadfile/uploadfile.css',
    'mainframe/templates/admin/plugins/iCheck/all.css',
    'mainframe/templates/admin/plugins/iCheck/square/blue.css',
    'mainframe/templates/admin/plugins/datepicker/datepicker3.css',
    'mainframe/templates/admin/plugins/daterangepicker/daterangepicker.css',
    'mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.css',
    'mainframe/templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.css',
    'mainframe/templates/admin/plugins/bootstrap-slider/slider.css',
    /**
     * Custom CSS files
     */
    'mainframe/css/mainframe.css',
]
?>

@foreach($scripts as $script)
    <link rel="stylesheet" href="{{asset($script)}}">
@endforeach

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Montserrat:300,400,500,600,700,800|Roboto:400,500,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
      integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


@section('css')
@show