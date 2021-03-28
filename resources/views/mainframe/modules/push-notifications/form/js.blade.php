<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Mainframe\Modules\PushNotifications\PushNotification $element
 * @var \App\Mainframe\Modules\PushNotifications\PushNotification $pushNotification
 * @var \App\Mainframe\Modules\PushNotifications\PushNotificationViewProcessor $view
 */

?>
<script>
    /*
    |--------------------------------------------------------------------------
    | Common - creating and updating
    |--------------------------------------------------------------------------
    */
    // $('select').select2(); // Make all select2

    // Redirection after delete
    @if($element->some_id)
    $('.delete-cta button[name=genericDeleteBtn]').attr('data-redirect_success', '{!! route('some-module.edit',$element->some_id) !!}')
    @endif

    // Validation
    addValidationRules();
    enableValidation('{{$module->name}}');

    /*
    |--------------------------------------------------------------------------
    | creating
    |--------------------------------------------------------------------------
    */
    @if($element->isCreating())
    // Todo: write codes here.
    @endif

    /*
    |--------------------------------------------------------------------------
    | updating
    |--------------------------------------------------------------------------
    */
    @if($element->isUpdating())
    // Todo: write codes here.
    // Redirection after saving
    // $('#{{$module->name}}-redirect-success').val('#'); //  # Stops redirection
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    */
    /**
     * Add CSS for validation rules
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>