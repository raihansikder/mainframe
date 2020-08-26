<?php
/**
 * @var \App\Projects\MphMarket\Modules\Orders\Order $module
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
    changeClientBasedOnReseller();
    copyBillingAddressToShipping();
    $('select[id=reseller_id],select[id=client_id]').select2();

    $('select[id=status],select[id=internal_status]').select2();
    @if($user->ofClient())
    $("div#payment_scheme").hide();
    @endif

    //enableValidation('{{$module->name}}'); // Enable Ajax based form validation.
    $('select[name=status]').change(function () {
        if ($('select[name=status]').val() == "Approved") {
            showAlert("Once you have accepted it you can not edit it.<br>Please re-save to confirm.");
        }
    });

    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during creation
    |--------------------------------------------------------------------------
    */
    $('#ordersSubmitBtn').html("Next  <i class='fa fa-angle-right'></i>")

    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    */
    $('#formAddOrderItem').validationEngine({prettySelect: true, promptPosition: "topLeft", scroll: true});
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
     *
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