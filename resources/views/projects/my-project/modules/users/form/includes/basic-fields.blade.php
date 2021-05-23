{{--name_initial--}}
@include('form.text',['var'=>['name'=>'name_initial','label'=>'Name initial']])
{{--first_name--}}
@include('form.text',['var'=>['name'=>'first_name','label'=>'First Name']])
{{--last_name--}}
@include('form.text',['var'=>['name'=>'last_name','label'=>'Surname']])
{{--email--}}
@include('form.text',['var'=>['name'=>'email','label'=>'Email(Username)']])

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
?>
@include('form.select-model-multiple', compact('var'))
@include('form.datetime',['var'=>['name'=>'email_verified_at','label'=>'Email verified at']])

{{-- show password only for editable--}}
@if($editable)
    <div class="clearfix"></div>
    <h3>Password</h3>
    @include('form.text',['var'=>['name'=>'password','type'=>'password','label'=>'New password','value'=>'']])
    @include('form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm new password']])
@endif