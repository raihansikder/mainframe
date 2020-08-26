<?php
/**
 * @var \App\Mainframe\Modules\Superheroes\Reseller $module
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
    $('select[id=status]').select2();
    @if(user()->ofReseller() && !$element->is_active)
    $('select[name=country_id]').change(function () {
        changeVatPercentageBasedOnCountry();
    });
    @endif

    showOtherDesignationForContact1();
    $("select[name=contact1_designation]").on('change', showOtherDesignationForContact1);
    showOtherDesignationForContact2();
    $("select[name=contact2_designation]").on('change', showOtherDesignationForContact2);

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
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
        $("input[name=name_prefix]").addClass('validate[required]');
        $("input[name=email]").addClass('validate[required,custom[email]]');
        // $("select[name=default_commission_scheme_id]").addClass('validate[required]'); // MM-203
        $("select[name=default_payment_scheme_id]").addClass('validate[required]');
    }

    //Reseller should not be able to activate/deactivate himself and the accepted_terms field will be required
    @if($user->ofReseller())
    $("div#is_active,div#status").hide();
    // $("#accepted_terms").addClass('validate[required]');
    //$("#has_mph_agreement,#has_reseller_agreement,#has_realwear_nda").attr('disabled', true);
    $("input[name=vat_registration_no],input[name=company_registration_no],input[name=trading_as],input[name=website],input[name=holding_company],input[name=trading_address],input[name=trading_phone],input[name=trading_registration_no],input[name=trading_vat_registration_no],input[name=trade_reference_name],input[name=trade_reference_address],input[name=trade_reference_phone],input[name=trade_reference_banker_name],input[name=trade_reference_banker_address],input[name=trade_reference_account_no]").addClass('validate[required]');

    @endif
    /**
     * changing vat percentage option based on country selection
     */
    function changeVatPercentageBasedOnCountry() {
        var vatPercentageOptions = <?php echo json_encode(array_values($vatPercentageTypes));
            ?>;

        var countryId = $('select[name=country_id]').select2('val');
        $("select[name=vat_percentage]").select2("val", "").empty().attr('disabled', false);
        if (countryId != 187) {
            $("select[name=vat_percentage]").append("<option value='0'>" + "Exempted" + "</option>");// Remove the existing options // setting exempted as default
        } else {
            $.each(vatPercentageOptions, function (key, value) {

                $("select[name=vat_percentage]").append("<option value=" + key + ">" + value + "</option>");
            });
        }

    }

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

    function showOtherDesignationForContact2() {

        $(".contact2_other_designation").hide();

        var value = $("select[name=contact2_designation]").val();

        if (value === "Other") {
            $(".contact2_other_designation").show();
        }
        else {
            $("input[name=contact2_other_designation]").val('');
        }
        console.log(value);
    }

</script>