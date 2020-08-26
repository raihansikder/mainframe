<?php
/**
 * @var \App\Mainframe\Modules\Superheroes\Client $module
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
    copyAddress();//copy address to contact

    showOtherDesignationForContact1();
    $("select[name=contact1_designation]").on('change', showOtherDesignationForContact1);

    enableValidation('{{$module->name}}'); // Enable Ajax based form validation.
    // Activate select2
    $('select[id=reseller_id],select[id=partner_account_manager_id],select[id=country_id],select[id=contact1_country_id]').select2();

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
    /**
     * If checkbox is checked then copy the address fields in contact
     *
     */
    function copyAddress() {
        var inputs = ['contact1_address1', 'contact1_address2', 'contact1_city', 'contact1_county', 'contact1_country_id', 'contact1_country_name', 'contact1_zip_code'];

        $("input[name=checkbox_is_same_as_address]").on("click", function () {
            var contact = $(this).is(":checked");
            $("input[name^='contact1_']").each(function (e) {
                if (jQuery.inArray(this.name, inputs) > -1) {
                    var tmpName = this.name.split('contact1_')[1];
                    $(this).val(contact ? $("input[name=" + tmpName).val() : "");
                }

            });
            $("select[name=contact1_country_id]").val(contact ? $("select[name=country_id]").val() : "").change();
        });
    }

    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }

    @if(!$user->isAdmin())
    $("div#is_active").hide();

    @endif
    function showOtherDesignationForContact1() {

        $(".contact1_other_designation").hide();

        var value = $("select[name=contact1_designation]").val();

        if (value === "Other") {
            $(".contact1_other_designation").show();
        }
        else {
            $("input[name=contact1_other_designation]").val('');
        }
        console.log(value);
    }
</script>