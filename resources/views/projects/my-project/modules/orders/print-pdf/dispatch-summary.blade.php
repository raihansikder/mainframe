@extends('projects.my-project.layouts.pdf-print.order')
<?php
use \App\Projects\MphMarket\Helpers\Money;
use App\Projects\MphMarket\Modules\ItemDeliveries\ItemDelivery;
/** @var \App\Projects\MphMarket\Modules\Orders\Order $order */
$deliveryDate = null;
if (isset($order->delivery_date))
    $deliveryDate = new DateTime($order->delivery_date);

$content = route('orders.deliverables', $order->id);

?>
@section('head')
    <style>
        .info {
            font-size: .85rem
        }

        .info td {
            padding: 0;
            margin: 0;
        }

        .notes td {
            padding: 0;
        }

        .footer td {
            padding: 0;
        }

        small {
            font-size: 70%;
            font-weight: 400
        }
    </style>
@endsection
@section('header')
    <h2 style="padding-right: 10px">DELIVERY NOTE</h2>
@endsection
@section('top')
    <table class="table no-border no-margin info">
        <tr>
            <td width="50%" style="padding: 0 0 0 0;border-right: 6px solid white">
                <h6 class="upfront-h6" style="text-align: left;padding-left: 4px;">CUSTOMER INFORMATION</h6>
                <table>
                    <tr>
                        <td style="padding-left: 0">FULL NAME:</td>
                        <td>{{$order->billing_first_name}}{{" "}}{{$order->billing_last_name}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">ADDRESS:</td>
                        <td style="border: 0;">{{$order->generateBillingAddress()}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">POST CODE:</td>
                        <td style="border: 0">{{$order->billing_zip_code}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">TELEPHONE:</td>
                        <td style="border: 0">{{$order->billing_phone}}</td>
                    </tr>
                </table>
            </td>
            <td width="50%" style="padding: 0 0 0 0;border-right: 6px solid white">
                <h6 class="upfront-h6" style="text-align: left;padding-left: 4px;">SHIPPING INFORMATION</h6>
                <table>
                    <tr>
                        <td style="padding-left: 0">FULL NAME:</td>
                        <td>{{$order->shipping_first_name}}{{" "}}{{$order->shipping_last_name}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">ADDRESS:</td>
                        <td style="border: 0;">{{$order->generateShippingAddress()}}</td>

                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">POST CODE:</td>
                        <td style="border: 0">{{$order->shipping_zip_code}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">TELEPHONE:</td>
                        <td style="border: 0">{{$order->shipping_phone}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
@section('content-top')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="25%"><h6>ORDER DATE</h6></td>
            <td width="15%"><h6>PO Reference No#</h6></td>
            <td width="15%"><h6>MPH ID</h6></td>
            <td><h6>DELIVERY NOTE#</h6></td>
            <td><h6>CUSTOMER ID</h6></td>
            <td><h6>DISPATCH DATE</h6></td>
            <td><h6>DELIVERY METHOD</h6></td>
        </tr>
        </thead>
        <tbody class="tbody-light">
        <tr style="text-align: center">
            <td><h6>{{date_format($order->ordered_at,'l, F j, Y')}}</h6></td>
            <td><h6>{{$order->po_reference}}</h6></td>
            <td><h6>{{$order->mph_id}}</h6></td>
            <td><h6>{{$order->delivery_note}}</h6></td>
            <td>@if($order->reseller)<h6>{{$order->reseller->id}}</h6>@endif</td>
            <td>@if(!is_null($deliveryDate))<h6>{{date_format($deliveryDate,'l, F j, Y')}}</h6>@endif</td>
            <td>@if($order->shippingMethod()->exists())<h6>{{$order->shippingMethod->name}}</h6>@endif</td>
        </tr>
        </tbody>
    </table>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="15%"><h6>PARTNER REF/SKU</h6></td>
            <td width="50%"><h6>PRODUCT DESCRIPTION</h6></td>
            <td><h6>UNITS ORDERED</h6></td>
            <td><h6>DELIVERED</h6></td>
            <td><h6>OUTSTANDING</h6></td>
        </tr>
        </thead>
        <tbody class="tbody-light">
        @foreach($order->orderItems as $item)
            <?php
            /** @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $item */

            $totalOrdered = $item->quantity;
            $totalDelivered = 0;
            if (! $item->product->isBundle()) {

                $totalOrdered = $item->quantity;
                $totalDelivered = $item->deliverables()
                    ->where('product_id', $item->product_id)
                    ->where('status', 'Delivered')
                    ->count();

            }
            $totalOutstanding = $totalOrdered - $totalDelivered;

            ?>

            <tr>
                <td style="text-align:center"><h6>{{$item->product->sku}}</h6></td>
                <td style="text-align:left">
                    <h6>{{$item->product->name}}
                        @if($item->promotional_price_id)
                            <span class="pull-right" title="Demo unit"> - Demo Unit </span>
                        @endif
                    </h6>
                    @if($item->product->isBundle())
                        <?php
                        /** @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $item */
                        $bundledProducts = $item->bundled_products;
                        ?>
                        @foreach($bundledProducts as $bundledProduct)
                            <?php

                            /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                            $product = $bundledProduct->product;

                            $totalOrdered = $item->quantity * $bundledProduct->quantity;

                            $totalDelivered = $item->deliverables()
                                ->where('product_id', $product->id)
                                ->where('bundle_product_id', $item->product_id)
                                ->where('status', 'Delivered')
                                ->count();
                            $totalOutstanding = $totalOrdered - $totalDelivered;


                            ?>
                            <h6> - {{ $product->name }}</h6>
                        @endforeach
                    @endif
                </td>
                <td style="text-align:center"><h6>{{$item->quantity}}</h6></td>
                <td style="text-align:center">
                    {{--@if(!$item->product->isBundle())--}}
                        <h6>{{$totalDelivered}}</h6>
                    {{--@endif--}}
                </td>
                <td style="text-align:center">
                    {{--@if(!$item->product->isBundle())--}}
                        <h6>{{$totalOutstanding}}</h6>
                    {{--@endif--}}
                </td>
            </tr>
            @if($item->product->isBundle())
                <?php
                /** @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $item */
                //                 $bundledProducts = $item->bundled_products;




                ?>
                @foreach($bundledProducts as $bundledProduct)
                    <?php

                    /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                    //                     $product = $bundledProduct->product;
                    //
                    //                     $totalOrdered = $item->quantity * $bundledProduct->quantity;
                    //
                    //                     $totalDelivered = $item->deliverables()
                    //                         ->where('product_id', $product->id)
                    //                         ->where('bundle_product_id', $item->product_id)
                    //                         ->where('status', 'Delivered')
                    //                         ->count();
                    //                     $totalOutstanding = $totalOrdered - $totalDelivered;


                    ?>
                    {{--<tr>--}}
                    {{--<td style="text-align:center"></td>--}}
                    {{--<td style="text-align:left; padding: 0">--}}
                    {{--<table>--}}
                    {{--<tr>--}}
                    {{--<td style="border: 0; width: 100px">{{ $product->sku }}</td>--}}
                    {{--<td style="border: 0;">{{ $product->name }}</td>--}}
                    {{--</tr>--}}
                    {{--</table>--}}
                    {{--</td>--}}
                    {{--<td style="text-align:center"><h6>{{ $totalOrdered }}</h6></td>--}}
                    {{--<td style="text-align:center"><h6>{{ $totalDelivered }}</h6></td>--}}
                    {{--<td style="text-align:center"><h6>{{ $totalOutstanding }}</h6></td>--}}
                    {{--</tr>--}}
                @endforeach
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
@section('content-bottom')
    <table style="margin-top: 20px;margin-bottom: 20px;" class="notes">
        {{--<tr>--}}
        {{--<td><b>Shipper/Receiver…………………………………………………..</b></td>--}}
        {{--</tr>--}}
        <tr>
            <td width="70%">
                <table>
                    <tr>
                        <td style="vertical-align: top"><b>NOTES</b></td>
                    </tr>
                    <tr>
                        <td>
                            <small>Notice must be given to us of any goods not received within 10 days taken from the date of dispatch
                                stated on invoice.
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small>Complaints can only be accepted if made in writing within 30 days of receipt of goods.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small>Any Shortage or damage must be notified within 72 hours of receipt of goods.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small>No goods may be returned without prior authorisation from MPH Group.</small>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="30%" style="padding-top: 0">
                <table>
                    <tr>
                        <td>
                            <h6 style="vertical-align: top;margin-left: 20px;">Order Summary</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: bottom" align="right">
                            {{--{{$content}}--}}
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($content)) !!} "></td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
@endsection
@section('footer')
    <table class="no-border no-padding footer" width="100%">
        <tr>
            <td align="center">
                <b>Thank you for your business!</b>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>Should you have any enquiries concerning this delivery note, please contact us at
                    <a href="mailto:sales@mphgroup.uk"> sales@mphgroup.uk</a></small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>MPH Group, 123 Buckingham Palace Rd, Victoria, London, SW1W 9SH. U.K.<a
                            href="https://‌www.mphgroup.uk‌"> www.mphgroup.uk</a> . +44 (0) 20 374 56676
                </small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>MPH Group Registration Number: 12378824, VAT Number: GB 340 4463 27</small>
            </td>
        </tr>
    </table>
@endsection


