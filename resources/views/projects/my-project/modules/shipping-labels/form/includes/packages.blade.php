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
        .packages-table {
            margin-bottom: 0;
        }

        .packages-table .form-group {
            margin-bottom: 0;
        }

        .packages-table > tbody > tr > td {
            border-top: 0;

        }
    </style>
@endsection


<div id="packageBuilder" class="col-md-6">
    <h3>Packaging</h3>

    {{-- // Store all packages as json--}}
    <input type="hidden" name="package_config" v-model="packagesData"/>

    {{-- package_weights --}}
    {{-- @include('form.tags',['var'=>['name'=>'package_weights','label'=>'Package weights (For multiple packages put weights separately)','tags'=>[]]])--}}

    {{-- packaging_type --}}
    @include('form.select-array',['var'=>['name'=>'packaging_type','label'=>'Packaging type', 'div'=>'col-md-4', 'options' => kv($packageTypes)]])

    <table id="packagesTable" class="table packages-table">
        <thead class="bg-black-gradient">
        <tr>
            {{-- <th width="10%">Quantity</th>--}}
            <th width="10%">Weight(kgs)</th>
            <th width="20%">Dimensions(cm)</th>
            <th width="20%">Value ({{$element->currency}})</th>
            <th></th>
            <th width="5%"></th>
        </tr>
        </thead>
        <tbody>

        <tr v-for="(item, i) in packages" :key="i">
            {{-- <td>--}}
            {{--    <input type="text" :name="'package['+i+'][quantity]'" v-model="item.quantity" readonly--}}
            {{--         class="validate[required,custom[integer,minSize[1],maxSize[2]]] form-control"/>--}}
            {{-- </td>--}}
            <td>
                <input type="text" :name="'package['+i+'][weight]'" v-model="item.weight"
                       class="validate[required,custom[number,min[.1],max[99]]] form-control"/>
            </td>
            <td>

                <table>
                    <tr>
                        <td>
                            <input type="text" :name="'package['+i+'][length]'" v-model="item.length"
                                   placeholder="L"
                                   class="validate[required,custom[integer,min[1],max[9999]]] form-control"/>
                        </td>
                        <td>
                            <input type="text" :name="'package['+i+'][width]'" v-model="item.width"
                                   placeholder="W"
                                   class="validate[required,custom[integer,min[1],max[9999]]] form-control"/>
                        </td>
                        <td>
                            <input type="text" :name="'package['+i+'][height]'" v-model="item.height"
                                   placeholder="H"
                                   class="validate[required,custom[integer,min[1],max[9999]]] form-control"/>
                        </td>
                    </tr>
                </table>

            </td>
            <td>
                <input type="text" :name="'package['+i+'][insured_value]'" v-model="item.insured_value"
                       class="validate[required,custom[number]] form-control"/>
            </td>
            <td>
                {{-- <input type="checkbox" value="1" :name="'package['+i+'][is_non_standard]'" v-model="item.is_non_standard"/>--}}
                {{-- <label>Non-standard</label>--}}

                <input type="checkbox" value="1" :name="'package['+i+'][ion_packed_with_equipment]'"
                       v-model="item.ion_packed_with_equipment"/>
                <label title="Lithium battery">Lithium</label>

                {{-- <input type="checkbox" value="1" :name="'package['+i+'][ion_contained_in_equipment]'"--}}
                {{--    v-model="item.ion_contained_in_equipment"/>--}}
                {{-- <label>Ion Contained in</label>--}}
                <div class="clearfix"></div>
            </td>
            <td>
                <button type="button" v-on:click="removePackageRow(i)" class="btn btn-default remove-package"><i class="fa fa-close"></i></button>
            </td>
        </tr>

        <tr>
            <td><b>@{{ packagesTotalWeight }} Kg</b></td>
            <td></td>
            <td><b>{{$element->currency}} @{{ packagesTotalValue }}</b></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <button type="button" v-on:click="addPackageRow" class="btn btn-default add-package"><i class="fa fa-plus"></i> &nbsp;Add Package</button>
</div>

@section('js')
    @parent
    <script>
        var packageBuilder = new Vue({
            el: '#packageBuilder',
            data: shared,
            methods: {
                addPackageRow: function () {
                    this.packages.push({
                        quantity: 1,
                        weight_unit: 'kg',
                        weight: null,
                        length_unit: 'cm',
                        length: 46,
                        width: 30,
                        height: 30,
                        insured_value: null,
                        is_non_standard: false,
                        ion_packed_with_equipment: false,
                        ion_contained_in_equipment: false,
                    });
                },
                removePackageRow: function (index) {
                    this.packages.splice(index, 1);
                },
            },
            mounted: function () {
                // Fix select2 issue using these lines of code
                $("#s2id_packaging_type").remove();
                $("select[name=packaging_type]").select2();
            },
            computed: {
                packagesData: function () {
                    return JSON.stringify(this.packages);
                },
                packagesTotalWeight: function () {
                    var total = 0;
                    this.packages.forEach(e => {
                        total += parseFloat(e.weight);
                    });
                    return total
                },
                packagesTotalValue: function () {
                    var total = 0;
                    this.packages.forEach(e => {
                        total += parseFloat(e.insured_value);
                    });
                    return total
                }
            }
        });

        // Shipping is created(tracking number exists)
        // Disable form

        @if($element->shippingLabelCreated())
        $("div#packageBuilder input").attr('readonly', true);
        $("div#packageBuilder input:checkbox").attr('disabled', true);
        $(".remove-package, .add-package").hide();
        @endif

    </script>
@endsection