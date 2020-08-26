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


?>

@section('css')
    @parent
    <style>
        .commodities-table {
            margin-bottom: 0;
        }

        .commodities-table .form-group {
            margin-bottom: 0;
        }

        .commodities-table > tbody > tr > td {
            border-top: 0;
        }
    </style>
@endsection

<div class="clearfix"></div>
<?php /*
    CFR_OR_CPT
    CIF_OR_CIP
    DDP
    DDU
    DAP
    DAT
    EXW
    FOB_OR_FCA
    */
$termsOfSalesOptions = [
    null  => 'Select',
    'DAP' => 'DAP(Delivered at Place)',
    'DDP' => 'DDP(Delivered Duty Paid)',
]; ?>
@include('form.select-array',['var'=>['name'=>'terms_of_sale','label'=>'Terms of sale', 'options'=>$termsOfSalesOptions]])

<div id="commodityBuilder" class="col-md-12 no-padding">
    <h3>Commodities</h3>

    {{-- // Store all commodities as json--}}
    <input type="hidden" name="commodity_config" v-model="commoditiesData"/>

    {{-- commodity_weights --}}
    <table id="commoditiesTable" class="table commodities-table">
        <thead class="bg-black-gradient">
        <tr>
            <th width="10%">Name</th>
            <th width="30%">Description</th>
            <th width="5%">Country</th>
            <th width="5%">Weight (kgs)</th>
            <th width="5%">Quantity</th>
            <th width="10%">Unit Price ({{$element->currency}})</th>
            <th width="10%">Customs Value ({{$element->currency}})</th>
            <th width="10%">Harmonized code</th>
            <th width="5%"></th>
        </tr>
        </thead>
        <tbody>

        <!--suppress JSUnresolvedVariable -->
        <tr v-for="(item, i) in commodities" :key="i">
            <td>
                <input type="text" :name="'commodity['+i+'][name]'" v-model="item.name"
                       class="validate[required] form-control"/>
            </td>
            <td>
                <input type="text" :name="'commodity['+i+'][description]'" v-model="item.description"
                       class="validate[required,minSize[3]] form-control"/>
            </td>
            <td>
                <input type="text" :name="'commodity['+i+'][manufacturing_country]'" v-model="item.manufacturing_country"
                       class="validate[required,maxSize[2]] form-control"/>
            </td>

            <td>
                <input type="text" :name="'commodity['+i+'][weight]'" v-model="item.weight"
                       class="validate[required,custom[number,min[.1],max[20]]] form-control"/>
            </td>
            <td>
                <input type="text" :name="'commodity['+i+'][quantity]'" v-model="item.quantity"
                       v-on:keyup="setCustomsValues"
                       class="validate[required,custom[integer,min[1],max[999]]] form-control"/>
            </td>
            <td>
                <input type="text" :name="'commodity['+i+'][unit_price]'" v-model="item.unit_price"
                       v-on:keyup="setCustomsValues"
                       class="validate[custom[number,min[1],max[99999]]] form-control"/>
            </td>
            <td>

                <input type="text" :name="'commodity['+i+'][customs_value]'"
                       v-model="item.customs_value"
                       class="validate[custom[number,min[1],max[99999]]] form-control"
                       readonly
                />
            </td>
            <td>
                <input type="text" :name="'commodity['+i+'][harmonized_code]'" v-model="item.harmonized_code"
                       class="form-control"/>
            </td>

            <td>
                <button type="button" v-on:click="removeCommodityRow(i)" class="btn btn-default btn-remove-commodity"><i class="fa fa-close"></i></button>
            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>@{{ commoditiesTotalWeight }} Kg</b></td>
            <td></td>
            <td></td>
            <td><b>{{$element->currency}} @{{ commoditiesTotalCustomsValue }}</b></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <button type="button" v-on:click="addCommodityRow" class="btn btn-default btn-add-commodity"><i class="fa fa-plus"></i> &nbsp;Add Commodity</button>
    <button type="button" v-on:click="reloadCommodities" class="btn btn-default btn-reload-commodity">Reload From Order</button>
</div>

@section('js')
    @parent
    <!--suppress JSUnresolvedVariable -->
    <script>
        var commodityBuilder = new Vue({
            el: '#commodityBuilder',
            data: shared,
            methods: {
                addCommodityRow: function () {
                    this.commodities.push({
                        name: '',
                        description: '',
                        manufacturing_country: 'US',
                        quantity: 1,
                        customs_value: 0,
                        unit_price: 0,
                        weight_unit: 'kg',
                        weight: 1,
                        harmonized_code: '',
                    });
                },
                removeCommodityRow: function (index) {
                    this.commodities.splice(index, 1);
                },
                reloadCommodities: function () {
                    this.commodities = {!!  json_encode($element->commoditiesFromOrder()) !!};
                },

                setCustomsValues() {
                    this.commodities.forEach(function (item, index) {
                        item.customs_value = parseFloat(item.quantity * item.unit_price).toFixed(2);
                    });
                }
            },
            mounted: function () {
                // Fix select2 issue using these lines of code
                // $("#s2id_packaging_type").remove();
                // $("select[name=packaging_type]").select2();
            },
            computed: {
                commoditiesData: function () {
                    return JSON.stringify(this.commodities);
                },

                commoditiesTotalWeight() {
                    var total = 0;
                    this.commodities.forEach(function (item, index) {
                        total += parseFloat(item.weight);
                    });
                    return total;
                },
                commoditiesTotalCustomsValue() {
                    var total = 0;
                    this.commodities.forEach(function (item, index) {
                        total += parseFloat(item.customs_value);
                    });
                    return total;
                }
            },
        });

        // Shipping is created(tracking number exists)
        // Hide Rate button
        @if($element->shippingLabelCreated())

        $("div#commodityBuilder input").attr('readonly', true);
        $(".btn-remove-commodity, .btn-add-commodity, .btn-reload-commodity").hide();

        @endif
    </script>
@endsection