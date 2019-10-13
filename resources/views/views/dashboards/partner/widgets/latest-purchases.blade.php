<?php

/** @noinspection ALL */
/** @var \App\Purchase $purchases */
/** @var \App\Partner $partner */
$get_purchases = \App\Purchase::remember(cacheTime('short'))
    ->where('partner_id', $partner->id)
    ->where('is_test', 0);
$title = "Recent purchases";
if (Request::get('date_range_from') != "" && Request::get('date_range_to') != "") {
    $start_date = date('Y-m-d 00:00:00', strtotime(Request::get('date_range_from')));
    $end_date   = date('Y-m-d 23:59:59', strtotime(Request::get('date_range_to')));
    if ((Request::get('date_range_from') != date('Y-m-d')) || (Request::get('date_range_to') != date('Y-m-d'))) {
        $title = "Purchases from ".Request::get('date_range_from')." to ".Request::get('date_range_to');
    }
    $get_purchases->whereBetween('created_at', [$start_date, $end_date]);
}
$purchases = $get_purchases->orderBy('created_at', 'desc')
    ->offset(0)
    ->limit(20)
    ->get();
?>


<b class="pull-left">{{ $title }}</b>
{{--<a href="{{route('purchases.index')}}" class="pull-right">View all</a>--}}

<div class='clearfix'></div>
<div class="">
    <table id="tbl_purchases_not_invoiced" class="datatable-min table module-grid table table-bordered table-striped"
           width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th style="width: 130px">Time</th>
            <th>Product</th>
            <th style="width: 90px"><span class="pull-right">Price</span></th>
            <!--th>Approved</th-->
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <?php
            /** @var \App\Purchase $purchase */
            ?>
            <tr>
                <td>
                    {{--<a href="{{route('purchases.show',$purchase->id)}}" target="_blank">{{ pad($purchase->id) }}</a>--}}
                    {{ pad($purchase->id) }}
                </td>
                <td>{{ !is_null($purchase->purchased_at) ? $purchase->purchased_at->format('Y-M-d') : $purchase->created_at->format('Y-M-d') }}
                    <code class="pull-right bg-gray">{{ !is_null($purchase->purchased_at) ? $purchase->purchased_at->format('H:i:s') : $purchase->created_at->format('H:i:s') }}</code>
                </td>
                <td>
                    @if(strlen($purchase->product_name))
                        {!! $purchase->product_name !!}
                    @elseif(strlen($purchase->product_title))
                        {!! $purchase->product_title !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class="pull-right"><b>
                        {{symbol($purchase->partner_currency)}}{{number_format($purchase->product_price_in_partner_currency, 2)}}
                        </b>
                    </span>
                </td>
                {{--            <td>{{ $purchase->is_approved ? 'Yes':'No' }}</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
