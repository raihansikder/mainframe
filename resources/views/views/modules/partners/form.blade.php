<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'partners'
 * @var $mod                   \App\Module
 * @var $partner               \App\Partner Object that is being edited
 * @var $element               string 'partner'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('content-top')
    @parent
    @if(isset($partner))
        @if(user()->isSuperUser())
            <div class="btn-group" style="padding-bottom: 15px">
                <a class="btn btn-default" href="{{route('get.partners-invoices',$partner->id)}}">Invoices</a>
                <a class="btn btn-default" href="{{route('admin.partner-dashboard',$partner->id)}}" target="_blank">Dashboard</a>
                {{--<a class="btn btn-default" href="">Invoices</a>--}}
            </div>
        @endif
    @endif
@endsection

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
{{-- Brand Information --}}


@include('form.input-text',['var'=>['name'=>'name','label'=>'Brand/Partner Name', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'code','label'=>'Code', 'container_class'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>kv(\App\Partner::$statuses), 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>

@if(user()->isSuperUser() || user()->isLBAdminUser())
    {{--@include('form.select-model',['var'=>['name'=>'partnercategory_id','label'=>'Category', 'table'=>'partnercategories','name_field'=>'name_ext', 'container_class'=>'col-sm-3']])--}}

    <?php
    $var = [
        'name' => 'partnercategory_ids',
        'label' => 'Partner categories',
        'query' => new \App\Partnercategory,
        'container_class' => 'col-md-12',
        'name_field' => 'name_ext',
    ];
    ?>
    @include('form.select-model-multiple', ['var'=>$var])

    {{--@include('form.select-array',['var'=>['name'=>'is_featured','label'=>'Featured', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-sm-3','params' => ['id' => 'is_featured']]])--}}
    @include('form.input-text',['var'=>['name'=>'order','label'=>'Order', 'container_class'=>'col-sm-3']])
    <div class="clearfix"></div>

    @include('form.input-text',['var'=>['name'=>'signup_date','label'=>'Signed up on', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
    @include('form.input-text',['var'=>['name'=>'test_date','label'=>'Test started on', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
    @include('form.input-text',['var'=>['name'=>'go_live_date','label'=>'Go Live date', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
@endif
<div class="clearfix"></div>
@include('form.select-array',['var'=>['name'=>'route','label'=>'Route', 'options'=>array_merge([''=>'Select'],kv(\App\Partner::$routes)), 'container_class'=>'col-sm-3']])
@include('form.select-model',['var'=>['name'=>'affiliate_id','label'=>'Affiliate','table'=>'affiliates', 'name_field'=>'name','container_class'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'available_in_webapp','label'=>'Available in webapp', 'options'=>['1'=>'Yes','0'=>'No'],'container_class'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'display_store_internally','label'=>'Display Internally in webapp', 'options'=>['1'=>'Yes','0'=>'No'],'container_class'=>'col-sm-3']])

<div class="clearfix"></div>
{{-- Banking information --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#settings">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Settings
                </a>
            </h5>
        </div>
        <div id="settings" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-3">
                @if(user()->isSuperUser() || user()->isLBAdminUser())
                    @include('form.input-text',['var'=>['name'=>'commission_percentage_lb','label'=>'LB(%)',
                    'container_class'=>'col-md-12']])
                    @include('form.input-text',['var'=>['name'=>'commission_percentage_recommender',
                    'label'=>'Recommender(%)', 'container_class'=>'col-md-12']])
                    @include('form.input-text',['var'=>['name'=>'commission_percentage_total','label'=>'Total(%)',
                    'container_class'=>'col-md-12','editable'=>false]])
                @endif

            </div>
            <div class="col-md-3">
                @include('form.input-text',['var'=>['name'=>'recommendation_expiry_in_days', 'label'=>'Recommendation
                 Expiry After Day(s)', 'container_class'=>'col-md-12']])

                @include('form.input-text',['var'=>['name'=>'share_url_prepend','label'=>'Prefix(Add before URL)',
                   'container_class'=>'col-md-12']])

                @include('form.input-text',['var'=>['name'=>'share_url_append','label'=>'Suffix(Add after URL)',
                   'container_class'=>'col-md-12']])

                {{--encode_after_prefix--}}
                @include('form.select-array',['var'=>['name'=>'encode_after_prefix','label'=>'Encode after prefix',
                'options'=>['1'=>'Yes','0'=>'No'], 'container_class'=>'col-md-12']])
            </div>
            {{--Adjustments--}}
            <div class="col-md-3">
                @include('form.select-array',['var'=>['name'=>'has_adjustment','label'=>'Adjust price that comes from site', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-12']])

                {{--@include('form.select-array',['var'=>['name'=>'adjust_type','label'=>'Add/Subtract','options'=>['+'=>'Add','-'=>'Subtract'],'container_class'=>'col-md-12']])--}}
                {{--@include('form.input-text',['var'=>['name'=>'adjust_val','label'=>'Value','container_class'=>'col-md-12']])--}}
                {{--@include('form.select-array',['var'=>['name'=>'adjust_in_percent','label'=>'Value is %','options'=>['1'=>'Yes','0'=>'No'], 'container_class'=>'col-md-12']])--}}

                @include('form.input-text',['var'=>['name'=>'adjustment','label'=>'Adjustment', 'container_class'=>'col-md-12']])
            </div>
            <div class="col-md-3">
                <b>Invoice settings</b>
                @include('form.input-text',['var'=>['name'=>'invoice_prefix','label'=>'Invoice Prefix', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'invoice_count_start','label'=>'Starting number', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'invoice_due_after','label'=>'Due after days', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'xero_contact_id','label'=>'Xero Contact Id','container_class'=>'col-md-12']])
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">

                @include('form.textarea',['var'=>['name'=>'tags','label'=>'Search tags', 'container_class'=>'col-md-12']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
{{-- Website information --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#website">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Website
                </a>
            </h5>
        </div>
        <div id="website" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                @include('form.input-text',['var'=>['name'=>'sitecms_name','label'=>'CMS/Platform','container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                <div class="col-md-12 no-padding-l">
                    <h5>Live</h5>
                    @include('form.input-text',['var'=>['name'=>'live_url_root','label'=>'Root/Home Url','container_class'=>'col-md-12']])
                    @include('form.input-text',['var'=>['name'=>'live_url_product','label'=>'Sample Product Details URL','container_class'=>'col-md-12']])
                    <div id="live_url_order_confirmation">@include('form.input-text',['var'=>['name'=>'live_url_order_confirmation','label'=>'Order Confirmation URL']])</div>
                    @include('form.textarea',['var'=>['name'=>'live_access','label'=>'Other Access Details']])
                </div>
                <div class="col-md-6 no-padding-l" id="stage_website">
                    <h5>Stage</h5>
                    @include('form.input-text',['var'=>['name'=>'stage_url_root','label'=>'Root/Home Url']])
                    @include('form.input-text',['var'=>['name'=>'stage_url_product','label'=>'Sample Product Details URL']])
                    @include('form.input-text',['var'=>['name'=>'stage_url_order_confirmation','label'=>'Order Confirmation URL']])
                    @include('form.textarea',['var'=>['name'=>'stage_access','label'=>'Other Access Details']])
                </div>
            </div>
            <div class="col-md-12">
                <h5>Other Technical Details</h5>
                <div class="no-padding-l" id="site_file_structure">
                    @include('form.textarea',['var'=>['name'=>'site_file_structure','label'=>'File Structure (Custom Site)']])
                </div>
                <div class="no-padding-l">
                    @include('form.textarea',['var'=>['name'=>'integration_note','label'=>'Integration Note']])
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{{-- Contact information --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#contact">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Contact
                </a>
            </h5>
        </div>
        <div id="contact" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                <div class="col-md-12 no-padding">
                    <h5>Brand Address</h5>
                    @include('form.input-text',['var'=>['name'=>'address1','label'=>'Address 1', 'container_class'=>'col-sm-6']])
                    @include('form.input-text',['var'=>['name'=>'address2','label'=>'Address 2', 'container_class'=>'col-sm-6']])
                    @include('form.input-text',['var'=>['name'=>'city','label'=>'City', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'county','label'=>'County', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'zip_code','label'=>'Zip Code', 'container_class'=>'col-sm-3']])
                    @include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'phone','label'=>'Phone', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'mobile','label'=>'Mobile', 'container_class'=>'col-sm-3']])

                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 no-padding">
                    <h5>Contact</h5>
                    @include('form.input-text',['var'=>['name'=>'contact_name','label'=>'Name', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'contact_email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'contact_phone','label'=>'Phone', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'contact_address','label'=>'Address', 'container_class'=>'col-sm-12']])
                </div>
                <div class="col-md-4">
                    <h5>Finance</h5>
                    @include('form.input-text',['var'=>['name'=>'finance_contact_name','label'=>'Name', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'finance_contact_email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'finance_contact_phone','label'=>'Phone','container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'finance_contact_address','label'=>'Address','container_class'=>'col-sm-12']])
                </div>
                <div class="col-md-4">
                    <h5>IT</h5>
                    @include('form.input-text',['var'=>['name'=>'it_contact_name','label'=>'Name', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'it_contact_email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'it_contact_phone','label'=>'Phone', 'container_class'=>'col-sm-12']])
                    @include('form.input-text',['var'=>['name'=>'it_contact_address','label'=>'Address', 'container_class'=>'col-sm-12']])
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


{{-- Banking information --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#banking">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Banking
                </a>
            </h5>
        </div>
        <div id="banking" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">


                @include('form.input-text',['var'=>['name'=>'legal_name','label'=>'Brand Legal Name', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'vat_no','label'=>'VAT No.', 'container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                @include('form.input-text',['var'=>['name'=>'bank_name','label'=>'Bank Name', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'bank_account_address','label'=>'Bank Account Address', 'container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                @include('form.input-text',['var'=>['name'=>'account_holder_name','label'=>'Account Holder Name', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_number','label'=>'Account Number', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_type','label'=>'Account Type', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_country','label'=>'Account Country', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_city','label'=>'Account City', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_state','label'=>'Account State', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_post_code','label'=>'Account Post Code', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'account_first_line','label'=>'Account First Line', 'container_class'=>'col-sm-3']])
                {{--                @include('form.input-text',['var'=>['name'=>'currency','label'=>'Currency', 'container_class'=>'col-sm-3']])--}}
                @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv(\App\Invoice::$currencies)]])
                @include('form.input-text',['var'=>['name'=>'account_name','label'=>'Account Name', 'container_class'=>'col-sm-3']])

                {{-- Complete either of the following fields as appropriate --}}
                @include('form.input-text',['var'=>['name'=>'iban','label'=>'IBAN', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'swift','label'=>'Swift', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'sort_code','label'=>'Sort Code', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'abartn','label'=>'Abartn', 'container_class'=>'col-sm-3']])

                <div class="clearfix"></div>
                @if(user()->isSuperUser())
                    @include('form.textarea',['var'=>['name'=>'payment_settings','label'=>'Payment settings (JSON)', 'container_class'=>'col-sm-6']])
                @endif

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
{{-- Region --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#region">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Region
                </a>
            </h5>
        </div>
        <div id="region" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12" style="padding-bottom: 10px;">You can either include a list of countries for which
                this partner/brand will be active.
                Or, you can exclude a list of countries. However you can not select both at the same time.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">

                <?php
                $var = [
                    'name' => 'included_country_ids',
                    'label' => 'Allowed countries',
                    'query' => new \App\Country,
                    'container_class' => 'col-md-12',
                ];
                ?>
                @include('form.select-model-multiple', ['var'=>$var])

            </div>

            <div class="col-md-6">
                <?php
                $var = [
                    'name' => 'excluded_country_ids',
                    'label' => '- OR - Excluded Countries',
                    'query' => new \App\Country,
                    'container_class' => 'col-md-12'
                ];
                ?>
                @include('form.select-model-multiple', ['var'=>$var])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class='clearfix'></div>
@if(user()->isSuperUser() || user()->isFirstLineSupport() || user()->isLBAdminUser())
    @include('form.select-array',['var'=>['name'=>'is_viewable_by_guest','label'=>'Guest can view?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-sm-3','editable' =>user()->isSuperUser()]])
    @include('form.select-array',['var'=>['name'=>'is_published','label'=>'Published?', 'options'=>['0'=>'No','1'=>'Yes'],'editable' =>user()->isSuperUser()]])
    @include('form.select-array',['var'=>['name'=>'alert_enabled','label'=>'Alert enabled?', 'options'=>['0'=>'No','1'=>'Yes'],'editable' =>user()->isSuperUser()]])
    @include('form.is_active')
@endif

@if(user()->ofPartner())
    @include('form.plain-text',['var'=>['label'=>'Published','value'=> $partner->is_published ? 'Yes' : 'No']])
@endif

<div class='clearfix'></div>
@include('form.textarea',['var'=>['name'=>'comment','label'=>'Comment (This shows in partner dashboard)']])
@include('form.select-array',['var'=>['name'=>'comment_is_published','label'=>'Publish comment?', 'options'=>['0'=>'No','1'=>'Yes']]])
<div class='clearfix'></div>

@section('content-bottom')
    @parent
    <h5>Uploads</h5>
    <div class="col-md-4 no-padding-l">
        <b>Block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Block-logo']])
    </div>
    <div class="clearfix"></div>
    <div class="featured_div">
        Following uploads are required for features partners.
        <div class="clearfix"></div>
        <div class="col-md-4 no-padding-l">
            <b>Logo</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Logo']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-horizontal</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-horizontal']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-portrait</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-vertical']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-horizontal-ipad</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-horizontal-ipad']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-portrait-ipad</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-vertical-ipad']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover photo web</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-web']])
        </div>
        <div class='clearfix'></div>
        <div class="col-md-4 no-padding-l">
            <b>Marketing materials(Brand uploads)</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>20,'type'=>'Partner-uploads']])
        </div>
    </div>

    <div class='clearfix'></div>
    @if(isset($partner))
        <div class="col-md-6  shadow" style="margin: 10px 0; padding: 10px">
            <h4 class="pull-left">Sites</h4>
            <div class="clearfix"></div>
            <?php $sites = $partner->sites()->orderBy('country_id', 'ASC')->get();?>
            @if(count($sites))
                <table class="table datatable-min">
                    <thead>
                    <tr>
                        <th>URL</th>
                        <th>Country</th>
                        @if(hasModulePermission('partnersites','edit'))
                            <th>Edit</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sites as $site)
                        <?php
                        /** @var $content \App\Content */
                        ?>
                        <tr>
                            <td>{{$site->live_url_root}}</td>
                            <td>{{$site->country()->exists() ? $site->country->name: '-'}}</td>
                            @if(hasModulePermission('partnersites','edit'))
                                <td><a href="{{route('partnersites.edit',$site->id)}}">Edit</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <a class="btn pull-left  btn-default create_site"
               href="{{route('partnersites.create')}}?partner_id={{$partner->id}}&redirect_success={{URL::full()}}">Create
                new</a>

        </div>

        <div class="clearfix"></div>

        <div class="col-md-6  shadow" style="margin: 10px 0 10px; padding: 10px">
            <h4 class="pull-left">Listings</h4>
            <div class="clearfix"></div>
            <?php $listings = $partner->listings()->orderBy('order','ASC')->get();?>
            @if(count($listings))
                <table class="table datatable-min">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th>Category</th>
                        <th>Order</th>
                        <th>Active</th>
                        <th>Featured</th>
                        @if(hasModulePermission('partnerlistings','edit'))
                            <th>Edit</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listings as $listing)
                        <?php
                        /** @var $listing \App\Partnerlisting */
                        ?>
                        <tr>
                            <td>{{$listing->country()->exists() ? $listing->country->name: '-'}}</td>
                            <td>{{$listing->category->name_ext}}</td>
                            <td>{{$listing->order}}</td>
                            <td>@if($listing->is_active) Yes @else No @endif </td>
                            <td>@if($listing->is_featured) Yes @else No @endif </td>
                            @if(hasModulePermission('partnerlistings','edit'))
                                <td><a href="{{route('partnerlistings.edit',$listing->id)}}">Edit</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <a class="btn pull-left  btn-default create_listening"
               href="{{route('partnerlistings.create')}}?partner_id={{$partner->id}}&redirect_success={{URL::full()}}">Create
                new</a>


        </div>
    @endif
@endsection

{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            // $("input[name=name],input[name=live_url_root],select[name=country_id],input[name=category_id],input[name=address1],input[name=contact_name],input[name=contact_email],input[name=contact_phone],select[name=is_featured],input[name=commission],input[name=commission_percentage_lb],input[name=commission_percentage_recommender],input[name=recommendation_expiry_in_days],input[name=recommend_expire],select[name=partnercategory_id]").addClass('validate[required]');
            // $("input[name=contact_email],input[name=finance_contact_email],input[name=it_contact_email]").addClass('validate[email]');
            // $("input[name=live_url_root]").addClass('validate[url]');
            // $("input[name=commission_percentage_lb],input[name=commission_percentage_recommender],input[name=recommendation_expiry_in_days]").addClass('validate[custom[number]]');
        }

        @if(user()->isFirstLineSupport())
        $('.create_site,.create_listening').hide();
        $('#is_active').attr('disabled', true);
        @endif
        $('#live_url_order_confirmation,#stage_website,#site_file_structure').hide();
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $partner(module
            // name singular) is not set, also there is no id is created
            // Following the convention of spyrframe you are only allowed to call functions
            /*******************************************************************/

            // your functions go here
            // function1();
            // function2();

        </script>
    @else
        <script type="text/javascript">
            /*******************************************************************/
            // Updating :
            // this is a place holder to write  the javascript codes that will run
            // while updating an element that has been already created.
            // during update the variable $$element or $partner(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $partner->id
            // Following the convention of spyrframe you are only allowed to call functions
            /*******************************************************************/

            // your functions go here
            // function1();
            // function2();
        </script>
    @endif
    <script type="text/javascript">
        /*******************************************************************/
        // Saving :
        // Saving covers both creating and updating (Similar to Eloquent model event)
        // However, it is not guaranteed $$element is set. So the code here should
        // be functional for both case where an element is being created or already
        // created. This is a good place for writing validation
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions goe here
        // function1();
        // function2();

        /*******************************************************************/
        // frontend and Ajax hybrid validation
        /*******************************************************************/
        addValidationRulesForSaving(); // Assign validation classes/rules
        // enableValidation('{{$module_name}}'); // Instantiate validation function


        //        $(function () {
        //            var is_featured = $("#is_featured option:selected").val();
        //            displayFeaturedDiv(is_featured);
        //            $("#is_featured").change(function () {
        //                var is_featured = $(this).val();
        //                displayFeaturedDiv(is_featured);
        //            });
        //        });
        //
        //        function displayFeaturedDiv(is_featured) {
        //            if (is_featured == "1") {
        //                $(".featured_div").css('display', 'block');
        //            } else {
        //                $(".featured_div").css('display', 'none');
        //            }
        //        }

        /**
         * Enable CSV tags for tags field
         */
        $("textarea[name=tags]").select2({
            tags: [''],
            tokenSeparators: [',']
        });

    </script>
@endsection
{{-- JS ends --}}