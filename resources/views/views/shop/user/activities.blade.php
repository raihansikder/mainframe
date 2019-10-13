@extends('shop.template.page-type-3.layout')

<?php
/** @var \App\User $user */
use App\Invoice;use App\Purchase;use App\Recommendurl;
$purchases = Purchase::with(['recommendurl'])
    ->where('recommender_user_id', $user->id)
    ->where('status', 'Confirmed')
    ->orderBy('purchased_at', 'DESC')
    // ->limit(5)
    ->get();

$pending_recommendations = Recommendurl::doesntHave('purchases')
    ->where('recommender_user_id', $user->id)
    ->orderBy('created_at', 'DESC')
    // ->limit(5)
    ->get();

// $paid_invoices = Invoice::limit(5)->get();

$paid_invoices = Invoice::where('recommender_user_id', $user->id)
    ->where('status', 'Paid')
    ->where('subtotal', '>', 0)
    ->orderBy('created_at', 'DESC')
    ->get();
?>
@section('css')
    @parent
    {{-- Write css CSS here --}}
@stop

@section('content')
    <div class="main-container">

        <div class="page-header d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col" style="margin-right:-72px;">
                        <h1 class="text-center">Lets Review</h1>
                    </div>
                    <div class="col-auto d-flex justify-content-end align-items-center page-header-right">
                        <ul>
                            <li><a href="{{route('shop.index')}}"><i class="fa fa-angle-left"></i> Back</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('template.include.messages-top')
                    </div>
                </div>
            </div>
        </div>

        <!-------Main Wrapper-------->
        <div id="main-wrapper" class="main-wrapper">
            <div class="container">
                <div class="letsReview">
                    <div class="review-alert"> Bank <span class="badge badge-pill badge-dark"> 5%</span> for every successful recommendation</div>
                    <div class="row reviewBalance">
                        <div class="col-sm-6 mb-3">
                            <div class="totalmade">

                                <table class="table">
                                    <tr>
                                        <td>Total Made</td>
                                        <td class="totalAmount">{{$user->stat_total_commission_to_date_in_user_currency_formatted}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="totalshare">
                                <table class="table">
                                    <tr>
                                        <td>Total Shared</td>
                                        <td class="totalAmount">{{$user->stat_total_donation_to_date_in_user_currency_formatted}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row reviewBalance">
                        <div class="col-sm-6 mb-3">
                            <div class="totalmade">
                                <table class="table">
                                    <tr>
                                        <td>Next payment to you</td>
                                        <td class="totalAmount"> {{$user->next_payment_in_user_currency_formatted}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="totalshare">
                                <table class="table">
                                    <tr>
                                        <td>Next payment to charity</td>
                                        <td class="totalAmount"> {{$user->stat_donation_due_in_user_currency_formatted}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="small">*minimum payment amount {{curSign($user->currency)}}10</div>
                    <hr>
                    <div class="activity-tabs">
                        <h2 class="mb-2">Recent Activity</h2>
                        <p class="mb-4 text-black">Recommendations that are bought will show below within<strong> 48 hours</strong> of the purchase date</p>

                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#successfule" role="tab" aria-controls="nav-home"
                                   aria-selected="true">Successful</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="nav-profile"
                                   aria-selected="false">Pending</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#payment-released" role="tab"
                                   aria-controls="nav-contact"
                                   aria-selected="false">Payment Released</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="successfule" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-hover">

                                    @forelse($purchases as $purchase)
                                        <?php /** @var Purchase $purchase */?>
                                        <tr>
                                            <td>
                                                <h2>{{$purchase->partner_name}}</h2>
                                                <div class="price">{{curSign($purchase->user_currency).money($purchase->product_price_in_user_currency)}}</div>
                                                <div class="page-url">{{$purchase->recommendurl->short_url_u}}</div>
                                            </td>
                                            <td class="totalPrice">{{curSign($purchase->user_currency).money($purchase->user_commission_in_user_currency)}}</td>

                                        </tr>
                                    @empty
                                        <h2 class="purple-color text-center mt-4">You dont't have any successful conversion</h2>
                                    @endforelse
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <h2>Athlectic Propulsion Labs</h2>--}}
                                    {{--                                            <div class="price">$150</div>--}}
                                    {{--                                            <div class="page-url">Letsbab.co/4adeNIJI</div>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td class="totalPrice">$7.50</td>--}}

                                    {{--                                    </tr>--}}
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-hover">

                                    @forelse ($pending_recommendations as $recommendurl)
                                        <?php /** @var Recommendurl $recommendurl */?>
                                        <tr>
                                            <td>
                                                <h2>{{$recommendurl->partner_name}}</h2>
                                                <div class="price">{{curSign($recommendurl->product_price_currency) .money($recommendurl->product_price)}}</div>
                                                <div class="page-url">{{$recommendurl->short_url_u}}</div>
                                            </td>
                                            <td class="totalPrice">Pending</td>

                                        </tr>
                                    @empty
                                        <h2 class="purple-color text-center mt-4">You haven't done any recommendation yet</h2>
                                    @endforelse
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <h2>Athlectic Propulsion Labs</h2>--}}
                                    {{--                                            <div class="price">$150</div>--}}
                                    {{--                                            <div class="page-url">Letsbab.co/4adeNIJI</div>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td class="totalPrice">Pending</td>--}}
                                    {{--                                    </tr>--}}
                                </table>
                            </div>
                            <div class="tab-pane fade" id="payment-released" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-hover">
                                    @forelse ($paid_invoices as $invoice)
                                        <?php /** @var Invoice $invoice */?>
                                        <tr>
                                            <td>
                                                <h2>{{pad($invoice->code)}}</h2>
                                                <div class="price">{{$invoice->invoice_date->format('d-m-Y')}}</div>
                                                {{--                                            <div class="page-url">{{curSign($invoice->currency).$invoice->subtotal}}</div>--}}
                                            </td>
                                            <td class="totalPrice">{{curSign($invoice->currency).$invoice->subtotal}}</td>

                                        </tr>
                                    @empty
                                        <h2 class="purple-color text-center mt-4">You dont't have any recent transactions</h2>
                                    @endforelse
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-------/Main Wrapper-------->

    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop