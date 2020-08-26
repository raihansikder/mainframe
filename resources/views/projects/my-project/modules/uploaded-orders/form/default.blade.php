@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\UploadedOrders\UploadedOrder $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
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

        @include('form.text',['var'=>['name'=>'name','label'=>'Name','div'=>'col-md-6']])
        <div class="clearfix"></div>
        {{-- reseller_id --}}
        @if($user->ofReseller())
            @include('form.hidden',['var'=>['name'=>'reseller_id','value'=>$user->reseller_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Reseller/Partner','table'=>'resellers']])
        @endif
        {{-- client_id--}}
        <?php
        $var = [
            'name' => 'client_id',
            'label' => 'Client',
            'table' => 'clients'
        ];
        if ($user->ofReseller()) {
            $var['query'] = DB::table('clients')->where('reseller_id', user()->reseller_id);
        }
        ?>
        @include('form.select-model',['var'=>$var])

        {{--@include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if(user()->isAdmin() || user()->ofReseller() || user()->isOperationManager() || user()->isMphAccount())
        <div class="col-md-6 no-padding-l">
            <h5>File upload</h5>
            <small>Upload one or more files</small>
            @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99,'type'=>'uploaded-order']])
        </div>
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.uploaded-orders.form.js')
@endsection