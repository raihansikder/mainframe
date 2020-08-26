<?php
/**
 * @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $module
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
    | Common JS to run for both create and update
    |--------------------------------------------------------------------------
    |
    | Write the functions on this top section of the file so that they
    | can be called by the codes after it.
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    addValidationRules(); // Assign validation classes/rules

    // enableValidation('{{$module->name}}'); // Enable Ajax based form validation.

    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during creation
    |--------------------------------------------------------------------------
    */
    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    */
    $('.delete-cta button[name=genericDeleteBtn]')
        .attr('data-redirect_success', '{{route('quotes.edit',$element->quote_id)}}')

    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    | Write the functions on this top section of the file so that they
    | can be called by the codes after it.
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>