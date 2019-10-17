<?php
// during creation #new indicates that user should be redirected to the newly created item.
// during update this value indicates that user is redirect back to same item after successful update

$redirect_success = '#new';
if (isset($$element)) {
    $redirect_success = URL::full();
}
if (Request::has('redirect_success')) {
    $redirect_success = Request::get('redirect_success');
}
$redirect_fail = URL::full();
?>
<script>
    $('form[name={{$moduleName}}] input[name=redirect_success]').val('{{$redirect_success}}');
    $('form[name={{$moduleName}}] input[name=redirect_fail]').val('{{$redirect_fail}}');
</script>