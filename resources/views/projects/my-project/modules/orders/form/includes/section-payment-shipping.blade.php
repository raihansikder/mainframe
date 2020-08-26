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
                    &nbsp;Payment & Shipping
                </a>
            </h5>
        </div>
        <div id="payment_shipping_method" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                {{-- Admin should be able to change currency--}}
                @if($user->isAdmin() || $user->isSalesMember() || $user->isSalesAdmin())
                    @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>array_merge([null=>'-'],kv($currencies))]])
                @else
                    @include('form.plain-text',['var'=>['name'=>'currency','label'=>'Quote Currency', 'value'=>$element->currency]])
                @endif

                <div id="payment_scheme">
                    {{--Allow admin to udpate payment term --}}
                    @if($user->isAdmin() || $user->isSalesMember() || $user->isSalesAdmin())
                        @include('form.select-model',['var'=>['name'=>'payment_scheme_id','label'=>'Payment Term','table'=>'payment_schemes']])
                    @elseif($element->reseller()->exists() && $element->paymentScheme)
                        @include('form.plain-text',['var'=>['name'=>'payment_scheme_id','label'=>'Payment Term', 'value'=>$element->paymentScheme->name]])
                    @endif
                </div>

                @include('form.select-array',['var'=>['name'=>'has_ultimate_finance','label'=>'Ultimate Finance', 'options'=>$ultimateFinanceOptions]])
                @include('form.select-array',['var'=>['name'=>'vat_percentage','label'=>'Vat Percentage', 'options'=>$vatPercentageTypes]])

                <div class="clearfix"></div>
                {{-- Shipping cost--}}
                @include('form.text',['var'=>['name'=>'total_weight','label'=>'Total Weight(KG)','value'=>$element->totalWeight(), 'div'=>'col-md-2', 'editable'=>false]])
                @include('projects.my-project.modules.quotes.form.includes.rate-selector')

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>