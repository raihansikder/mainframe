<?php
/**
 * @var \App\Mainframe\Modules\SuperHeroes\SuperHero $module
 * @var \App\User $user
 * @var \App\User $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>
<script>
    /*
    |--------------------------------------------------------------------------
    | Common - creating and updating
    |--------------------------------------------------------------------------
    */

    // Redirection after saving
    $('#{{$module->name}}-redirect-success').val('#'); //  # Stops redirection after save

    // Redirection after delete
    @if($element->some_id)
    $('.delete-cta button[name=genericDeleteBtn]').attr('data-redirect_success', '{{route('some-module.edit',$element->some_id)}}')
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
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Add CSS for validation rules
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>