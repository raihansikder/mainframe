@extends('projects.my-project.layouts.module.form.template')

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
$tabs = [
    'contact' => 'Contact',
    'finance' => 'Finance',
    'sales' => 'Sales',
];
$selectedTab = request('tab', 'contact');

?>

@section('css')
    @parent
    <style>
        .tabs .selected {
            font-weight: bold
        }
    </style>
@endsection

@section('head-title')
    MPH | {{optional($element)->name}}
@endsection

@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')
@endsection

@section('content-top')
    @parent
    @if(isset($element->id))
        <ul class="list-group tabs">
            @foreach($tabs as $tab=>$title)
                <?php
                /** @var string $selectedClass */
                /** @var string $tab */
                $selectedClass = $tab == $selectedTab ? 'selected' : '';
                ?>

                <li class="list-group-item pull-left {{$selectedClass}}" style="border-bottom:0">
                    <a href="{{route('resellers.edit',$element->id)}}?tab={{$tab}}">{{$title}}</a>
                </li>

            @endforeach
        </ul>
    @endif
@endsection

@include('projects.my-project.modules.resellers.form.tabs.'.$selectedTab)
