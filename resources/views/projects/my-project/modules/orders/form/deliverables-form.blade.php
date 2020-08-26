@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var bool $mutableFields
 */

use App\Projects\MphMarket\Modules\Resellers\Reseller;


$statuses = kv(['Draft']);

if (isset($element->status)) {
    $transitions = $element->processor()->getTransitions();
    $statuses = kv($element->allowedTransitionsOf('status')); // Todo:
}

$vatPercentageTypes = Reseller::$vatPercentageTypes;
$currencies = ['GBP', 'USD', 'EUR'];

if ($element->isUpdating()) {
// Make the terms field readonly when user is not admin
    if (! $user->isAdmin() && $element->terms) {
        $immutables[] = 'terms';
    }

}
?>

@section('title')
    Order #{{$element->id}} Deliverables and Warranty Registration
@endsection

@section('content-top')
    <a class="btn btn-default" href="{{route('orders.edit',$element->id)}}">
        <i class="fa fa-angle-left"></i> Back to Order #{{$element->id}}
    </a>
@endsection

@section('content')
    <div class="no-padding">
        {{ Form::model($element, [ 'route' => ['orders.post.deliverables', $element->id], 'method'=>'post'])}}

        @include('projects.my-project.modules.orders.form.includes.section-deliverables')

        {{--@include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('js')
    @parent
@endsection
