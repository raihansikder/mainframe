<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\ShippingLabels\ShippingLabel $element
 */
use App\Projects\MphMarket\Helpers\Fedex\Fedex;
?>

@if(isset($immutables) && !in_array('shipping_service_code', $immutables))
    {{--    <div class="form-group col-md-2">--}}
    {{--        <button type="button" class="btn btn-default" id="getShippingRates"--}}
    {{--                style="margin-top:20px"> &nbsp;--}}
    {{--            &nbsp;Get Rates &nbsp;&nbsp; <i class="fa fa-angle-right"></i>--}}
    {{--        </button>--}}
    {{--    </div>--}}

    {{-- Shipping Rate calculator--}}
    <div class="form-group col-md-2">
        <button name="rateCalculatorModalBtn" class="btn btn-default flat" type="button" style="margin-top:20px"
                data-toggle="modal" data-target="#rateCalculatorModal">
            <i class="fa fa-angle-right"></i>
            Rate Calculator
        </button>
    </div>
@endif

<?php
$shippingServiceCodeOptions = array_merge(['' => '-'], kv(Fedex::$serviceTypes));
?>
@include('form.select-array',['var'=>['name'=>'shipping_service_code','label'=>'Shipping Service','options'=>kv($shippingServiceCodeOptions)]])
@include('form.text',['var'=>['name'=>'shipping_cost','label'=>'Shipping Cost']])


@section('content-bottom')
    @parent
    @include('projects.my-project.custom.fedex.rate-calculator')
@endsection

@section('js')
    @parent
    <script>

        rateCalculator.$data.buffer = 'true';

        {{-- Load the default --}}
        rateCalculator.packages.push({
            quantity: 1,
            weight_unit: 'kg',
            weight: {{$element->totalWeight()}},
            length_unit: 'cm',
            length: 50,
            width: 40,
            height: 40,
            insured_value: 10000,
            is_non_standard: false,
            ion_packed_with_equipment: false,
            ion_contained_in_equipment: false,
        });

        rateCalculator.ship_to = {
            address1: '{{$element->shipping_address1}}',
            city: '{{$element->shipping_city}}',
            state: '{{$element->shipping_county}}',
            country: '{{optional($element->shippingCountry)->iso2}}',
            zip_code: '{{$element->shipping_zip_code}}',
        };

        rateCalculator.currency = '{{$element->currency}}';
        rateCalculator.handler = 'handleResponse';


        /**
         * Response handler function
         * @param ret
         */
        function handleResponse(ret) {
            ret = parseJson(ret); // Convert the response into a valid json object.

            $('.ajaxMsg').empty().hide(); // first hide all blocks

            var hasRate = false;

            $('select#shipping_service_code ').empty();
            $.each(ret.data, function (k, v) {
                hasRate = true;
                $('select#shipping_service_code').append(
                    '<option value="' + v.service + '" data-rate="' + v.rate + '">'
                    + v.service + ' - ' + v.currency + ' ' + v.rate
                    + '</option>'
                );
            });

            if (!hasRate) {
                loadMsg(ret); //
                $('#msgModal').modal('show');
            } else {
                $('select#shipping_service_code').prepend('<option selected value="">-</option>');
                $("select#shipping_service_code").select2();
                $("select#shipping_service_code").select2("val", "");
                $("select#shipping_service_code").select2("open");
                $("#shipping_cost").val(""); // Clear Shipping cost val
            }
        }

        // Fill shipping cost when user selects a service
        $('select#shipping_service_code ').change(function () {
            var rate = $('select#shipping_service_code option:selected').data('rate');
            $('#shipping_cost').val(rate);
        });
    </script>

@endsection

