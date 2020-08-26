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

?>
@section('content')
    <div class="col-md-12 no-padding" style="margin-top: 20px;">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.text',['var'=>['name'=>'target_technology','label'=>'Target Technology','div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'target_customer','label'=>'Target Customer Market','div'=>'col-md-3']])
        {{-- partner_account_manager_id--}}
        <div class="col-md-3 no-padding no-margin">
            <?php
            $var = [
                'name' => 'partner_account_manager_id',
                'label' => 'Client Account Manager',
                'table' => 'users',
                'div' => 'col-md-12',
            ];
            //             if ($user->ofReseller()) {
            //                 $var['query'] = DB::table('users')->where('reseller_id', $user->reseller_id);
            //             } else {
            //                 $var['query'] = DB::table('users')->where('group_ids', '["21"]')->orWhere('group_ids', '["22"]');
            //             }
            $var['query'] = DB::table('users')->where('reseller_id', $element->id);
            ?>
            @include('form.select-model',['var'=>$var])
            @if($user->isAdmin() && $element->updaterOfField('partner_account_manager_id'))
                <small>Updated by: {{optional($element->updaterOfField('partner_account_manager_id'))->email}} </small>
            @endif
        </div>
        <div class="clearfix"></div>
        <div id="note">@include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])</div>
        @include('form.action-buttons')


        {{ Form::close() }}
    </div>
@endsection
@section('content-bottom')
    @parent

    @if($user->isAdmin() || user()->isSalesMember() || user()->isSalesAdmin())
        <div class="col-md-12 no-padding-l">
            @include('projects.my-project.modules.resellers.form.includes.clients')
        </div>
        <div class="col-md-12 no-padding-l">
            @include('projects.my-project.modules.resellers.form.includes.top-products')
        </div>
    @endif
@endsection