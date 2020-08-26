@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Projects\MphMarket\Modules\Users\User $element
 * @var string $formState create|edit
 * @var string $formState
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var \App\Mainframe\Modules\Modules\Module $module
 */
?>

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        {{--email--}}
        @include('form.text',['var'=>['name'=>'email','label'=>'Email(Username)','div'=>'col-md-4']])
        {{--first_name--}}
        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name']])
        {{--last_name--}}
        @include('form.text',['var'=>['name'=>'last_name','label'=>'Surname']])

        <div class="clearfix"></div>

        <?php
        // myprint_r($element->group_ids);
        $var = [
            'name' => 'group_ids',
            'label' => 'Group',
            'value' => (isset($element)) ? $element->group_ids : [],
            'query' => new \App\Group,
            'name_field' => 'title',
            'params' => ['multiple', 'id' => 'groups'],
            'container_class' => 'col-sm-3'
        ];
        //19 and 20 for vendor user and vendor admin
        if (user()->ofVendor()) {
            $var ['query'] = DB::table('groups')->whereIn('id', [19, 20]);
        }
            //21 and 22 for reseller user, reseller admin and client
        if (user()->ofReseller()) {
            $var ['query'] = DB::table('groups')->whereIn('id', [21, 22, 23]);
        }
            // 19,20,21,22,23,25
            if (user()->isAdminL2()) {
                $var ['query'] = DB::table('groups')->whereIn('id', [19, 20, 21, 22, 23, 25]);
            }
            // 19,20,21,22 28,29
            if (user()->isSalesAdmin()) {
                $var ['query'] = DB::table('groups')->whereIn('id', [19,20,21, 22,23, 28, 29]);
            }
            // 21,22,29
            if (user()->isSalesMember()) {
                $var ['query'] = DB::table('groups')->whereIn('id', [21, 22, 29]);
            }
        ?>
        @include('form.select-model-multiple', compact('var'))
        <?php
        $var_vendor = [
            'name' => 'vendor_id',
            'label' => 'Vendor/Manufacturer',
            'table' => 'vendors',
            'show_inactive' => true
        ];
        if (user()->ofVendor()) {
            $var_vendor['query'] = DB::table('vendors')->where('id', user()->vendor_id);
        }
        ?>
        @if(user()->ofVendor())
            @include('form.plain-text',['var'=>['label'=>'Vendor/Manufacturer','value'=>user()->vendor->name]])
            @include('form.hidden',['var'=>['name'=>'vendor_id','value'=>user()->vendor_id]])
        @else
            <div class="opt_19">
                @include('form.select-model',['var'=>$var_vendor])
            </div>
        @endif
        <?php
        $var_reseller = [
            'name' => 'reseller_id',
            'label' => 'Partner',
            'table' => 'resellers',
            'show_inactive' => true,

        ];
        if (user()->ofReseller()) {
            $var_reseller['query'] = DB::table('resellers')->where('id', user()->reseller_id);

        }?>

        <div class="opt_21">
            @include('form.select-model',['var'=>$var_reseller])
        </div>

        <?php
        $var_client = [
            'name' => 'client_id',
            'label' => 'Client',
            'table' => 'clients',
            'show_inactive' => true,

        ];
        if (user()->ofReseller()) {
            $var_client['query'] = DB::table('clients')->where('reseller_id', user()->reseller_id);

        }?>
        <div class="opt_23">
            @include('form.select-model',['var'=>$var_client])
        </div>
        {{-- show password only for editable--}}
        @if($editable)
            <div class="clearfix"></div>
            <h3>Password</h3>
            @include('form.text',['var'=>['name'=>'password','type'=>'password','label'=>'New password','value'=>'']])
            @include('form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm new password']])
        @endif
        <div class="clearfix"></div>
        {{--reseller and vendor user should not see email verified at--}}
            @if(!user()->inGroupIds(['19','20','22','23']))
            @include('form.datetime',['var'=>['name'=>'email_verified_at','label'=>'Email verified at']])
        @endif
        <div class="clearfix"></div>
        @include('projects.my-project.modules.users.form.includes.contact-fields')

        <div class="clearfix"></div>
        {{--token--}}
        @if(user()->can('updateToken', $element) && (!user()->ofReseller() && !user()->ofVendor()))
            @include('projects.my-project.modules.users.form.includes.token-fields')
        @endif
        @if(user()->isAdmin())
            @include('form.is-active')
        @endif
        {{--    Form inputs: ends    --}}
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h4>Upload profile pic</h4>
        <small>Upload one or more files</small>
        @include('form.uploads',['var'=>['type'=>'profile-pic','limit'=>1]])
    </div>
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.users.form.js')
@endsection