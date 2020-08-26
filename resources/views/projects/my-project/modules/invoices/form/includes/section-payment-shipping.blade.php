<?php
/** @var \App\User $user */
/** @var \App\Projects\MphMarket\Modules\Quotes\Quote $element */
?>
<div class="clearfix"></div>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#payment_shipping_method">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Payment & Shipping
                </a>
            </h5>
        </div>
        <div id="payment_shipping_method" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                {{--@include('form.select-array',['var'=>['name'=>'currency','label'=>'Quote Currency', 'options'=>kv($currencies)]])--}}
                {{--@include('form.select-model',['var'=>['name'=>'payment_scheme_id','label'=>'Payment Term','table'=>'payment_schemes']])--}}
                @include('form.plain-text',['var'=>['name'=>'currency','label'=>'Quote Currency', 'value'=>$element->currency]])

                <?php
                $paymentSchemeName = $element->paymentScheme()->exists() ? $element->paymentScheme->name : '';
                ?>
                @if(!$user->ofClient())
                    @include('form.plain-text',['var'=>['name'=>'payment_scheme_id','label'=>'Payment Term', 'value'=>$paymentSchemeName]])
                @endif
                @include('form.select-model',['var'=>['name'=>'shipping_method_id','label'=>'Shipping Method','table'=>'shipping_methods']])

                @include('form.select-array',['var'=>['name'=>'has_ultimate_finance','label'=>'Ultimate Finance', 'options'=>$ultimateFinanceOptions]])
                {{--@if($element->reseller()->exists())--}}
                {{--@include('form.plain-text',['var'=>['name'=>'vat_percentage','label'=>'Vat Percentage', 'value'=>$element->vat_percentage]])--}}
                {{--@else--}}
                {{--@include('form.select-array',['var'=>['name'=>'vat_percentage','label'=>'Vat Percentage', 'options'=>$vatPercentageTypes]])--}}
                {{--@endif--}}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>