<?php
/** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $element */
$invoice = $element;

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

$paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => $invoice->final_total * 100,
    'currency' => strtolower($invoice->currency), // 'gbp',
    // Verify your integration in this guide by including this parameter
    'metadata' => [
        'invoice_id' => $invoice->id,
        // 'integration_check' => 'accept_a_payment'
    ],
    'idempotency_key' => $invoice->id
]);

// dd($intent->client_secret);

?>
{{-- stripe --}}

<div class="col-md-6 border-dotted" style="padding: 10px;">
    <img class="img-responsive pull-left" src="http://i76.imgup.net/accepted_c22e0.png" alt=""/>
    <form id="payment-form">
        <div id="card-element" style="margin: 10px 0">
            <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="card-errors" role="alert" class="text-red"></div>

        <button class="btn btn-default" id="submit">Pay</button>
    </form>
</div>

@section('js')
    @parent
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">

        // See your keys here: https://dashboard.stripe.com/account/apikeys
        var stripe = Stripe('{{env('STRIPE_KEY')}}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
            }
        };

        var card = elements.create("card", {style: style});
        card.mount("#card-element");

        card.on('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });


        var clientSecret = '{{$paymentIntent->client_secret}}';
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function (ev) {
            ev.preventDefault();
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        // name: 'Jenny Rosen'
                    }
                }
            }).then(function (result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                    alert(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {

                        alert('Success');

                        $.ajax({
                            datatype: 'json',
                            method: "POST",
                            url: '{{route('stripe.post.payment.response')}}',
                            data: {_token: "{{@csrf_token()}}", payment_intent: result.paymentIntent}
                        }).done(function (ret) {

                        })

                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                    }
                }
            });
        });

    </script>
@endsection