<?php

$script_paths = [
    'templates/admin/css/skins/_all-skins.min.css',
    'templates/admin/bootstrap/css/bootstrap.min.css',
    'templates/admin/css/main.css',
    'templates/admin/plugins/morris/morris.css',
    'templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'templates/admin/plugins/datatables/dataTables.bootstrap.css',
    'templates/admin/plugins/validation/css/validationEngine.jquery.css',
    'templates/admin/plugins/select2-3.5.1/select2.css',
    'templates/admin/plugins/uploadfile/uploadfile.css',
    'templates/admin/plugins/iCheck/all.css',
    'templates/admin/plugins/iCheck/square/blue.css',
    'templates/admin/plugins/datepicker/datepicker3.css',
    'templates/admin/plugins/daterangepicker/daterangepicker.css',
    'templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.css',
    'templates/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.css',
    'templates/admin/plugins/bootstrap-slider/slider.css',
    'templates/admin/css/custom.css',
    'letsbab/css/letsbab.css',
]
?>

@foreach($script_paths as $script_path)
    <link rel="stylesheet" href="{{asset($script_path)}}">
@endforeach

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Comfortaa" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baumans" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
      integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


@section('css')
    {{-- ++++++++++++ --}}
    {{-- css section --}}
    {{-- ++++++++++++ --}}
@show