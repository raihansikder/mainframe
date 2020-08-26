<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Resellers\Reseller $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Contacts\Contact;
use App\Projects\MphMarket\Modules\Resellers\Reseller;

$element->country_id = $element->country_id ?: 187;
$currencies = ['GBP', 'USD', 'EUR'];
$statuses = array_merge(['' => 'Select'], kv(['Lead', 'Active MPH Partner', 'Inactive MPH Partner']));
$ultimateFinanceOptions = ['0' => 'No', '1' => 'Yes'];
$contactCreateUrl = route('contacts.create')
    ."?redirect_success=".URL::full()
    ."&module_id=".$element->module()->id
    ."&element_id=".$element->id;

$i = 1;
$vatPercentageTypes = Reseller::$vatPercentageTypes;
$designations = array_merge(['' => 'Select'], kv(Contact::$designations));

if ($element->isUpdating()) {
    $immutables[] = 'country_id';
}
?>
@section('content')
    <div class="col-md-12 no-padding" style="margin-top: 20px;">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv($currencies)]])
        {{--account_code--}}
        @include('form.text',['var'=>['name'=>'account_code','label'=>'Account Code', 'div'=>'col-sm-3']])
        <?php

            $editable=(user()->isAdmin() || user()->isSalesAdmin() || user()->isSalesMember())? true : false;
        ?>
        {{--default_commission_scheme_id--}}
        @include('form.select-model',['var'=>['name'=>'default_commission_scheme_id','label'=>'Commission Scheme','table'=>'commission_schemes', 'div'=>'col-sm-3','editable'=>$editable]])
        {{--default_payment_scheme_id--}}
        @include('form.select-model',['var'=>['name'=>'default_payment_scheme_id','label'=>'Payment Scheme','table'=>'payment_schemes', 'div'=>'col-sm-3','editable'=>$editable]])
        @include('form.select-array',['var'=>['name'=>'has_ultimate_finance','label'=>'Ultimate Finance', 'options'=>$ultimateFinanceOptions]])
        <div class="clearfix"></div>
        {{--Financial Information--}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#financial_information"><span
                                    class="glyphicon glyphicon-plus"
                                    aria-hidden="true"></span>
                            Financial Information
                        </a>
                    </h5>
                </div>
                <div id="financial_information" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        {{--bank_name--}}
                        @include('form.text',['var'=>['name'=>'bank_name','label'=>'Bank Name', 'div'=>'col-sm-12']])
                        {{--bank_sort_code--}}
                        @include('form.text',['var'=>['name'=>'bank_sort_code','label'=>'Bank Sort code', 'div'=>'col-sm-6']])
                        {{--bank_account_no--}}
                        @include('form.text',['var'=>['name'=>'bank_account_no','label'=>'Bank Account No', 'div'=>'col-sm-6']])
                        {{--bank_address--}}
                        @include('form.text',['var'=>['name'=>'bank_address','label'=>'Bank Address', 'div'=>'col-sm-12']])
                        {{--financial_year_end--}}
                        @include('form.date',['var'=>['name'=>'financial_year_end','label'=>'Financial Year End', 'div'=>'col-sm-6']])
                        {{--anticipated_credit_limit--}}
                        @include('form.text',['var'=>['name'=>'anticipated_credit_limit','label'=>'Credit Limit', 'div'=>'col-sm-6']])

                        {{--allow non active reseller to add vat_percentage--}}
                        @if(isset($element) && user()->ofReseller() && !$element->is_active)
                            {{--vat percentage--}}
                            @include('form.select-array',['var'=>['name'=>'vat_percentage','label'=>'Vat Percentage','options'=>$vatPercentageTypes]])
                            {{--Only admin will be able to change vat_percentage--}}
                        @else
                            @include('form.select-array',['var'=>['name'=>'vat_percentage','label'=>'Vat Percentage','options'=>$vatPercentageTypes,'editable'=>$user->isAdmin()]])
                        @endif

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{--Payment Section--}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#payment_section"><span class="glyphicon glyphicon-plus"
                                                                                aria-hidden="true"></span>
                            Payment Section
                        </a>
                    </h5>
                </div>
                <div id="payment_section" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        {{--holding_company--}}
                        @include('form.text',['var'=>['name'=>'holding_company','label'=>'Holding Company', 'div'=>'col-sm-12']])
                        {{--trading_address--}}
                        @include('form.text',['var'=>['name'=>'trading_address','label'=>'Trading Address', 'div'=>'col-sm-12']])
                        {{--trading_phone--}}
                        @include('form.text',['var'=>['name'=>'trading_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                        {{--trading_fax--}}
                        @include('form.text',['var'=>['name'=>'trading_fax','label'=>'Fax', 'div'=>'col-sm-6']])
                        {{--trading_registration_no--}}
                        @include('form.text',['var'=>['name'=>'trading_registration_no','label'=>'Registration No', 'div'=>'col-sm-6']])
                        {{--trading_registration_date--}}
                        @include('form.date',['var'=>['name'=>'trading_registration_date','label'=>'Registration Date', 'div'=>'col-sm-6']])
                        {{--trading_vat_registration_no--}}
                        @include('form.text',['var'=>['name'=>'trading_vat_registration_no','label'=>'Vat Registration No', 'div'=>'col-sm-6']])
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12 panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" href="#trade_reference"><span
                                                class="glyphicon glyphicon-plus"
                                                aria-hidden="true"></span>
                                        Trade Reference
                                    </a>
                                </h5>
                            </div>
                            <div id="trade_reference" class="panel-collapse collapse" style="margin:15px 0;">
                                <div class="col-md-12">
                                    {{--trade_reference_name--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_name','label'=>'Name', 'div'=>'col-sm-6']])
                                    {{--trade_reference_address--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_address','label'=>'Address', 'div'=>'col-sm-6']])
                                    {{--trade_reference_phone--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                                    {{--trade_reference_fax--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_fax','label'=>'Fax', 'div'=>'col-sm-6']])
                                    {{--trade_reference_contact_name--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_contact_name','label'=>'Contact Name', 'div'=>'col-sm-12']])
                                    {{--trade_reference_banker_name--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_banker_name','label'=>'Bankers Name', 'div'=>'col-sm-6']])
                                    {{--trade_reference_banker_address--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_banker_address','label'=>'Bankers Address', 'div'=>'col-sm-6']])
                                    {{--trade_reference_account_no--}}
                                    @include('form.text',['var'=>['name'=>'trade_reference_account_no','label'=>'Account Number', 'div'=>'col-sm-12']])
                                    {{--agreed_credit_check--}}
                                    @include('form.checkbox',['var'=>['name'=>'agreed_credit_check','label'=>'I hereby sign to agree to your terms and conditions of sale and submit the above information for the purpose of opening an account with MPH Group to consult with credit reference agencies when doing credit evaluations on me as an individual or my business','div'=>'col-sm-12']])
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        {{--notification_email--}}
        @include('form.text',['var'=>['name'=>'notification_email','label'=>'Please provide an email address for forwarding invoices and statements to:', 'div'=>'col-sm-4']])
        {{--account_created_at--}}
        @include('form.date',['var'=>['name'=>'account_created_at','label'=>'Account Creation Date', 'div'=>'col-sm-3']])
        {{--credit_available--}}
        @include('form.text',['var'=>['name'=>'credit_available','label'=>'Credit Available', 'div'=>'col-sm-3']])
        <div class="clearfix"></div>

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection
@section('content-bottom')
    @parent

    @if($user->isAdmin() || user()->isSalesMember() || user()->isSalesAdmin())
        <div class="col-md-12 no-padding-l">
            @include('projects.my-project.modules.resellers.form.includes.invoices')
        </div>
        <div class="col-md-12 no-padding-l">
            @include('projects.my-project.modules.resellers.form.includes.orders')
        </div>
    @endif
@endsection
@section('js')
    @parent
    <script>
        //to remove the show 10 entries box
        var table = $('#tableInvoices').DataTable({
            "bLengthChange": false,
        });

    </script>
@endsection