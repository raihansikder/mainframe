<?php
/** @noinspection PhpUndefinedMethodInspection */
$user = $user ?? user();
?>

<a data-toggle="collapse" href="#payment-setting" role="button" aria-expanded="false"
   aria-controls="payment-setting">Payment Settings
    @if(!$user->has_banking_details) <span class="badge badge-pill badge-light">1</span> @endif <i
            class="fa fa-angle-right"></i></a>
<div class="collapse" id="payment-setting">
    <div class="card card-body">
        <form name="payment_setting_form" id="payment_setting_form" class="col-md-12"
              action="{{route('users.update',[$user->id])}}" method="post">
            @csrf
            @method('PATCH')
            <h3 class="mb-3">Bank Information</h3>
            {{--187=UK--}}
            @if($user->country_id=='187')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_holder_name">Name of Account Holder</label>
                            <input type="text" name="account_holder_name" id="account_holder_name"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_holder_name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_number">Bank Account Number</label>
                            <input type="text" name="account_number" id="account_number"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_number}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="sort_code">Sort Code</label>
                            <input type="text" name="sort_code" id="sort_code"
                                   class="form-control bank_details_field validate[maxSize[6],minSize[6],custom[number]]"
                                   onfocus="alertModalForBankDetails()" value="{{$user->sort_code}}">
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="abartn">ABA Routing Number</label>
                            <input type="text" name="abartn" id="abartn" class="form-control bank_details_field"
                                   onfocus="alertModalForBankDetails()" value="{{$user->abartn}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_number">Account Number</label>
                            <input type="text" name="account_number" id="account_number"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_number}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_holder_name">Name of Account Holder</label>
                            <input type="text" name="account_holder_name" id="account_holder_name"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_holder_name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_type">Account Type</label>
                            <input type="text" name="account_type" id="account_type"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_type}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_first_line">Residential Address (First
                                Line)</label>
                            <input type="text" name="account_first_line" id="account_first_line"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_first_line}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_city">City</label>
                            <input type="text" name="account_city" id="account_city"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_city}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_state">State</label>
                            <input type="text" name="account_state" id="account_state"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_state}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="account_post_code">Postcode/Zip Code</label>
                            <input type="text" name="account_post_code" id="account_post_code"
                                   class="form-control bank_details_field" onfocus="alertModalForBankDetails()"
                                   value="{{$user->account_post_code}}">
                        </div>
                    </div>
                </div>
                {{--
                <div class="row">--}}
                {{--
                <div class="col-sm-6">--}}
                {{--
                <div class="form-group bmd-form-group">--}}
                <?php
                //                             $countries = App\Country::select(['id', 'name'])->where('is_active', 1)->orderBy('code')
                //                                 ->remember(cacheTime('long'))->get()->toArray();
                //                             $options[''] = 'Select';
                //                             foreach ($countries as $country) {
                //                                 $options[$country['id']] = $country['name'];
                //                             }

                ?>
                {{--{{ Form::select('country_id', $options, $user->country_id, ['class'=>'form-control','disabled'=>'disabled']) }}--}}
                {{--
                <select type="text" name="country" id="country" class="form-control" >
                  --}}
                {{--
              <option>Please Select Country</option>
              --}}
                {{--
            </select>
            --}}
                {{--</div>
              --}}
                {{--</div>
              --}}
                {{--</div>
              --}}
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group bmd-form-group">
                        <h3 class="mb-3">-OR-</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="paypal_email">Paypal Email</label>
                        <input type="text" name="paypal_email" id="paypal_email"
                               class="form-control validate[custom[email]]"
                               onclick="alertModalForPaypal()" value="{{$user->paypal_email}}">
                    </div>
                </div>
            </div>
            <div class="update-btn">
                <button type="submit" class="btn btn-primary"> Update</button>
            </div>
        </form>
    </div>
</div>
<div id="alert-modal-for-paypal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 id="alert-modal-title" class="modal-title text-center w-100">Alert</h4>
            </div>
            <div id="alert-modal-body" class="modal-body">You have already entered your bank details. Are you sure you
                want to switch to PayPal?
            </div>
            <div class="modal-footer">
                <div class="col-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="clearBankDetailsInputs()"> Yes I'm sure
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="alert-modal-for-bankdetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 id="alert-modal-title" class="modal-title text-center w-100">Alert</h4>
            </div>
            <div id="alert-modal-body" class="modal-body">You have already set up on PayPal. Are you sure you want to be
                paid by bank transfer?
            </div>
            <div class="modal-footer">
                <div class="col-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="clearPaypalEmailInput()">Yes
                        I'm
                        sure
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    @parent
    {{-- Write custom JS here --}}
    <script>
        @if(Request::get('ref')=='isonotification')
        $('#payment-setting').collapse('show');
        @endif

        $("#payment_setting_form").validationEngine({
            custom_error_messages: {
                '#sort_code': {
                    'custom[number]': {
                        'message': "Must be a set of numbers."
                    }
                }
            }
        });

        // Display alert modal when user's banking details will be available and paypal email field will be focused
        function alertModalForPaypal() {
            var account_holder_name = $('input[name=account_holder_name]').val();
            var account_number = $('input[name=account_number]').val();
            var sort_code = $('input[name=sort_code]').val();

            var abartn = $('input[name=abartn]').val();
            var account_type = $('input[name=account_type]').val();
            var account_first_line = $('input[name=account_first_line]').val();
            var account_city = $('input[name=account_city]').val();
            var account_state = $('input[name=account_state]').val();
            var account_post_code = $('input[name=account_post_code]').val();

            if (account_holder_name || account_number || sort_code || abartn || account_type || account_first_line || account_city || account_state || account_post_code) {
                $('#alert-modal-for-paypal').modal('show');
            }
        }

        //Clear the banking details fields and make the paypal field required
        function clearBankDetailsInputs() {
            $('.bank_details_field').val('');
            $('input[name=paypal_email]').addClass('validate[required]');
            $('.bank_details_field').removeClass('validate[required]');

        }

        // Display alert modal when user's paypal email will be available and banking details related fields will be focused
        function alertModalForBankDetails() {
            var paypal_email = $('input[name=paypal_email]').val();
            console.log(paypal_email);
            if (paypal_email) {
                $('#alert-modal-for-bankdetails').modal('show');
            }
        }

        //Clear the paypal email field and make the banking details related field required
        function clearPaypalEmailInput() {
            $('input[name=paypal_email]').val('');
            @if($user->country_id=='187')
            $('input[name=account_holder_name],input[name=account_number],input[name=sort_code]').addClass('validate[required]');
            @else
            $('input[name=sort_code]').removeClass('validate[required]');
            $('input[name=abartn],input[name=account_number],input[name=account_holder_name],input[name=account_type],input[name=account_first_line],input[name=account_city],input[name=account_state],input[name=account_post_code]').addClass('validate[required]');
            @endif
        }
    </script>
@stop