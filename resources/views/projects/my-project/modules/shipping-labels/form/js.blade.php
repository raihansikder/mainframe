<?php
/**
 * @var \App\Projects\MphMarket\Modules\ShippingLabels\ShippingLabel $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\ShippingLabels\ShippingLabel $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>
<script>


    // Validation
    addValidationRules();
    enableValidation('{{$module->name}}');

    /*
    |--------------------------------------------------------------------------
    | creating
    |--------------------------------------------------------------------------
    */
    @if($element->isCreating())
    $("#shipping-labelsSubmitBtn").html("Next <i class='fa fa-angle-right'></i>")
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

    Vue.config.devtools = true // todo: disable dev tool for prod

    /**
     * Initialize shared variable
     */
    var shared = {
        currency: 'UKL',
        ship_from: {
            address1: '{{$element->ship_addr1}}',
            address2: '{{$element->ship_addr2}}',
            city: '{{$element->ship_city}}',
            state: '{{$element->ship_state}}',
            country: '{{$element->ship_country}}',
            zip_code: '{{$element->ship_code}}',
        },
        ship_to: {
            address1: '{{$element->to_addr1}}',
            address2: '{{$element->to_addr2}}',
            city: '{{$element->to_city}}',
            is_residential: {{$element->to_is_residential ? 'true' : 'false'}},
            state: '{{$element->to_state}}',
            country: '{{$element->to_country}}',
            zip_code: '{{$element->to_code}}',
        },
        packages: {!! $element->package_config ?? "[
            {
                quantity: 1,
                weight_unit: 'kg',
                weight: {$element->order->totalWeight()},
                length_unit: 'cm',
                length: 50,
                width: 40,
                height: 40,
                insured_value: {$element->order->subtotal},
                is_non_standard: false,
                ion_packed_with_equipment: false,
                ion_contained_in_equipment: false,
            }
        ]" !!},
        commodities: {!! $element->commodity_config ?? json_encode($element->commoditiesFromOrder()) !!},
    };

    /**
     * Fill shipping cost when user selects a service
     */
    $('select#shipping_service_code ').change(function () {
        var rate = $('select#shipping_service_code option:selected').data('rate');
        $('#shipping_cost').val(rate);
    });

</script>