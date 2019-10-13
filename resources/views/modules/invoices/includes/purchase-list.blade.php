<?php
/** @var \App\Invoice $invoice */
$purchases = \App\Purchase::whereIn('id', explode(',', $invoice->purchase_ids))->get();
?>

<h4>Purchases</h4>
This invoice includes following purchases
<table class="table table-condensed">
    @foreach($purchases as $purchase)
        <?php
        /** @var \App\Purchase $purchase */
        ?>
        <tr>
            <td><a href="{{route('purchases.show',$purchase->id)}}"> {{pad($purchase->id)}}</a></td>
            <td>{{$purchase->purchased_at}}</td>
            <td>{{$purchase->partner_name}}</td>
            {{--                            <td>{{$purchase->product_name}}</td>--}}
            <td>{{$purchase->product_currency}}</td>
            <td style="text-align: right">{{money($purchase->product_price_in_product_currency)}}</td>
        </tr>
    @endforeach
</table>