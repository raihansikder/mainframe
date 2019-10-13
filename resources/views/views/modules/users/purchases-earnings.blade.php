<?php
/** @var $user \App\User */
?>
<h4>Purchases and Earnings</h4>
All purchases where this user earned (split earnings included)<br/>
<?php

$purchases = $user->invoicablePurchases();

?> <br/>

<table class="table table-bordered">
    <thead>
    <tr>
        <th><span class="pull-left" style="width: 70px">Date</span></th>
        <th><span class="pull-right">Purchase</span></th>
        <th><span class="pull-right">Shared</span></th>
        <th><span class="pull-right">Earning</span></th>
        <th><span class="pull-right">Earning (Total)</span></th>
        <th><span class="pull-right">Donation</span></th>
        <th><span class="pull-right">Donation (Total)</span></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cumulative_commission = 0;
    $cumulative_donations = 0;

    ?>
    @foreach($purchases as $purchase)
        <?php
        $commission = 0;
        $donation = 0;
        $type = null;
        /** @var $purchase \App\Purchase */
        if ($user->id == $purchase->recommender_user_id) {
            $commission = $purchase->user_commission_in_user_currency;
            $donation = $purchase->charity_donation_in_user_currency;
        } elseif ($user->id == $purchase->split_user_id) {
            $type = "<code>SP</code>";
            $commission = $purchase->split_user_amount_in_split_user_currency;
            $donation = $purchase->split_charity_amount_in_split_user_currency;

        }

        $cumulative_commission += $commission;
        $cumulative_donations += $donation;
        ?>


        <tr>
            <td>@if($purchase->purchased_at)
                    <span class="">{{$purchase->purchased_at->format('Y-m-d')}}@endif</span>
            </td>
            <td>
                <span class=""><a href="{{route('purchases.edit',$purchase->id)}}" target="_blank">{{pad($purchase->id)}}</a></span>
            </td>
            <td>
                <span class="pull-right">
                    @if($user->id == $purchase->recommender_user_id)
                        {{money($purchase->split_amount_in_user_currency)}}
                    @endif
                </span>
            </td>
            <td><span class="pull-right">{!! $type !!}{{money($commission)}}
                                     </span></td>
            <td><span class="pull-right">{{money($cumulative_commission)}}</span></td>
            <td><span class="pull-right">{{money($donation)}}</span></td>
            <td><span class="pull-right">{{money($cumulative_donations)}}</span></td>
        </tr>
    @endforeach
    </tbody>
</table>