@extends('projects.my-project.layouts.module.form.template')

@section('head-title')
    MPH | {{optional($element)->name}}
@endsection

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Clients\Client $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Contacts\Contact;
$element->country_id = $element->country_id ?: 187;
$currencies = ['GBP', 'USD', 'EUR'];
$designations = array_merge(['' => 'Select'], kv(Contact::$designations));

if ($element->isUpdating()) {
    //Make reseller_id field readonly if it is filled
    if ($element->reseller) {
        $immutables[] = 'reseller_id';
    }
}
?>
@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')
@endsection
@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        @include('form.text',['var'=>['name'=>'name','label'=>'Client Name', 'div'=>'col-md-6']])
        @include('form.text',['var'=>['name'=>'name_prefix','label'=>'Prefix (First 3 letters of name)']])
        @include('form.plain-text',['var'=>['name'=>'mph_id','label'=>'MPH ID']])
        <div class="clearfix"></div>

        {{-- reseller --}}
        @if($user->ofReseller())
            @include('form.hidden',['var'=>['name'=>'reseller_id','value'=>$user->reseller_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner of Client','table'=>'resellers']])
        @endif
        @include('form.text',['var'=>['name'=>'trading_as','label'=>'Trading As','div'=>'col-md-3']])

        @include('form.text',['var'=>['name'=>'vat_registration_no','label'=>'VAT Registration','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'company_registration_no','label'=>'Company Registration Number','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'target_technology','label'=>'Target Technology','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email','div'=>'col-md-3']])

        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv($currencies)]])
        {{-- partner_account_manager_id--}}
        <div class="col-md-3 no-padding no-margin">
            <?php
            $var = [
                'name' => 'partner_account_manager_id',
                'label' => 'Client Account Manager',
                'table' => 'users',
                'div' => 'col-md-12',
            ];
            if ($user->ofReseller()) {
                $var['query'] = DB::table('users')->where('reseller_id', $user->reseller_id);
            } else {
                $var['query'] = DB::table('users')->where('group_ids', '["21"]')->orWhere('group_ids', '["22"]');
            }
            ?>
            @include('form.select-model',['var'=>$var])
            @if($user->isAdmin() && $element->updaterOfField('partner_account_manager_id'))
                <small>Updated by: {{optional($element->updaterOfField('partner_account_manager_id'))->email}} </small>
            @endif
        </div>
        @include('form.text',['var'=>['name'=>'website','label'=>'Website', 'div'=>'col-sm-5']])
        @if(isset($element,$element->website) && filter_var($element->website, FILTER_VALIDATE_URL))
            <div class="col-md-1" style="margin:0; padding:0;">
                <a target="_blank" href="{{$element->website}}"><i style="margin-left:0; padding:0; margin-top:30%;" class="fas fa-external-link-alt"></i></a>
            </div>
        @endif
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])


        <div class="clearfix"></div>
        {{--Company Description--}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#company_description"><span class="glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span> Company
                            Description
                        </a>
                    </h5>
                </div>
                <div id="company_description" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        @include('form.textarea',['var'=>['name'=>'company_description','label'=>'Description']])
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        {{--Address --}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#address"><span class="glyphicon glyphicon-plus"
                                                                        aria-hidden="true"></span> Address
                        </a>
                    </h5>
                </div>
                <div id="address" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        {{--first_name--}}
                        {{--@include('form.text',['var'=>['name'=>'first_name','label'=>'First Name', 'div'=>'col-sm-4']])--}}
                        {{--last_name--}}
                        {{--@include('form.text',['var'=>['name'=>'last_name','label'=>'Surname', 'div'=>'col-sm-4']])--}}
                        {{--email--}}
                        {{--@include('form.text',['var'=>['name'=>'email','label'=>'Email', 'div'=>'col-sm-4']])--}}
                        {{--address1--}}
                        @include('form.text',['var'=>['name'=>'address1','label'=>'Address-1', 'div'=>'col-sm-6']])
                        {{--address2--}}
                        @include('form.text',['var'=>['name'=>'address2','label'=>'Address-2', 'div'=>'col-sm-6']])
                        {{--city--}}
                        @include('form.text',['var'=>['name'=>'city','label'=>'City', 'div'=>'col-sm-3']])
                        {{--county--}}
                        @include('form.text',['var'=>['name'=>'county','label'=>'County', 'div'=>'col-sm-3']])
                        {{--country_id--}}
                        @include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'div'=>'col-sm-3']])
                        {{--zip_code--}}
                        @include('form.text',['var'=>['name'=>'zip_code','label'=>'Postcode / ZIP Code', 'div'=>'col-sm-3']])
                        {{--phone--}}
                        {{--@include('form.text',['var'=>['name'=>'phone','label'=>'Phone', 'div'=>'col-sm-3']])--}}
                        {{--mobile--}}
                        {{--@include('form.text',['var'=>['name'=>'mobile','label'=>'Mobile', 'div'=>'col-sm-3']])--}}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{--Contact --}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#contact"><span class="glyphicon glyphicon-plus"
                                                                        aria-hidden="true"></span> Contact
                        </a>
                    </h5>
                </div>
                <div id="contact" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        @include('form.checkbox',['var'=>['name'=>'is_same_as_address','label'=>'Same details as Address?','div'=>'col-sm-12']])
                        {{--first_name--}}
                        @include('form.text',['var'=>['name'=>'contact1_first_name','label'=>'First Name', 'div'=>'col-sm-3']])
                        {{--last_name--}}
                        @include('form.text',['var'=>['name'=>'contact1_last_name','label'=>'Surname', 'div'=>'col-sm-3']])
                        {{--email--}}
                        @include('form.text',['var'=>['name'=>'contact1_email','label'=>'Email', 'div'=>'col-sm-3']])                             {{--contact1_designation--}}
                        @include('form.select-array',['var'=>['name'=>'contact1_designation','label'=>'Designation', 'options'=>$designations,'div'=>'col-sm-3']])
                        {{--contact1_other_designation--}}
                        @include('form.text',['var'=>['name'=>'contact1_other_designation','label'=>'Other Designation', 'div'=>'col-sm-3 contact1_other_designation']])
                        {{--address1--}}
                        @include('form.text',['var'=>['name'=>'contact1_address1','label'=>'Address-1', 'div'=>'col-sm-6']])
                        {{--address2--}}
                        @include('form.text',['var'=>['name'=>'contact1_address2','label'=>'Address-2', 'div'=>'col-sm-6']])
                        {{--city--}}
                        @include('form.text',['var'=>['name'=>'contact1_city','label'=>'City', 'div'=>'col-sm-3']])
                        {{--county--}}
                        @include('form.text',['var'=>['name'=>'contact1_county','label'=>'County', 'div'=>'col-sm-3']])
                        {{--country_id--}}
                        @include('form.select-model',['var'=>['name'=>'contact1_country_id','label'=>'Country','table'=>'countries', 'div'=>'col-sm-3']])
                        {{--zip_code--}}
                        @include('form.text',['var'=>['name'=>'contact1_zip_code','label'=>'Postcode / ZIP Code', 'div'=>'col-sm-3']])
                        {{--phone--}}
                        @include('form.text',['var'=>['name'=>'contact1_phone','label'=>'Phone', 'div'=>'col-sm-3']])
                        {{--mobile--}}
                        @include('form.text',['var'=>['name'=>'contact1_mobile','label'=>'Mobile', 'div'=>'col-sm-3']])

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
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
                        @include('form.text',['var'=>['name'=>'anticipated_credit_limit','label'=>'Anticipated Credit Limit', 'div'=>'col-sm-6']])

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
                                    {{--@include('form.checkbox',['var'=>['name'=>'agreed_credit_check','label'=>'I hereby sign to agree to your terms and conditions of sale and submit the above information for the purpose of opening an account with MPH Group to consult with credit reference agencies when doing credit evaluations on me as an individual or my business','div'=>'col-sm-12']])--}}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <div id="is_active">@include('form.is-active')</div>

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--    <div class="col-md-6 no-padding-l">--}}
    {{--        <h5>File upload</h5>--}}
    {{--        <small>Upload one or more files</small>--}}
    {{--        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])--}}
    {{--    </div>--}}
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.clients.form.js')
@endsection