@extends('projects.my-project.layouts.module.form.template')

@section('head-title')
    MPH | {{optional($element)->name}}
@endsection

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Vendors\Vendor $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Contacts\Contact;
$element->country_id = $element->country_id ?: 187;
$currencies = ['GBP', 'USD', 'EUR'];
$contactCreateUrl = route('contacts.create')
    ."?redirect_success=".URL::full()
    ."&module_id=".$element->module()->id
    ."&element_id=".$element->id;

$i = 1;
$designations = array_merge(['' => 'Select'], kv(Contact::$designations));
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
        @include('form.text',['var'=>['name'=>'name','label'=>'Vendor Name','div'=>'col-md-6','editable'=>true]])
        {{--@include('form.text',['var'=>['name'=>'legal_name','label'=>'Legal Name','div'=>'col-md-3']])--}}
        @include('form.text',['var'=>['name'=>'trading_as','label'=>'Trading As','div'=>'col-md-3']])
        <div class="clearfix"></div>

        @include('form.text',['var'=>['name'=>'vat_registration_no','label'=>'VAT Registration','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'company_registration_no','label'=>'Company Registration Number','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'target_technology','label'=>'Target Technology','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'target_customer','label'=>'Target Customer Market','div'=>'col-md-3']])
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])

        @include('form.text',['var'=>['name'=>'website','label'=>'Website', 'div'=>'col-sm-6']])

        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv($currencies)]])
        @include('form.select-model',['var'=>['name'=>'default_payment_scheme_id','label'=>'Payment Scheme','table'=>'payment_schemes', 'div'=>'col-sm-3']])
        {{--email--}}
        @include('form.text',['var'=>['name'=>'email','label'=>'Email', 'div'=>'col-sm-3']])
        {{--notification_email--}}
        @include('form.text',['var'=>['name'=>'notification_email','label'=>'Please provide an email address for forwarding invoices and statements to:', 'div'=>'col-sm-3']])
        <div class="clearfix"></div>
        {{--Address--}}
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
                        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name', 'div'=>'col-sm-3']])
                        {{--last_name--}}
                        @include('form.text',['var'=>['name'=>'last_name','label'=>'Surname', 'div'=>'col-sm-3']])
                        {{--full_name--}}
                        @include('form.text',['var'=>['name'=>'full_name','label'=>'Full Name', 'div'=>'col-sm-6']])
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
                        @include('form.text',['var'=>['name'=>'phone','label'=>'Phone', 'div'=>'col-sm-3']])
                        {{--mobile--}}
                        @include('form.text',['var'=>['name'=>'mobile','label'=>'Mobile', 'div'=>'col-sm-3']])

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{--Contact--}}
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
                        <div class="col-md-6">
                            <h4>Primary Contact</h4>
                            {{--contact1_first_name--}}
                            @include('form.text',['var'=>['name'=>'contact1_first_name','label'=>'First Name', 'div'=>'col-sm-6']])
                            {{--contact1_last_name--}}
                            @include('form.text',['var'=>['name'=>'contact1_last_name','label'=>'Surname', 'div'=>'col-sm-6']])
                            {{--contact1_email--}}
                            @include('form.text',['var'=>['name'=>'contact1_email','label'=>'Email', 'div'=>'col-sm-6']])
                            <div class="clearfix"></div>
                            {{--contact1_designation--}}
                            @include('form.select-array',['var'=>['name'=>'contact1_designation','label'=>'Designation', 'options'=>$designations,'div'=>'col-sm-6']])
                            {{--contact1_other_designation--}}
                            @include('form.text',['var'=>['name'=>'contact1_other_designation','label'=>'Other Designation', 'div'=>'col-sm-6 contact1_other_designation']])
                            {{--contact1_address--}}
                            @include('form.text',['var'=>['name'=>'contact1_address','label'=>'Address', 'div'=>'col-sm-12']])
                            {{--contact1_phone--}}
                            @include('form.text',['var'=>['name'=>'contact1_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                            {{--contact1_mobile--}}
                            @include('form.text',['var'=>['name'=>'contact1_mobile','label'=>'Mobile', 'div'=>'col-sm-6']])
                            {{--contact1_note--}}
                            @include('form.text',['var'=>['name'=>'contact1_note','label'=>'Note', 'div'=>'col-sm-12']])
                        </div>
                        <div class="col-md-6">
                            <h4>Secondary Contact</h4>
                            {{--contact1_first_name--}}
                            @include('form.text',['var'=>['name'=>'contact2_first_name','label'=>'First Name', 'div'=>'col-sm-6']])
                            {{--contact1_last_name--}}
                            @include('form.text',['var'=>['name'=>'contact2_last_name','label'=>'Surname', 'div'=>'col-sm-6']])
                            {{--contact1_email--}}
                            @include('form.text',['var'=>['name'=>'contact2_email','label'=>'Email', 'div'=>'col-sm-6']])
                            <div class="clearfix"></div>
                            {{--contact1_designation--}}
                            @include('form.select-array',['var'=>['name'=>'contact2_designation','label'=>'Designation', 'options'=>$designations,'div'=>'col-sm-6']])
                            {{--contact1_other_designation--}}
                            @include('form.text',['var'=>['name'=>'contact2_other_designation','label'=>'Other Designation', 'div'=>'col-sm-6 contact2_other_designation']])
                            {{--contact1_address--}}
                            @include('form.text',['var'=>['name'=>'contact2_address','label'=>'Address', 'div'=>'col-sm-12']])
                            {{--contact1_phone--}}
                            @include('form.text',['var'=>['name'=>'contact2_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                            {{--contact1_mobile--}}
                            @include('form.text',['var'=>['name'=>'contact2_mobile','label'=>'Mobile', 'div'=>'col-sm-6']])
                            {{--contact1_note--}}
                            @include('form.text',['var'=>['name'=>'contact2_note','label'=>'Note', 'div'=>'col-sm-12']])
                        </div>
                    </div>
                    @if($element->isUpdating())
                        <div class="col-md-12">
                            {{--<a href="{{$contactCreateUrl}}">Add Contact </a>--}}

                            {{--<ul>--}}
                            {{--@foreach($element->contacts as $contact)--}}
                            {{--<li>{{$contact->name}}</li>--}}
                            {{--@endforeach--}}
                            {{--</ul>--}}
                            <h4>Key Contact</h4>
                            <div>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @if(count($element->contacts))
                                        @foreach($element->contacts as $contact)
                                            <tbody>
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->designation}}</td>
                                                <td>{{$contact->phone}}</td>
                                                <td><a class="btn btn-xs btn-default flat"
                                                       href="{{route('contacts.edit',$contact->id)}}"><i
                                                            class="fa fa-edit"></i></a></td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    @else
                                        <tbody>
                                        <tr>
                                            <td colspan="5">{{'No contact available'}}</td>
                                        </tr>
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                            <div>
                                <a class="btn btn-default pull-right" title="Create new contact" target="_blank"
                                   href="{{$contactCreateUrl}}">
                                    <i class="fa fa-plus"></i>Add Contact </a>

                            </div>
                        </div>
                    @endif
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
                        @include('form.text',['var'=>['name'=>'contact1_address','label'=>'Bank Address', 'div'=>'col-sm-12']])
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
                                    @include('form.date',['var'=>['name'=>'trade_reference_contact_name','label'=>'Contact Name', 'div'=>'col-sm-12']])
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
        {{--@include('form.checkbox',['var'=>['name'=>'accepted_terms','label'=>"I accept to <a target='_blank' href='#'>Vendor Agreement</a>",'div'=>'col-sm-12']])--}}
        @include('form.checkbox',['var'=>['name'=>'subscribed_to_newsletter','label'=>'By checking this box, I agree I want to receive any marketing comms from MPH group','div'=>'col-sm-12']])

        @include('form.is-active')

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if($user->isAdmin())
        <div class="col-md-6 no-padding-l">
            @include('projects.my-project.modules.vendors.form.includes.margins')
        </div>
    @endif

    <div class="col-md-6 no-padding-l">
        <h4>Upload Logo</h4>
        <small>Upload company logo</small>
        @include('form.uploads',['var'=>['type'=>'logo','limit'=>1]])
    </div>
@endsection

@section('js')
    @parent
{{--    @include('projects.my-project.modules.vendors.form.js')--}}
@endsection