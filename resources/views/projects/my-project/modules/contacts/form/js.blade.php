<?php
/**
 * @var \App\Mainframe\Modules\Superheroes\Contact $module
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

    enableValidation('{{$module->name}}'); // Enable Ajax based form validation.

    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during creation
    |--------------------------------------------------------------------------
    |
    |
    | Some JS may only be required to be executed while creating a
    | model. Write such JS here
    */
    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    |
    | Some JS may only be required to be executed while updating an
    | existing model. Write such JS here
    */
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    | Write the functions on this top section of the file so that they
    | can be called by the codes after it.
    */
    function showOtherDesignation() {
        $(".other_designation").hide();
        var value = $("select[name=designation]").val();
        if (value === "Other") {
            $(".other_designation").show();
        }
        else {
            $("input[name=other_designation]").val('');
        }
        console.log(value);
    }

    showOtherDesignation();
    $("select[name=designation]").on('change', showOtherDesignation);

    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=first_name]").addClass('validate[required]');
        $("input[name=last_name]").addClass('validate[required]');
    }
</script>