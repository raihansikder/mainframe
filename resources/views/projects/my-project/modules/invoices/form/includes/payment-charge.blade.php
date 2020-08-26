{{-- stripe --}}
<div class="col-md-6 no-padding-l">
    <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table">
            <h3 class="panel-title">Payment Details</h3>
            <div class="display-td">
                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png" alt=""/>
            </div>
        </div>
        <div class="panel-body">

            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <form role="form" action="{{ route('stripe.charge') }}" method="post" class="require-validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                  id="payment-form">
                @csrf

                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>Name on Card</label>
                    <input name="card_name" class='form-control' size='4' type='text'>
                </div>

                <div class='col-xs-12 form-group card required'>
                    <label class='control-label'>Card Number</label>
                    <input name="card_number" autocomplete='off' class='form-control card-number' size='20' type='text'>
                </div>

                <div class='col-xs-12 col-md-4 form-group cvc required'>
                    <label class='control-label'>CVC</label>
                    <input name="card_cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>Expiration Month</label>
                    <input name="card_month" class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>Expiration Year</label>
                    <input name="card_year" class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>

                <div class='col-md-12 error hide no-padding'>
                    <div class='alert-danger alert'>Please correct the errors and try
                        again.
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function () {
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function (e) {

                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error').removeClass('hide').find('.alert').text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripe_token' value='" + token + "'/>");
                    $form.append("<input type='hidden' name='invoice_id' value='{{$element->id}}'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection