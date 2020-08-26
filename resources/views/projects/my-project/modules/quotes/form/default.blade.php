@extends('projects.my-project.layouts.module.form.template')
<?php
use App\Projects\MphMarket\Modules\Quotes\Quote;
use App\Projects\MphMarket\Modules\Resellers\Reseller;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
$statuses = $element->isCreating() ? ['Pending'] : kv(Quote::$statuses);

if ($element->isUpdating() && $user->ofReseller() && $element->status != "Processing") {
    unset($statuses['Processing']);
}

$types = kv(Quote::$types);
if ($user->ofClient()) {
    $types = kv(['Client']);
}
if ($user->ofReseller()) {
    $types = kv(['Partner']);
}

$vatPercentageTypes = Reseller::$vatPercentageTypes;
$currencies = ['GBP', 'USD', 'EUR'];

if ($element->isUpdating()) {
    // Make the terms field readonly when user is not admin
    if (! $user->isAdmin() && $element->terms) {
        $immutables[] = 'terms';
    }
    //Make status field readonly when user is reseller and Quote has order or status Processing
    if ($user->ofReseller() && ($element->hasOrder() || $element->status == "Processing")) {
        $immutables[] = 'status';
    }
}

?>
@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')
@endsection

@section('content-top')
    {{--  Link to Parent Quote  --}}
    @if($element->parent)
        <a class="btn btn-default" href="{{route('quotes.edit',$element->parent_id)}}">
            <i class="fa fa-angle-left"></i> Parent Quote #{{pad($element->parent_id)}}
        </a>
    @endif

    {{-- Link to child quotes --}}
    @if($element->children()->exists())
        Child Quotes  &nbsp;&nbsp;
        @foreach($element->children as $childQuote)
            <a class="btn btn-default" href="{{route('quotes.edit',$childQuote->id)}}">
                {{$childQuote->id}}&nbsp;&nbsp;<i class="fa fa-angle-right"></i>
            </a>
        @endforeach
    @endif

    {{--Show Order--}}
    @if($element->hasOrder())
        <a class="btn btn-default" href="{{route('orders.edit',$element->order->id)}}">Order : {{$element->order->id}}</a>
    @endif

    @if($element->isUpdating())
        @include('projects.my-project.modules.quotes.form.includes.top-buttons')
    @endif
    <div class="clearfix margin"></div>
@endsection

@section('content')
    <div class="no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}
        @if($element->isUpdating())
            @include('form.plain-text',['var'=>['name'=>'id','label'=>'Quote #']])
            @include('form.plain-text',['var'=>['name'=>'name','label'=>'Quote Title','div'=>'col-md-6']])
            <div class="clearfix"></div>
            @include('form.plain-text',['var'=>['name'=>'code','label'=>'Quote Number/Code']])
            @include('form.plain-text',['var'=>['name'=>'mph_id','label'=>'MPH ID']])
            @include('form.text',['var'=>['name'=>'po_reference','label'=>'PO Reference']])
        @endif
        <div class="clearfix"></div>
        {{-- type --}}
        @include('form.select-array',['var'=>['name'=>'type','label'=>'Type', 'options'=>$types]])

        {{-- reseller_id --}}
        <?php
        $resellerId = null;
        if ($user->ofReseller()) $resellerId = $user->reseller_id;
        if ($user->ofClient()) $resellerId = $user->client->reseller_id;
        ?>
        @if($resellerId)
            {{-- Todo : Security issue. auto fill in in the code--}}
            @include('form.hidden',['var'=>['name'=>'reseller_id','value'=>$resellerId]])
        @else
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner','table'=>'resellers']])
        @endif

        {{-- client_id--}}
        <?php
        $label = null;
        if (! $user->ofClient()) {
            $addClientLink = route('clients.create').'?redirect_success='.URL::full();
            $label = " &nbsp;&nbsp; + <a class='pull-right' href='$addClientLink'>Add New</a>";
        }
        $var = ['name' => 'client_id', 'label' => 'Client'.$label, 'table' => 'clients'];
        if ($user->ofReseller()) {
            $var['query'] = DB::table('clients')->where('reseller_id', user()->reseller_id);
        }
        ?>
        {{-- client_id --}}
        @if($user->ofClient())
            @include('form.hidden',['var'=>['name'=>'client_id','value'=>$user->client_id]])
        @else
            @include('form.select-model',['var'=>$var])
        @endif

        @if($element->isUpdating())
            @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        @endif

        @if($element->sent_at)
            @include('form.plain-text',['var'=>['name'=>'sent_at','label'=>'Sent at','value'=>$element->sent_at]])
        @endif
        <div class="clearfix"></div>

        @if($element->isUpdating())
            <div class="clearfix"></div>
            {{-- Address --}}
            @include('projects.my-project.modules.quotes.form.includes.section-address')
            {{-- Payment and Shipping method--}}
            @include('projects.my-project.modules.quotes.form.includes.section-payment-shipping')
            {{-- Terms and note --}}
            @include('projects.my-project.modules.quotes.form.includes.section-terms')
            {{--created_at and updated_at for admin--}}
            @if(user()->isAdmin())
                @include('form.datetime',['var'=>['name'=>'quoted_at','label'=>'Quoted At']])
                @include('form.datetime',['var'=>['name'=>'accepted_at','label'=>'Accepted At','editable'=>false]])
                @include('form.datetime',['var'=>['name'=>'processing_started_at','label'=>'Processed At','editable'=>false]])
                    <div class="clearfix"></div>
                    @include('form.checkbox',['var'=>['name'=>'is_archived','label'=>'Archived']])
            @endif
            <div class="clearfix"></div>
        @endif
        {{--@include('form.is-active')--}}



            {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent


    {{-- Quote Items --}}

    @if($element->isUpdating())

        {{-- View item table--}}
        <?php
        $itemTableView = 'projects.my-project.modules.quotes.form.includes.section-items-table';
        if ($user->ofClient()) $itemTableView .= '-client';
        if ($user->ofReseller()) $itemTableView .= '-partner';
        if ($user->isAdmin() || $user->isSalesAdmin() || $user->isSalesMember()) $itemTableView .= '-admin';
        ?>
        @include($itemTableView)

        {{-- Add product form--}}
        @if($element->itemListEditable())
            <div class="col-md-12">
                <form id="formAddQuoteItem" method="post" action="{{route('quote-items.store')}}">
                    @csrf
                    <label>Add a product from the list <a target="_blank" href="{{route('products.index')}}"> - See
                            List</a></label>
                    <div class="clearfix"></div>

                    @include('form.custom.product-select')

                    <div class="col-md-2">
                        <input name="quantity" class="form-control validate[required,number]" placeholder="Quantity"
                               value="1"/>
                    </div>
                    <input type="hidden" name="quote_id" value="{{$element->id}}"/>
                    <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
                    <input type="hidden" name="redirect_full" value="{{URL::full()}}"/>
                    <div class="clearfix"></div>
                    <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add To Quote</button>
                </form>
            </div>
        @endif
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.quotes.form.js')
@endsection
