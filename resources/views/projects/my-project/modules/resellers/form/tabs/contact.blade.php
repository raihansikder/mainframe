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

use App\Projects\MphMarket\Modules\Contacts\Contact;use App\Projects\MphMarket\Modules\Resellers\Reseller;
$element->country_id = $element->country_id ?: 187;
$currencies = ['GBP', 'USD', 'EUR'];
$statuses = array_merge(['' => 'Select'], kv(['Lead', 'Active MPH Partner', 'Inactive MPH Partner', 'Ongoing Credit Check']));
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
    <div class="col-md-12 no-padding" style="margin-top: 10px;">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        @include('form.text',['var'=>['name'=>'name','label'=>'Company Name','div'=>'col-md-6']])
        @include('form.text',['var'=>['name'=>'name_prefix','label'=>'Prefix (First 3 letters of name)']])
        @include('form.plain-text',['var'=>['name'=>'mph_id','label'=>'MPH ID']])
        {{--@include('form.text',['var'=>['name'=>'legal_name','label'=>'Legal Name','div'=>'col-md-3']])--}}
        @include('form.text',['var'=>['name'=>'trading_as','label'=>'Trading As','div'=>'col-md-3']])

        @include('form.text',['var'=>['name'=>'vat_registration_no','label'=>'VAT Registration','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'company_registration_no','label'=>'Company Registration Number','div'=>'col-md-3']])
        <div id="status">@include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])</div>
        {{--@include('form.text',['var'=>['name'=>'target_technology','label'=>'Target Technology','div'=>'col-md-3']])--}}
        {{--@include('form.text',['var'=>['name'=>'target_customer','label'=>'Target Customer Market','div'=>'col-md-3']])--}}
        {{--@include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv($currencies)]])--}}
        @include('form.text',['var'=>['name'=>'website','label'=>'Website', 'div'=>'col-sm-5']])
        @if(isset($element,$element->website) && filter_var($element->website, FILTER_VALIDATE_URL))
            <div class="col-md-1" style="margin:0; padding:0;">
                <a target="_blank" href="{{$element->website}}"><i style="margin-left:0; padding:0; margin-top:30%;" class="fas fa-external-link-alt"></i></a>
            </div>
        @endif
        {{--<div class="clearfix"></div>--}}
        {{--<div id="note">@include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])</div>--}}

        {{--@include('form.select-model',['var'=>['name'=>'default_commission_scheme_id','label'=>'Commission Scheme','table'=>'commission_schemes', 'div'=>'col-sm-3','editable'=>$user->isAdmin()]])--}}
        {{--@include('form.select-model',['var'=>['name'=>'default_payment_scheme_id','label'=>'Payment Scheme','table'=>'payment_schemes', 'div'=>'col-sm-3','editable'=>$user->isAdmin()]])--}}

        {{--email--}}
        @include('form.text',['var'=>['name'=>'email','label'=>'Email', 'div'=>'col-sm-3']])
        {{--notification_email--}}
        {{--@include('form.text',['var'=>['name'=>'notification_email','label'=>'Please provide an email address for forwarding invoices and statements to:', 'div'=>'col-sm-3']])--}}
        {{--<div class="clearfix"></div>--}}

        {{-- internal_account_manager_id --}}
        <div class="col-md-3 no-padding no-margin">
            <?php
            $var = [
                'name' => 'internal_account_manager_id',
                'label' => 'MPH Account Manager',
                'table' => 'users',
                'div' => 'col-md-12',
            ];

            $var['query'] = DB::table('users')->where('group_ids', '["1"]')->orWhere('group_ids', '["18"]')->orWhere('group_ids', '["28"]')
                ->orWhere('group_ids', '["29"]');

            ?>
            @include('form.select-model',['var'=>$var])
            @if($user->isAdmin() && $element->updaterOfField('internal_account_manager_id'))
                <small>Updated by: {{optional($element->updaterOfField('internal_account_manager_id'))->email}} </small>
            @endif
        </div>
        @include('form.text',['var'=>['name'=>'deal_reg_expiry_after_days','label'=>'Deal Reg Expiry Term(Days)', 'div'=>'col-sm-3']])

        <div class="clearfix margin"></div>
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
                        {{--@include('form.text',['var'=>['name'=>'first_name','label'=>'First Name', 'div'=>'col-sm-3']])--}}
                        {{--last_name--}}
                        {{--@include('form.text',['var'=>['name'=>'last_name','label'=>'Surname', 'div'=>'col-sm-3']])--}}
                        {{--full_name--}}
                        {{--@include('form.text',['var'=>['name'=>'full_name','label'=>'Full Name', 'div'=>'col-sm-6']])--}}
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
                        {{--@include('form.text',['var'=>['name'=>'phone','label'=>'Main Contact Number', 'div'=>'col-sm-3']])--}}
                        {{--mobile--}}
                        {{--@include('form.text',['var'=>['name'=>'mobile','label'=>'Mobile', 'div'=>'col-sm-3']])--}}

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
                            {{--contact2_first_name--}}
                            @include('form.text',['var'=>['name'=>'contact2_first_name','label'=>'First Name', 'div'=>'col-sm-6']])
                            {{--contact2_last_name--}}
                            @include('form.text',['var'=>['name'=>'contact2_last_name','label'=>'Surname', 'div'=>'col-sm-6']])
                            {{--contact2_email--}}
                            @include('form.text',['var'=>['name'=>'contact2_email','label'=>'Email', 'div'=>'col-sm-6']])
                            <div class="clearfix"></div>
                            {{--contact2_designation--}}
                            @include('form.select-array',['var'=>['name'=>'contact2_designation','label'=>'Designation', 'options'=>$designations,'div'=>'col-sm-6']])
                            {{--contact2_other_designation--}}
                            @include('form.text',['var'=>['name'=>'contact2_other_designation','label'=>'Other Designation', 'div'=>'col-sm-6 contact2_other_designation']])
                            {{--contact2_address--}}
                            @include('form.text',['var'=>['name'=>'contact2_address','label'=>'Address', 'div'=>'col-sm-12']])
                            {{--contact2_phone--}}
                            @include('form.text',['var'=>['name'=>'contact2_phone','label'=>'Phone', 'div'=>'col-sm-6']])
                            {{--contact2_mobile--}}
                            @include('form.text',['var'=>['name'=>'contact2_mobile','label'=>'Mobile', 'div'=>'col-sm-6']])
                            {{--contact2_note--}}
                            @include('form.text',['var'=>['name'=>'contact2_note','label'=>'Note', 'div'=>'col-sm-12']])
                        </div>
                    </div>
                    @if($element->isUpdating())
                        @include('projects.my-project.modules.resellers.form.includes.contacts')
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{--Agreements--}}
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#agreement"><span class="glyphicon glyphicon-plus"
                                                                          aria-hidden="true"></span>
                            Agreements
                        </a>
                    </h5>
                </div>
                <div id="agreement" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        @include('form.checkbox',['var'=>['name'=>'has_mph_agreement','label'=>'MPH Agreement','div'=>'col-sm-12']])
                        @include('form.checkbox',['var'=>['name'=>'has_reseller_agreement','label'=>'Partner Agreement','div'=>'col-sm-12']])
                        @include('form.checkbox',['var'=>['name'=>'has_realwear_nda','label'=>'Realwear NDA','div'=>'col-sm-12']])
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        @if(!$element->default_payment_scheme_id)
            @include('form.select-model',['var'=>['name'=>'default_payment_scheme_id','label'=>'Payment Scheme','table'=>'payment_schemes', 'div'=>'col-sm-3','editable'=>$user->isAdmin()]])
        @endif
        <div class="clearfix"></div>
        {{--@include('form.checkbox',['var'=>['name'=>'accepted_terms','label'=>"I accept to the <a target='_blank' href='https://mphgroup.uk/wp-content/uploads/2020/01/Reseller-Agreement-MPH-Group.pdf'>Reseller Agreement</a>",'div'=>'col-sm-12']])--}}
        @include('form.checkbox',['var'=>['name'=>'subscribed_to_newsletter','label'=>'By checking this box, I agree I want to receive any marketing comms from MPH group','div'=>'col-sm-12']])

        <div id="is_active">@include('form.is-active')</div>

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent

    @if($user->isAdmin())
        <div class="col-md-6 no-padding-l">
            @include('projects.my-project.modules.resellers.form.includes.margins')
        </div>
    @endif

    <h4>Uploads</h4>
    <div class="col-md-6 no-padding-l">
        <small>Upload company logo</small>
        @include('form.uploads',['var'=>['type'=>'logo','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Upload balance sheet</small>
        @include('form.uploads',['var'=>['type'=>'balance-sheet','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Upload certificate of incorporation</small>
        @include('form.uploads',['var'=>['type'=>'certificate-of-incorporation','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Upload VAT registration certificate</small>
        @include('form.uploads',['var'=>['type'=>'VAT-registration-certificate','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Upload company letter-headed paper</small>
        @include('form.uploads',['var'=>['type'=>'company-letter-headed-paper','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>MPH Agreement</small>
        @include('form.uploads',['var'=>['type'=>'mph-agreement','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Partner Agreement</small>
        @include('form.uploads',['var'=>['type'=>'reseller-agreement','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>Realwear NDA</small>
        @include('form.uploads',['var'=>['type'=>'realwear-nda','limit'=>1]])
    </div>
    <div class="col-md-6 no-padding-l">
        <small>External Agreement</small>
        @include('form.uploads',['var'=>['type'=>'external-agreement','limit'=>1]])
    </div>
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.resellers.form.js')
@endsection