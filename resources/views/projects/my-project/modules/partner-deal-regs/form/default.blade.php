@extends('mainframe.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\PartnerDealRegs\PartnerDealReg $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 */
use App\Projects\MphMarket\Modules\QuoteItems\QuoteItem;
?>

@section('css')
    @parent
    <style>
        .draft {
            background: grey;
        }

        .submitted {
            background: orange;
        }

        .pending {
            background: green;
        }

        .sent {
            background: darkorange;
        }

        .accepted {
            background: green;
        }

        .rejected {
            background: red;
        }
    </style>
@endsection
@section('title')
    {{$view->formTitle()}}
    @if($view->show('form-list-btn'))
        <a class="btn btn-xs module-list-btn {{$module->name.'-module-list-btn'}}" href="{{route("$module->name.index")}}" data-toggle="tooltip"
           title="View list of {{lcfirst(Str::plural($module->title))}}"><i class="fa fa-list"></i></a>
    @endif
@endsection
@section('content-top')
    @if($element->quote_id)
        <a class="btn btn-default" href="{{route('quotes.edit',$element->quote_id)}}">
            <i class="fa fa-angle-left"></i> Quote
        </a>
    @endif
@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        {{--{{ dump($element->dealRegs) }}--}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.plain-text',['var'=>['label'=>'Quote','value'=>$element->quote_id,'div'=>'col-md-2']])
        @if($element->client)
            @include('form.plain-text',['var'=>['name'=>'client','label'=>'Client','value'=>$element->client->name]])
        @endif

        <div class="clearfix"></div>
        @include('form.plain-text',['var'=>['label'=>'Created by','value'=>$element->creator->name,'div'=>'col-md-2']])
        @include('form.plain-text',['var'=>['name'=>'created_at','label'=>'Created at','div'=>'col-md-2']])

        <div class="clearfix"></div>

        <div class="col-md-6 no-margin no-padding">
            @foreach($element->dealRegs as $vendorDealReg)
                <h3 class="pull-left">{{$vendorDealReg->vendor->name}}
                    @if($user->isAdmin())
                        <a class="badge bg-blue-gradient" href="{{route('deal-regs.edit',$vendorDealReg->id)}}">
                            #{{$vendorDealReg->id}}
                        </a>
                    @endif
                </h3>

                <span class="pull-right badge {{ snake_case($vendorDealReg->status)}}" style="margin-top: 20px">
                    {{$vendorDealReg->status}}
                </span>
                <table id="" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 100px;">SKU</th>
                        <th>PRODUCT</th>
                        <th style="width: 100px;">QTY</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vendorDealReg->dealRegItems as $dealRegItem)
                        <tr>
                            <td>{{$dealRegItem->product->sku}}</td>
                            <td>{{$dealRegItem->product->name}}</td>
                            <td>
                                <?php
                                /** @var \App\Projects\MphMarket\Modules\DealRegItems\DealRegItem $dealRegItem */
                                $quoteItem = $element->quote->quoteItems()
                                    ->where('product_id', $dealRegItem->product_id)
                                    ->first();
                                ?>
                                {{optional($quoteItem)->quantity}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
        {{--@include('form.is-active')--}}
        {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.partner-deal-regs.form.js')
@endsection