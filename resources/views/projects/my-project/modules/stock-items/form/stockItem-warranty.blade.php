@extends('projects.my-project.layouts.centered.template')

@section('css')
    @parent
    <style>
        .login-box {width: 750px}
    </style>
@endsection

<?php
use App\Projects\MphMarket\Modules\StockItems\StockItem;
use BaconQrCode\Encoder\QrCode;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\StockItems\StockItem $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var StockItem $stockItem
 */

$product = $stockItem->product;
$orderItem = $stockItem->orderItem;
$order = $orderItem->order;

?>

@section('content')
    <h3 class="text-center">Online Warranty Registration</h3>
    @if($stockItem)

        <table class="table table-striped">
            <tr>
                <td><b>Product</b></td>
                <td>{{$product->name_ext}}</td>
            </tr>
            <tr>
                <td><b>Product Serial</b></td>
                <td>{{$stockItem->code}}</td>
            </tr>
            <tr>
                <td><b>Order</b></td>
                <td>
                    <a href="{{route('orders.edit',$order->id)}}">
                        {{pad($order->id)}} - {{$order->name}}
                    </a>

                    <div class="clearfix"></div>
                    @include('projects.my-project.layouts.custom.qr-code',['content'=>$order->qrCodeContent()])
                </td>
            </tr>
            <tr>
                <td>Warranty Details</td>
                <td>{{$product->warranty}}</td>
            </tr>
            <tr>
                @if($stockItem->warrantyStarted())
                    <td>Warranty duration</td>
                    <td>{{formatDateTime($stockItem->warranty_starts_on)}} -To- {{formatDateTime($stockItem->warranty_ends_on)}}</td>
                @endif
            </tr>

        </table>

        @if(!$stockItem->warrantyStarted())
            <form id="stockItemWarrantyForm" name="stockItemWarrantyForm" method="post"
                  action="{{route('stock-item.reg-warranty')}}">
                @csrf
                <input type="hidden" name="id" value="{{$stockItem->id}}"/>
                <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
                <input type="hidden" name="redirect_full" value="{{URL::full()}}"/>
                <button id="stockItemWarrantyFormSubmitBtn" class="btn btn-primary btn-block btn-lg" type="submit">
                    Register Warranty
                </button>
            </form>
        @endif
        <div class="clearfix"></div>

        <a href="{{route('orders.deliverables',$order->id)}}"
           class="btn btn-default btn-block btn-lg"
           style="margin-top:20px"
        >
            <i class="fa fa-angle-left"></i>
            Register other items </a>
    @else
        <h5>No Product Found</h5>
    @endif
@endsection

