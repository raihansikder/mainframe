<?php
/** @var $user \App\User */
?>
<h4>Recommender Billing cycle</h4>
{{--<small>Upload one or more files</small>--}}
<?php $user->nextBillingDate() ?> <br/>

<table class="table table-bordered">
    <tr>
        <td>Cycle</td>
        <td>Payment date</td>
        <td>For Purchases from</td>
        <td>For Purchases till</td>
    </tr>
    @foreach($user->billingCycles() as $cycle)
        <tr>
            <td>{{$cycle['cycle']}}</td>
            <td>{{$cycle['date']}}</td>
            <td>{{$cycle['conversions_from']}}</td>
            <td>{{$cycle['conversions_till']}}</td>
        </tr>
    @endforeach
</table>
<b>Next billing date
    : @if($user->nextBillingDate()){{$user->nextBillingDate()->format('Y-m-d')}}@endif</b>
