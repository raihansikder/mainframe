@extends('projects.my-project.layouts.pdf-print.order')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Orders\Order $order */
$deliveryDate = null;
if (isset($order->delivery_date))
    $deliveryDate = new DateTime($order->delivery_date);

?>
@section('header')
    <hr>
    <div class="col-md-6" align="center">
        <img class="image img-responsive"
             src="{{asset('projects/my-project/images/mphlogo.png')}}" alt=""/>
    </div>
    <div class="col-md-6" align="center">
        <h1>DELIVERY NOTE</h1>
    </div>
    <hr>
@endsection
@section('top')
    <div class="col-md-6" style="padding-right: 1%">
        <table class="table table-borderless table-dark">
            <thead align="left">
            <th colspan="12">
                CUSTOMER INFORMATION
            </th>
            </thead>
            <tbody class="table-light" style="color:black">
            <tr>
                <td colspan="1">FULLNAME</td>
                <td colspan="3">{{$order->billing_company_name}}</td>
            </tr>
            <tr>
                <td colspan="1">ADDRESS</td>
                <td colspan="3">{{$order->billing_address1}}</td>
            </tr>
            <tr>
                <td colspan="1">POSTCODE</td>
                <td colspan="3">{{$order->billing_zip_code}}</td>
            </tr>
            <tr>
                <td colspan="1">TELEPHONE</td>
                <td colspan="3">{{$order->billing_phone}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-borderless table-dark">
            <thead align="left">
            <th colspan="12">
                SHIPPING INFORMATION
            </th>
            </thead>
            <tbody class="table-light" style="color:black">
            <tr>
                <td colspan="1">FULLNAME</td>
                <td colspan="3">{{$order->shipping_company_name}}</td>
            </tr>
            <tr>
                <td colspan="1">ADDRESS</td>
                <td colspan="3">{{$order->shipping_address1}}</td>
            </tr>
            <tr>
                <td colspan="1">POSTCODE</td>
                <td colspan="3">{{$order->shipping_zip_code}}</td>
            </tr>
            <tr>
                <td colspan="1">TELEPHONE</td>
                <td colspan="3">{{$order->shipping_zip_phone}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <table class="table table-bordered table-dark">
                <thead align="center">
                <th colspan="2">
                    ORDER DATE
                </th>
                <th colspan="2">
                    ORDER NO#
                </th>
                <th colspan="2">
                    DELIVERY NOTE#
                </th>
                <th colspan="2">
                    CUSTOMER ID
                </th>
                <th colspan="2">
                    DISPATCH DATE
                </th>
                <th colspan="2">
                    DELIVERY METHOD
                </th>
                </thead>
                <tbody class="table-light" style="color:black">
                <tr align="center">
                    <td colspan="2">{{date_format($order->ordered_at,'l, F j, Y')}}</td>
                    <td colspan="2">{{$order->id}}</td>
                    <td colspan="2">{{$order->delivery_note}}</td>
                    <td colspan="2">{{$order->reseller->id}}</td>
                    <td colspan="2">@if(!is_null($deliveryDate)){{date_format($deliveryDate,'l, F j, Y')}}@endif</td>
                    <td colspan="2">@if(isset($order->shippingMethod)){{$order->shippingMethod->name}}@endif</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr style="text-align: center;">
                <td scope="col">PARTNER REF/SKU</td>
                <td scope="col">PRODUCT DESCRIPTION</td>
                <td scope="col">ORDER</td>
                <td scope="col">DELIVERED</td>
                <td scope="col">OUTSTANDING</td>
            </tr>
            </thead>
            <tbody class="tbody-light">
            @foreach($order->orderItems as $item)
                <tr>
                    <td style="text-align:center">{{$item->product->sku}}</td>
                    <td style="text-align:left">{{$item->product->name}}</td>
                    <td style="text-align:center">{{$item->quantity}}</td>
                    <td style="text-align:center">{{$item->total_delivered}}</td>
                    <td style="text-align:center">{{$item->quantity-$item->total_delivered}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('content-bottom')
    <div class="col-md-4">
        <b>Shipper/Receiver…………………………………………………..</b>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <p><b>NOTES</b></p>
        <p>Notice must be given to us of any goods not received within 10 days taken from the date of despatch stated on
            invoice.
            <br>Any Shortage or damage must be notified within 72 hours of receipt of goods.
            <br>Complaints can only be accepted if made in writing within 30 days of receipt of goods.
            <br>No goods may be returned without prior authorisation from MPH Group.
        </p>
    </div>

@endsection
@section('footer')

    <div class="col-md-12" align="center">
        <br>
        <h5><b>Thank you for your business!</b></h5>‌
        <p>
            <b>Should you have any enquiries concerning this delivery note, please contact us at
                <a href="mailto:Support@mphgroup.uk">Support@mphgroup.uk</a>
                <br>MPH Group, 123 Buckingham Palace Rd, Victoria, London, SW1W 9SH. U.K.<a href="https://‌www.mphgroup.uk‌">www.mphgroup.uk</a> . +44 (0) 20 374 56676
                <br>MPH Group Registration Number - 12378824, VAT number: GB 340 4463 27
            </b>
        </p>
    </div>
@endsection

