<?php
/**
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
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

    $('select[id=reseller_id],select[id=client_id]').select2();

    {{--enableValidation('{{$module->name}}', function (ret) {--}}
    {{--setTimeout(function () {--}}
    {{--if (ret.hasOwnProperty('redirect')) {--}}
    {{--window.location.replace(ret.redirect);--}}
    {{--}--}}
    {{--}, 3500);--}}
    {{--}); // Enable Ajax based form validation.--}}

    $('select[name=status]').change(function () {
        if ($('select[name=status]').val() == "Accepted") {
            showAlert("Once you have accepted it you can not edit it.<br>Please re-save to confirm.");
        }
    });


    changeClientBasedOnReseller();
    fillShippingDataBasedOnClient();
    fillBillingDataBasedOnReseller();
    // changeShippingCostBasedOnShippingMethod();
    copyBillingAddressToShipping();

    @if($user->ofClient())
    $("div#payment_scheme").hide();
    @endif

    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during creation
    |--------------------------------------------------------------------------
    */
    $('#quotesSubmitBtn').html("Next  <i class='fa fa-angle-right'></i>")
    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    */
    $('#formAddQuoteItem').validationEngine({
        prettySelect: true,
        promptPosition: "topLeft",
        scroll: true
    });
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
        //$("input[name=name]").addClass('validate[required]');
    }

    /**
     * function will clear the billing fields
     */
    function clearBillingData() {
        $("input[name=billing_company_name]").val(" ");
        $("input[name=billing_first_name]").val(" ");
        $("input[name=billing_last_name]").val(" ");
        $("input[name=billing_email]").val(" ");
        $("input[name=billing_address1]").val(" ");
        $("input[name=billing_address2]").val(" ");
        $("input[name=billing_city]").val(" ");
        $("input[name=billing_county]").val(" ");
        $("select[name=billing_country_id]").val(" ");
        $("input[name=billing_zip_code]").val(" ");
        $("input[name=billing_phone]").val(" ");
        $("input[name=billing_mobile]").val(" ");

    }

    /**
     * function will clear shipping data
     */
    function clearShippingData() {
        $("input[name=shipping_company_name]").val(" ");
        $("input[name=shipping_first_name]").val(" ");
        $("input[name=shipping_last_name]").val(" ");
        $("input[name=shipping_email]").val(" ");
        $("input[name=shipping_address1]").val(" ");
        $("input[name=shipping_address2]").val(" ");
        $("input[name=shipping_city]").val(" ");
        $("input[name=shipping_county]").val(" ");
        $("select[name=shipping_country_id]").val(" ");
        $("input[name=shipping_zip_code]").val(" ");
        $("input[name=shipping_phone]").val(" ");
        $("input[name=shipping_mobile]").val(" ");

    }

    /**
     * function will fill shipping information based on client
     */
    function fillShippingDataBasedOnClient() {

        $('select[name=client_id]').change(function () {
            var client_id = $('select[name=client_id]').select2('val');
            clearShippingData();
            $.ajax({
                type: "get",
                datatype: 'json',
                url: '{{route('home')}}/clients/' + client_id + '?ret=json',
                success: function (response) {
                    //console.log(response.data);
                    //console.log(response.data);
                    $("input[name=shipping_company_name]").val(response.data.name);
                    $("input[name=shipping_first_name]").val(response.data.first_name);
                    $("input[name=shipping_last_name]").val(response.data.last_name);
                    $("input[name=shipping_email]").val(response.data.email);
                    $("input[name=shipping_address1]").val(response.data.address1);
                    $("input[name=shipping_address2]").val(response.data.address2);
                    $("input[name=shipping_city]").val(response.data.city);
                    $("input[name=shipping_county]").val(response.data.country);
                    $("select[name=shipping_country_id]").val(response.data.country_id);
                    $("input[name=shipping_zip_code]").val(response.data.zip_code);
                    $("input[name=shipping_phone]").val(response.data.phone);
                    $("input[name=shipping_mobile]").val(response.data.mobile);
                },
            });

        });
    }

    /**
     * function will fill billing info based on client
     */
    function fillBillingDataBasedOnReseller() {
        $('select[name=reseller_id]').change(function () {
            var reseller_id = $('select[name=reseller_id]').select2('val');
            clearBillingData();
            $.ajax({
                type: "get",
                datatype: 'json',
                url: '{{route('home')}}/resellers/' + reseller_id + '?ret=json',
                success: function (response) {
                    //console.log(response.data.items);
                    //console.log(response.data);
                    $("input[name=billing_company_name]").val(response.data.name);
                    $("input[name=billing_first_name]").val(response.data.first_name);
                    $("input[name=billing_last_name]").val(response.data.last_name);
                    $("input[name=billing_email]").val(response.data.email);
                    $("input[name=billing_address1]").val(response.data.address1);
                    $("input[name=billing_address2]").val(response.data.address2);
                    $("input[name=billing_city]").val(response.data.city);
                    $("input[name=billing_county]").val(response.data.country);
                    $("select[name=billing_country_id]").val(response.data.country_id);
                    $("input[name=billing_zip_code]").val(response.data.zip_code);
                    $("input[name=billing_phone]").val(response.data.phone);
                    $("input[name=billing_mobile]").val(response.data.mobile);
                },
            });
        });
    }

    /**
     * function will change client based on reseller
     */
    function changeClientBasedOnReseller() {
        $('select[name=reseller_id]').change(function () { // change function of listbox
            var reseller_id = $('select[name=reseller_id]').select2('val');
            //clearing the data , empty the options , enable it with current options
            $("select[name=client_id]").select2("val", "").empty().attr('disabled', false);// Remove the existing options
            $.ajax({
                type: "get",
                datatype: 'json',
                url: '{{route('clients.list-json')}}',
                data: {
                    reseller_id: reseller_id,
                },
                success: function (response) {
                    //console.log(response.data.items);
                    $("select[name=client_id]").append("<option value=0>" + " " + "</option>");
                    $.each(response.data.items, function (i, obj) {
                        $("select[name=client_id]").append("<option value=" + obj.id + ">" + obj.name + "</option>");
                    });
                },
            });

        });
    }

    /**
     * function will make shipping cost field readonly if shipping method is selected
     */
    function changeShippingCostBasedOnShippingMethod() {
        $('select[name=shipping_method_id]').change(function () { // change function of listbox
            var shipping_method_id = $('select[name=shipping_method_id]').select2('val');
            if (shipping_method_id > 0) {
                $('input[name=shipping_cost]').attr('readonly', 'readonly')
            } else {
                $('input[name=shipping_cost]').val('').attr('readonly', false)
            }
        });
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