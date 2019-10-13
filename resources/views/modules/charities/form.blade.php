<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'charities'
 * @var $mod                   \App\Module
 * @var $superhero             \App\charity Object that is being edited
 * @var $element               string 'charity'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>
@section('content-top')
    @parent
    @if(isset($charity))
        @if(user()->isSuperUser())
            <div class="btn-group" style="padding-bottom: 15px">
                <a class="btn btn-default" href="{{route('get.charities-invoices',$charity->id)}}">Invoices</a>
                <a class="btn btn-default" href="{{route('admin.charity-dashboard',$charity->id)}}" target="_blank">Dashboard</a>
                {{--<a class="btn btn-default" href="">Invoices</a>--}}
            </div>
        @endif
    @endif
@endsection

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
<div class="col-md-12 no-padding">
    <div class="col-md-6 no-padding">
        @include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])
        @include('form.input-text',['var'=>['name'=>'account_name','label'=>'Account Name(Legal name)', 'container_class'=>'col-sm-6']])
        @include('form.input-text',['var'=>['name'=>'code','label'=>'Code', 'container_class'=>'col-sm-6']])
        @include('form.input-text',['var'=>['name'=>'website','label'=>'Website', 'container_class'=>'col-sm-6']])
        @include('form.input-text',['var'=>['name'=>'registration_no','label'=>'UK registered charity number', 'container_class'=>'col-sm-6']])
        @include('form.input-text',['var'=>['name'=>'ein_no','label'=>'US EIN number for IRS', 'container_class'=>'col-sm-6']])
        @if(user()->isSuperUser())
            @include('form.input-text',['var'=>['name'=>'order','label'=>'Order', 'container_class'=>'col-sm-6']])
        @endif
    </div>
    <div class="col-md-6 no-padding">
        @include('form.textarea',['var'=>['name'=>'description','label'=>'Description', 'container_class'=>'col-sm-12']])
    </div>

</div>

<div class="clearfix"></div>

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
                <b>Invoice settings</b>
                @include('form.input-text',['var'=>['name'=>'invoice_prefix','label'=>'Invoice Prefix', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'invoice_count_start','label'=>'Starting number', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'invoice_due_after','label'=>'Due after days', 'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'xero_contact_id','label'=>'Xero Contact Id','container_class'=>'col-md-12']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#contact">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Address and contact
                </a>
            </h5>
        </div>
        <div id="contact" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                <div class="col-md-12 no-padding">
                    <h5>Address</h5>
                    @include('form.input-text',['var'=>['name'=>'address1','label'=>'Address1', 'container_class'=>'col-sm-6']])
                    @include('form.input-text',['var'=>['name'=>'address2','label'=>'Address2', 'container_class'=>'col-sm-6']])
                    @include('form.input-text',['var'=>['name'=>'city','label'=>'City', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'county','label'=>'County', 'container_class'=>'col-sm-3']])
                    @include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'zip_code','label'=>'Zip Code', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'phone','label'=>'Phone', 'container_class'=>'col-sm-3']])
                    @include('form.input-text',['var'=>['name'=>'mobile','label'=>'Mobile', 'container_class'=>'col-sm-3']])
                </div>
                <div class="clearfix"></div>
                {{--Contact--}}

                <h5>Contact</h5>
                @include('form.input-text',['var'=>['name'=>'contact_name','label'=>'Name', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'contact_email','label'=>'Email', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'contact_phone','label'=>'Phone', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'contact_address','label'=>'Address', 'container_class'=>'col-sm-3']])

                {{-- Finance --}}
                {{--<div class="col-md-6">--}}
                {{--<h5>Finance</h5>--}}
                {{--@include('form.input-text',['var'=>['name'=>'finance_contact_name','label'=>'Name', 'container_class'=>'col-sm-12']])--}}
                {{--@include('form.input-text',['var'=>['name'=>'finance_contact_email','label'=>'Email', 'container_class'=>'col-sm-12']])--}}
                {{--@include('form.input-text',['var'=>['name'=>'finance_contact_phone','label'=>'Phone','container_class'=>'col-sm-12']])--}}
                {{--@include('form.input-text',['var'=>['name'=>'finance_contact_address','label'=>'Address','container_class'=>'col-sm-12']])--}}
                {{--</div>--}}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
{{-- Bank Account Details --}}
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
                @include('form.select-array',['var'=>['name'=>'transfer_method','label'=>'Transfer method', 'options'=>kv(array_merge([""=>'-'],\App\Invoice::$transfer_methods)), 'container_class'=>'col-sm-3']])

                @include('form.input-text',['var'=>['name'=>'bank_name','label'=>'Bank Name', 'container_class'=>'col-sm-3']])
                @include('form.input-text',['var'=>['name'=>'bank_account_address','label'=>'Bank Account Address', 'container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                @include('form.input-text',['var'=>['name'=>'account_holder_name','label'=>'Account holder name', 'container_class'=>'col-sm-3']])
                {{--account_number--}}
                @include('form.input-text',['var'=>['name'=>'account_number','label'=>'Bank account no.', 'container_class'=>'col-sm-3']])
                {{--account_type--}}
                @include('form.input-text',['var'=>['name'=>'account_type','label'=>'Account type', 'container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                {{--account_country--}}
                @include('form.select-model',['var'=>['name'=>'account_country','label'=>'Country','table'=>'countries', 'name_field'=>'name', 'value_field'=>'iso2','container_class'=>'col-sm-3','editable'=>false]])
                {{--currency--}}
                {{--                @include('form.input-text',['var'=>['name'=>'currency','label'=>'currency', 'container_class'=>'col-sm-3','editable'=>false]])--}}
                @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv(\App\Invoice::$currencies)]])

                @include('form.input-text',['var'=>['name'=>'paypal_email','label'=>'Paypal email', 'container_class'=>'col-sm-3']])
                <div class="clearfix"></div>
                {{--account_city--}}
                @include('form.input-text',['var'=>['name'=>'account_city','label'=>'City', 'container_class'=>'col-sm-3']])
                {{--account_state--}}
                @include('form.input-text',['var'=>['name'=>'account_state','label'=>'State', 'container_class'=>'col-sm-3']])
                {{--account_post_code--}}
                @include('form.input-text',['var'=>['name'=>'account_post_code','label'=>'Post code', 'container_class'=>'col-sm-3']])
                {{--account_first_line--}}
                @include('form.input-text',['var'=>['name'=>'account_first_line','label'=>'Account first line', 'container_class'=>'col-sm-3']])
                {{--sort_code--}}
                @include('form.input-text',['var'=>['name'=>'sort_code','label'=>'Sort code', 'container_class'=>'col-sm-3']])
                {{--abartn--}}
                @include('form.input-text',['var'=>['name'=>'abartn','label'=>'ABARTN', 'container_class'=>'col-sm-3']])
                {{--iban--}}
                @include('form.input-text',['var'=>['name'=>'iban','label'=>'IBAN', 'container_class'=>'col-sm-3']])
                {{--swift--}}
                @include('form.input-text',['var'=>['name'=>'swift','label'=>'SWIFT', 'container_class'=>'col-sm-3']])

                {{--transferwise_account_id--}}
                {{--@include('form.input-text',['var'=>['name'=>'transferwise_account_id','label'=>'Transferwise Id', 'container_class'=>'col-sm-3','editable'=>false]])--}}

                @if(user()->isSuperUser())
                    <?php
                    // Symfony\Component\VarDumper\VarDumper::dump(json_decode($charity->transferwise_account));
                    ?>
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
                $included_country_ids_vars = [
                    'name' => 'included_country_ids',
                    'label' => 'Included countries',
                    'value' => (isset($charity)) ? explode(',', trim($charity->included_country_ids, ", ")) : [],
                    'query' => new \App\Country,
                    'params' => ['multiple', 'id' => 'included_country_ids'],
                    'container_class' => 'col-md-12',
                ];
                ?>
                @include('form.select-model', ['var'=>$included_country_ids_vars])
            </div>
            <div class="col-md-6">

                <?php
                $excluded_country_ids_vars = [
                    'name' => 'excluded_country_ids',
                    'label' => '- OR - Excluded countries',
                    'value' => (isset($charity)) ? explode(',', trim($charity->excluded_country_ids, ", ")) : [],
                    'query' => new \App\Country,
                    'params' => ['multiple', 'id' => 'excluded_country_ids'],
                    'container_class' => 'col-md-12'
                ];
                ?>
                @include('form.select-model', ['var'=>$excluded_country_ids_vars])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div>
    <?php
    $vars = [
        'name' => 'is_published',
        'label' => 'Published?',
        'options' => ['0' => 'No', '1' => 'Yes'],
        'container_class' => 'col-sm-3',
        'editable' => (user()->isFirstLineSupport()) ? false : true,
    ];
    ?>
    @include('form.select-array', ['var'=>$vars])
    @include('form.select-array',['var'=>['name'=>'alert_enabled','label'=>'Alert enabled?', 'options'=>['0'=>'No','1'=>'Yes'],'editable' =>user()->isSuperUser()]])
</div>
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
@include('form.is_active')

<div class='clearfix'></div>
@include('form.textarea',['var'=>['name'=>'comment','label'=>'Comment (This shows in charity dashboard)']])
@include('form.select-array',['var'=>['name'=>'comment_is_published','label'=>'Publish comment?', 'options'=>['0'=>'No','1'=>'Yes']]])
<div class='clearfix'></div>

<div class="clearfix"></div>
@section('content-bottom')
    @parent
    <h5>Uploads</h5>
    <div class="col-md-6 no-padding-l">
        <b>Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Logo','name'=>'logo']])
    </div>
    <div class="col-md-6 no-padding-l">
        <b>Block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Block-logo','name'=>'block_logo']])
    </div>

    @if(isset($charity))
        <div class="col-md-6 no-padding-l">
            <h5 class="pull-left">Contents</h5>
            <div class="clearfix"></div>
            <table class="table">
                <thead>
                <tr>
                    <th>Content</th>
                    <th>Type</th>
                    <th>Country</th>
                    <th>Edit</th>
                </tr>
                </thead>
                @foreach($charity->contents as $content)
                    <?php
                    /** @var $content \App\Content */
                    ?>
                    <tbody>
                    <tr>
                        <td>{{$content->body}}</td>
                        <td>{{$content->type}}</td>
                        <td>{{$content->country()->exists() ? $content->country->name: '-'}}</td>
                        <td><a href="{{route('contents.edit',$content->id)}}">Edit</a></td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <a class="btn pull-left  btn-default"
               href="{{route('contents.create')}}?module_id={{$mod->id}}&element_id={{$charity->id}}&redirect_success={{URL::full()}}">Create
                new</a>

        </div>
    @endif
@endsection
{{-- Form ends --}}

{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            $("input[name=name],input[name=code],input[name=website],input[name=contact_name],input[name=contact_email],input[name=contact_phone],textarea[name=description]").addClass('validate[required]');
            $("input[name=contact_email],input[name=finance_contact_email]").addClass('validate[email]');
            $("input[name=website]").addClass('validate[url]');
        }

        @if(user()->isFirstLineSupport())
        $('#is_active').attr('disabled', true);
        @endif
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $superhero(module
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
            // during update the variable $$element or $superhero(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $superhero->id
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
        {{--enableValidation('{{$module_name}}'); // Instantiate validation function--}}
    </script>
@endsection
{{-- JS ends --}}