<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
use App\Projects\MphMarket\Helpers\Money;
use App\Projects\MphMarket\Helpers\Rocketship\RocketShip;
use App\Projects\MphMarket\Modules\Invoices\Invoice;
use App\Projects\MphMarket\Modules\ShippingLabels\ShippingLabel;
$invoice_id=null;
if($element->invoices()->count()){
    $invoice_id=$element->invoices()->first()->id;
}
$sign = Money::sign($element->currency);

$shipper = RocketShip::$shippers['UK_Future_Space'];

$createLink = route('shipping-labels.create')
    ."?order_id={$element->id}"
    // ."&service=INTERNATIONAL_ECONOMY"
    ."&po_no={$element->id}"
    ."&invoice_no={$invoice_id}"
    ."&ship_on=".now()
    ."&shipper=".$shipper['shipper']
    ."&shipper_contact_name=Andrew Baines"
    ."&shipper_email=andrew.baines@mphgroup.uk"
    ."&ship_addr1=".$shipper['ship_addr1']
    ."&ship_addr2=".$shipper['ship_addr2']
    ."&ship_city=".$shipper['ship_city']
    ."&ship_state=".$shipper['ship_state']
    ."&ship_code=".$shipper['ship_code']
    ."&ship_country=".$shipper['ship_country']
    ."&ship_phone=".$shipper['ship_phone']
    ."&to_name={$element->shipping_first_name} {$element->shipping_last_name}"
    ."&to_addr1={$element->shipping_address1}"
    ."&to_addr2={$element->shipping_address2}"
    ."&to_city={$element->shipping_city}"
    ."&to_state={$element->shipping_county}"
    ."&to_code={$element->shipping_zip_code}"
    ."&to_country=".($element->shippingCountry ? $element->shippingCountry->iso2 : '')
    ."&to_phone={$element->shipping_phone}"
    ."&packaging_type=YOUR_PACKAGING"
    ."&weight_unit=KG"
    ."&package_weights={$element->totalWeight()}"
    ."&customs_quantity_units=EA"
    ."&currency={$element->currency}"
    ."&customs_quantity=1"
    ."&customs_line_amount={$element->final_total}"
    ."&country_of_manufacture=US"
    ."&customs_weight={$element->totalWeight()}"
    ."&customs_description=Description of product";

$canCreateShippingLabels = user()->can('create', ShippingLabel::class);

?>

<div class="clearfix" style="margin: 30px 0 0"></div>
<h3 class="pull-left">Shipping</h3>

@if($canCreateShippingLabels)
    <a href="{{$createLink}}" class="btn btn-default pull-right" style="margin-top:10px">
        <i class="fa fa-plus"></i> &nbsp; Create </a>
@endif

<table id="tableQuoteItems" class="table">
    <thead>
    <tr id="header">
        <th style="width:16%;">NO.</th>
        <th style="width:20%;">SHIP DATE</th>
        <th>UPDATED</th>
        {{-- <th style="width:15%;">COST</th>--}}
        <th>Tracking No.</th>
    </tr>
    </thead>
    <tbody>
    @foreach($element->shippingLabels as $shippingLabel)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $shippingLabel */
        // $link = route('shipping-labels.edit', $shippingLabel->id)."?redirect_success=".URL::full();

        $link = '#';
        if ($user->isAdmin()) {
            $link = route('shipping-labels.edit', $shippingLabel->id);
        }

        $cost = \App\Projects\MphMarket\Helpers\Money::print($shippingLabel->shipping_cost, $sign)
        ?>
        <tr>
            <td>
                <a href="{{$link}}">{{pad($shippingLabel->id)}}</a>
                @if($shippingLabel->is_test)
                    <span class="badge">Test</span>
                @endif
            </td>
            <td>{{formatDate($shippingLabel->ship_on)}}</td>
            <td>{{formatDateTime($shippingLabel->created_at)}}</td>
            {{--<td>{{$cost}}</td>--}}
            <td>
                {{-- {{$shippingLabel->status}}--}}
                @if($shippingLabel->tracking_number)
                    {{ $shippingLabel->tracking_number }}
                    <a class="btn btn-xs bg-gray-light pull-right"
                       target="_blank"
                       style="border: 1px black"
                       href="{{$shippingLabel->fedexTrackingUrl()}}">
                        TRACK
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

