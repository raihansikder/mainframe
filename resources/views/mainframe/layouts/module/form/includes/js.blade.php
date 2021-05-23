<?php
// during creation #new indicates that user should be redirected to the newly created item.
// during update this value indicates that user is redirect back to same item after successful update

$redirectSuccessUrl = '#new';
/** @var App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
if ($element->isUpdating()) {
    $redirectSuccessUrl = URL::full();
}
if (Request::has('redirect_success')) {
    $redirectSuccessUrl = Request::get('redirect_success');
}
$redirectFailUrl = URL::full();
?>

<script type="text/javascript">

    $('form[name={{$module->name}}] input[name=redirect_success]')
        .val('{!! $redirectSuccessUrl !!}');

    $('form[name={{$module->name}}] input[name=redirect_fail]')
        .val('{!! $redirectFailUrl !!}');

</script>