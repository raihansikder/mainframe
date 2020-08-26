<div class="clearfix"></div>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#address">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Billing & Shipping Address
                </a>
            </h5>
        </div>
        <div id="address" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-6">
                <h3>Billing</h3>
                @include('form.text',['var'=>['name'=>'billing_company_name','label'=>'Company Name', 'div'=>'col-sm-12']])
                {{--first_name--}}
                @include('form.text',['var'=>['name'=>'billing_first_name','label'=>'First Name', 'div'=>'col-sm-6']])
                {{--last_name--}}
                @include('form.text',['var'=>['name'=>'billing_last_name','label'=>'Last Name', 'div'=>'col-sm-6']])
                {{--email--}}
                @include('form.text',['var'=>['name'=>'billing_email','label'=>'Email', 'div'=>'col-sm-6']])
                {{--address1--}}
                @include('form.text',['var'=>['name'=>'billing_address1','label'=>'Address-1', 'div'=>'col-sm-12']])
                {{--address2--}}
                @include('form.text',['var'=>['name'=>'billing_address2','label'=>'Address-2', 'div'=>'col-sm-12']])
                {{--city--}}
                @include('form.text',['var'=>['name'=>'billing_city','label'=>'City', 'div'=>'col-sm-6']])
                {{--county--}}
                @include('form.text',['var'=>['name'=>'billing_county','label'=>'County', 'div'=>'col-sm-6']])
                {{--country_id--}}
                @include('form.select-model',['var'=>['name'=>'billing_country_id','label'=>'Country','table'=>'countries', 'div'=>'col-sm-6']])
                {{--zip_code--}}
                @include('form.text',['var'=>['name'=>'billing_zip_code','label'=>'Postcode / ZIP Code', 'div'=>'col-sm-3']])
                {{--phone--}}
                @include('form.text',['var'=>['name'=>'billing_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                {{--mobile--}}
                @include('form.text',['var'=>['name'=>'billing_mobile','label'=>'Mobile', 'div'=>'col-sm-6']])

            </div>
            <div class="col-md-6">
                @include('form.checkbox',['var'=>['name'=>'is_same_as_billing','label'=>'Same as Billing?','div'=>'col-sm-12']])
                <h3>Shipping</h3>
                @include('form.text',['var'=>['name'=>'shipping_company_name','label'=>'Company Name', 'div'=>'col-sm-12']])
                {{--first_name--}}
                @include('form.text',['var'=>['name'=>'shipping_first_name','label'=>'First Name', 'div'=>'col-sm-6']])
                {{--last_name--}}
                @include('form.text',['var'=>['name'=>'shipping_last_name','label'=>'Last Name', 'div'=>'col-sm-6']])
                {{--email--}}
                @include('form.text',['var'=>['name'=>'shipping_email','label'=>'Email', 'div'=>'col-sm-6']])
                {{--address1--}}
                @include('form.text',['var'=>['name'=>'shipping_address1','label'=>'Address-1', 'div'=>'col-sm-12']])
                {{--address2--}}
                @include('form.text',['var'=>['name'=>'shipping_address2','label'=>'Address-2', 'div'=>'col-sm-12']])
                {{--city--}}
                @include('form.text',['var'=>['name'=>'shipping_city','label'=>'City', 'div'=>'col-sm-6']])
                {{--county--}}
                @include('form.text',['var'=>['name'=>'shipping_county','label'=>'County', 'div'=>'col-sm-6']])
                {{--country_id--}}
                @include('form.select-model',['var'=>['name'=>'shipping_country_id','label'=>'Country','table'=>'countries', 'div'=>'col-sm-6']])
                {{--zip_code--}}
                @include('form.text',['var'=>['name'=>'shipping_zip_code','label'=>'Postcode / ZIP Code', 'div'=>'col-sm-3']])
                {{--phone--}}
                @include('form.text',['var'=>['name'=>'shipping_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                {{--mobile--}}
                @include('form.text',['var'=>['name'=>'shipping_mobile','label'=>'Mobile', 'div'=>'col-sm-6']])

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
