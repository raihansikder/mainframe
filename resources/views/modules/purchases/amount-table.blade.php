<b>Commissions and shares</b>
<?php

        /** @var \App\Purchase $purchase */
$commissions = $purchase->commissions();
$user_currency = $purchase->user_currency;
if (user()->isSuperUser()) {
    myprint_r($commissions);
}
?>

<table class="table table-condensed  table-responsive">
    <tbody>
    <tr class="bg-red no-border">
        <td style="width: 20%" class="no-border"><b>Currency</b></td>
        <td style="width: 10%" class="no-border"><b>Product price</b></td>
        <td style="width: 10%" class="no-border"><b>Recommender</b></td>
        <td style="width: 10%" class="no-border"><b>Charity</b></td>
        <td style="width: 10%" class="no-border"><b>Letsbab</b></td>
        <td style="width: 10%" class="no-border"><b>Split Total</b></td>
        <td style="width: 10%" class="no-border"><b>Split User</b></td>
        <td style="width: 10%" class="no-border"><b>Split Charity</b></td>
    </tr>
    <tr>
        <td>Partner - {{$purchase->product_currency}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->product_price_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->user_commission_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->charity_donation_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->lb_commission_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->split_amount_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->split_user_amount_in_partner_currency)}}</td>
        <td>{{symbol($purchase->partner_currency)}}{{money($purchase->split_charity_amount_in_partner_currency)}}</td>
    </tr>
    <tr>
        <td>Recommender - {{$purchase->user_currency}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->product_price_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->user_commission_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->charity_donation_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->lb_commission_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->split_amount_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->split_user_amount_in_user_currency)}}</td>
        <td>{{symbol($purchase->user_currency)}}{{money($purchase->split_charity_amount_in_user_currency)}}</td>
    </tr>
    <tr>
        <td>Charity - {{$purchase->charity_currency}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->product_price_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->user_commission_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->charity_donation_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->lb_commission_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->split_amount_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->split_user_amount_in_charity_currency)}}</td>
        <td>{{symbol($purchase->charity_currency)}}{{money($purchase->split_charity_amount_in_charity_currency)}}</td>
    </tr>
    <tr>
        <td>LetsBab - {{$purchase->lb_currency}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->product_price_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->user_commission_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->charity_donation_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->lb_commission_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->split_amount_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->split_user_amount_in_lb_currency)}}</td>
        <td>{{symbol($purchase->lb_currency)}}{{money($purchase->split_charity_amount_in_lb_currency)}}</td>
    </tr>
    <tr style="border-top: 2px solid grey">
        <td colspan="2"><b>Invoice</b></td>
        <td>
            @if($purchase->recommender_invoice_id)
                <a href="{{route('invoices.show',$purchase->recommender_invoice_id)}}">{{pad($purchase->recommender_invoice_id)}}</a>
                - {{$purchase->recommender_invoice_status}}
            @endif

        </td>
        <td>
            @if($purchase->charity_invoice_id)
                <a href="{{route('invoices.show',$purchase->charity_invoice_id)}}">{{pad($purchase->charity_invoice_id)}}</a>
                - {{$purchase->charity_invoice_status}}
            @endif
        </td>
        <td></td>
        <td></td>
        <td>
            @if($purchase->split_user_invoice_id)
                <a href="{{route('invoices.show',$purchase->split_user_invoice_id)}}">{{pad($purchase->split_user_invoice_id)}}</a>
                - {{$purchase->split_user_invoice_status}}
            @endif
        </td>
        <td>
            @if($purchase->split_charity_invoice_id)
                <a href="{{route('invoices.show',$purchase->split_charity_invoice_id)}}">{{pad($purchase->split_charity_invoice_id)}}</a>
                - {{$purchase->split_charity_invoice_status}}
            @endif
        </td>
    </tr>
    {{--                <tr>--}}
    {{--                    <td colspan="2"><b>Payment transfer</b></td>--}}
    {{--                    <td></td>--}}
    {{--                    <td></td>--}}
    {{--                    <td></td>--}}
    {{--                    <td></td>--}}
    {{--                </tr>--}}
    </tbody>
</table>