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

<div id="rates" class="col-md-6" style="margin-top:20px">
    <div id="getRate" class="col-md-4 no-margin-l no-padding-l">
        <button type="button" v-on:click.stop="getRates"
                class="btn btn-default btn-block bg-blue-gradient"
                style="margin-top:20px"
                id="getRatesBtn">Get Rates <i class="fa fa-angle-right"></i>
        </button>
    </div>
    <div class="clearfix"></div>
    <?php
    $shippingServiceCodeOptions = array_merge(['' => '-'], kv(Fedex::$serviceTypes));
    $var = [
        'name'    => 'shipping_service_code',
        'label'   => 'Shipping Service',
        'div'     => 'col-md-8',
        'options' => $shippingServiceCodeOptions,
        'params'  => [
            // 'class' => 'validate[required]'
        ]
    ]
    ?>
    @include('form.select-array',['var'=>$var])
    @include('form.text',['var'=>['name'=>'shipping_cost','label'=>'Shipping Cost', 'div'=>'col-md-4',]])

</div>


@section('js')
    @parent
    <script>

        var rateCalculator = new Vue({
            el: '#getRate',
            data: shared,
            methods: {
                getRates: function () {

                    $('#shipping-labelsForm').validationEngine({
                        prettySelect: true,
                        promptPosition: "topLeft",
                        scroll: false
                    });

                    $('#getRatesBtn').html('Fetching Rates...');

                    if ($('form[name=shipping-labels]').validationEngine('validate') === true) {

                        axios.get('{{route('shipping.rates')}}', {
                            params: this.$data
                        }).then(function (response) {
                            // window[shared.handler](response.data);
                            handleResponse(response.data);
                        }).catch(function (error) {
                            console.log(error);
                        }).then(function () {
                            $('#getRatesBtn').html('Get Rates');
                        });
                    } else {
                        // alert('Information is not valid for a rate request');
                    }
                }
            },
        })

        /**
         * Response handler function
         * @param ret
         */
        function handleResponse(ret) {

            ret = parseJson(ret); // Convert the response into a valid json object.

            var hasRate = ret.data;
            $('.ajaxMsg').empty().hide(); // first hide all blocks

            if (!hasRate) {
                loadMsg(ret); //
                $('#msgModal').modal('show');
                return;
            }
            $('select#shipping_service_code ').empty();

            $.each(ret.data, function (k, v) {

                $('select#shipping_service_code').append(
                    '<option value="' + v.service + '" data-rate="' + v.rate + '">'
                    + v.service + ' - ' + v.currency + ' ' + v.rate
                    + '</option>'
                );
            });

            $('select#shipping_service_code').prepend('<option selected value="">-</option>');
            $("select#shipping_service_code").select2();
            $("select#shipping_service_code").select2("val", "");
            $("select#shipping_service_code").select2("open");
            $("#shipping_cost").val(""); // Clear Shipping cost val
        }

        // Shipping is created(tracking number exists)
        // Hide Rate button
        @if($element->shippingLabelCreated())
        $("#getRate").hide();
        @endif
    </script>

@endsection

