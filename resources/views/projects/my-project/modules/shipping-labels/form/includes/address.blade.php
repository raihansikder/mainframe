@section('css')
    @parent
    <style>
        .address-table .form-group {
            margin-bottom: 0;
        }

        .address-table > tbody > tr > td {
            border-top: 0;
        }

        .address-table > tbody > tr > td:first-child {
            font-weight: bold;
            padding-top: 10px;
        }

    </style>
@endsection

<div id="address" class="col-md-6 border-dotted">
    <div class="col-md-12 no-padding-l">
        <h3 class="pull-left">Address</h3>
        <table id="" class="table table-condensed no-footer address-table ">
            <thead>
            <tr>
                <th></th>
                <th style="width: 40%">From</th>
                <th style="width: 40%">To</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Company</td>
                <td>@include('form.text',['var'=>['name'=>'shipper','div'=>'col-md-12']])</td>
                <td></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>
                    @include('form.text',['var'=>['name'=>'shipper_contact_name','div'=>'col-md-12']])
                    @include('form.text',['var'=>['name'=>'shipper_email', 'div'=>'col-md-12','placeholder'=>'email', 'class'=>'validate[required, custom[email]]' ]])
                </td>
                <td>@include('form.text',['var'=>['name'=>'to_name','div'=>'col-md-12']])</td>
            </tr>
            <tr>
                <td>Address1</td>
                <td>@include('form.text',['var'=>['name'=>'ship_addr1','div'=>'col-md-12','params'=>['v-model'=>'ship_from.address1']]])</td>
                <td>@include('form.text',['var'=>['name'=>'to_addr1','div'=>'col-md-12','params'=>['v-model'=>'ship_to.address1']]])</td>
            </tr>
            <tr>
                <td>Address2</td>
                <td>@include('form.text',['var'=>['name'=>'ship_addr2', 'div'=>'col-md-12','params'=>['v-model'=>'ship_from.address2']]])</td>
                <td>@include('form.text',['var'=>['name'=>'to_addr2', 'div'=>'col-md-12','params'=>['v-model'=>'ship_to.address2']]])</td>
            </tr>
            <tr>
                <td>City</td>
                <td>@include('form.text',['var'=>['name'=>'ship_city', 'div'=>'col-md-6','params'=>['v-model'=>'ship_from.city']]])</td>
                <td>
                    @include('form.text',['var'=>['name'=>'to_city', 'div'=>'col-md-6','params'=>['v-model'=>'ship_to.city']]])
                    <div class="clearfix"></div>
                    @include('form.checkbox',['var'=>['name'=>'to_is_residential','label'=>'Residential', 'div'=>'col-md-12','params'=>['v-model'=>'ship_to.is_residential']]])
                </td>
            </tr>
            <tr>
                <td>State(Code)</td>
                <td>@include('form.text',['var'=>['name'=>'ship_state', 'div'=>'col-md-6','params'=>['v-model'=>'ship_from.state','class'=>'validate[maxSize[4]]']]])</td>
                <td>@include('form.text',['var'=>['name'=>'to_state', 'div'=>'col-md-6','params'=>['v-model'=>'ship_to.state','class'=>'validate[maxSize[4]]']]])</td>
            </tr>
            <tr>
                <td>Post Code/Zip Code</td>
                <td>@include('form.text',['var'=>['name'=>'ship_code', 'div'=>'col-md-6','params'=>['v-model'=>'ship_from.zip_code','class'=>'validate[required]']]])</td>
                <td>@include('form.text',['var'=>['name'=>'to_code', 'div'=>'col-md-6','params'=>['v-model'=>'ship_to.zip_code','class'=>'validate[required]']]])</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <?php
                    $var_ship_from_country = [
                        'name'        => 'ship_country',
                        'table'       => 'countries',
                        'value_field' => 'iso2',
                        'div'         => 'col-md-12',
                        'params'      => [
                            'class'   => 'validate[required]',
                            'v-model' => 'ship_from.country',
                        ]
                    ];
                    ?>
                    @include('form.select-model',['var'=>$var_ship_from_country])
                </td>
                <td>
                    <?php
                    $var_ship_to_country = [
                        'name'        => 'to_country',
                        'table'       => 'countries',
                        'value_field' => 'iso2',
                        'div'         => 'col-md-12',
                        'params'      => [
                            'class'   => 'validate[required]',
                            'v-model' => 'ship_to.country',
                        ]
                    ];
                    ?>
                    @include('form.select-model',['var'=>$var_ship_to_country])
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>@include('form.text',['var'=>['name'=>'ship_phone', 'div'=>'col-md-12']])</td>
                <td>@include('form.text',['var'=>['name'=>'to_phone', 'div'=>'col-md-12']])</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

@section('js')
    @parent
    <script>
        var addressApp = new Vue({
            el: '#address',
            data: shared,
            mounted: function () {

                // Fix select2 issue using these lines of code
                $("#s2id_ship_country").remove();
                $("select[name=ship_country]").select2().on('change', function () {
                    shared.ship_from.country = this.value;
                });

                // Fix select2 issue using these lines of code
                $("#s2id_to_country").remove();
                $("select[name=to_country]").select2().on('change', function () {
                    shared.ship_to.country = this.value;
                });

                // Fix checkbox
                initCheckbox();
            },
        });

    </script>
@endsection