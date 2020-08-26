<?php
/**
 * @var \App\Mainframe\Modules\Superheroes\Invoice $module
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

    $('select[id=reseller_id],select[id=client_id]').select2();
    copyBillingAddressToShipping();

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
    $('#invoicesSubmitBtn').html("Next  <i class='fa fa-angle-right'></i>");

    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    |
    | Some JS may only be required to be executed while updating an
    | existing model. Write such JS here
    */
    $('#formAddQuoteItem').validationEngine({prettySelect: true, promptPosition: "topLeft", scroll: true});
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

    /**
     * If checkbox is checked then copy the billing address fields in shipping address
     *
     */
    function copyBillingAddressToShipping() {

        $("input[name=checkbox_is_same_as_billing]").on("click", function () {
            var ship = $(this).is(":checked");
            $("input[name^='shipping_']").each(function (e) {
                var tmpName = this.name.split('shipping_')[1];
                $(this).val(ship ? $("input[name=billing_" + tmpName).val() : "");
            });
            $("select[name=shipping_country_id]").val(ship ? $("select[name=billing_country_id]").val() : "").change();
        });
    }
</script>