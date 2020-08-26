@extends('projects.my-project.layouts.module.form.template')

<?php
use App\Projects\MphMarket\Modules\Contacts\Contact;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Contacts\Contact $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
$element->country_id = $element->country_id ?: 187;
$designations = array_merge(['' => 'Select'], kv(Contact::$designations));
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}
        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name']])
        @include('form.text',['var'=>['name'=>'last_name','label'=>'Surname']])
        @include('form.plain-text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email']])
        @include('form.select-array',['var'=>['name'=>'designation','label'=>'Designation', 'options'=>$designations]])
        @include('form.text',['var'=>['name'=>'other_designation','label'=>'Other Designation', 'div'=>'col-sm-3 other_designation']])


        @include('form.hidden',['var'=>['name'=>'module_id','label'=>'module_id']])
        @include('form.hidden',['var'=>['name'=>'element_id','label'=>'element_id']])
        <div class="clearfix"></div>
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
        <div class="clearfix"></div>
        {{--note--}}
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note', 'div'=>'col-sm-6']])



        @include('form.is-active')

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
    @include('projects.my-project.modules.contacts.form.js')
@endsection