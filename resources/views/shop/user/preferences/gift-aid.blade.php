<?php
/** @noinspection PhpUndefinedMethodInspection */
$user = $user ?? user();
?>

<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="remember-me">
    <label class="custom-control-label " for="remember-me" data-toggle="modal" data-target="#termCondition">Gift Aid T's &
        C's</label>
</div>
<!-- Modal -->
<div class="modal fade form-modal charity-form-wrap" id="termCondition" tabindex="-1" role="dialog" aria-labelledby="charityform-step-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Gift Aid Declaration Form – Multiple Donations</h2>
                <p> Your address is needed to identify you as a current UK taxpayer. <br>
                    Boost your donation by 25p of Gift Aid for every £1 you donate Gift Aid is reclaimed by the charity from the tax you pay for the current tax
                    year. </p>
                <a class="close" data-dismiss="modal" aria-label="Close"><img src="{{asset('letsbab/shop/images/close-icon.png')}}"> </a></div>
            <div class="modal-body">
                <div class="chairty-form">
                    <form id="form_aiddeclaration" name="form_aiddeclaration" class="pt-3 mb-0" action="{{route('aiddeclarations.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}"/>

                        {{--                        <div class="form-group form-row ">--}}
                        {{--                            <label class="col-12 col-form-label">Title*</label>--}}
                        {{--                            <div class="col-12">--}}
                        {{--                                <input type="text" class="form-control" id="">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">First Name*</label>
                            <div class="col-12">
                                <input type="text" name="first_name" class="form-control validate[required]" value="{{$user->first_name}}">
                            </div>
                        </div>
                        <div class="form-group form-row ">
                            <label class="col-12 col-form-label">Surname*</label>
                            <div class="col-12">
                                <input type="text" name="last_name" class="form-control validate[required]" value="{{$user->last_name}}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">Home Address*</label>
                            <div class="col-12">
                                <input type="text" class="form-control validate[required]" name="address1" value="{{$user->address1}}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">Home Address Line 2</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="address2" value="{{$user->address2}}">
                            </div>
                        </div>
                        <div class="form-group form-row ">
                            <label class="col-12 col-form-label">Postcode*</label>
                            <div class="col-12">
                                <input type="text" class="form-control validate[required]" name="zip_code" value="{{$user->zip_code}}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">County</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="county" value="{{$user->county}}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">Email*</label>
                            <div class="col-12">
                                <input type="text" class="form-control validate[required]" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-12 col-form-label">Telephone/Mobile No.*</label>
                            <div class="col-12">
                                <input type="text" class="form-control validate[required]v" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group form-row ">
                            <label class="col-12 col-form-label">Date of Declaration*</label>
                            <div class="col-12">
                                <input name="date_of_declaration" type="text" class="form-control" value="{{today()->format('Y-m-d')}}" readonly>
                            </div>
                        </div>
                        <div class="form-group ">In order to Gift Aid your donation you must tick the box below:</div>
                        <div class="form-group">
                            <div class="form-check form-tc custom-control custom-checkbox">
                                <input name="is_acknowledged" type="checkbox" id="defaultCheck2" value="" class="custom-control-input validate[required]">
                                <label for="defaultCheck2" class="custom-control-label "> I am a UK taxpayer. Please treat all donations I may make or have made
                                    to each of the UK charity partners on the LetsBab app (<a href="{{conf('letsbab.url.charity-list')}}" style="text-decoration:underline!important">click
                                        here</a> for the list of charities), including but not limited to Women for Women International, Legacy of War
                                    Foundation and End Youth Homelessness and any additional charities or which I may donate to which subsequently become UK
                                    charity partners on the LetsBab app, as Gift Aid donations until further notice. <br>
                                </label>
                            </div>
                        </div>
                        <div class="form-tc"> Please let us know if you want to cancel this Declaration, change your home address or no longer pay sufficient
                            tax by emailing <a href="mailto:letshelp@letsbab.com" style="text-decoration:underline!important">letshelp@letsbab.com</a> <br>
                            <br>
                            <strong> If you pay Income Tax at the higher or additional rate and want to receive the additional tax relief due to you, you must
                                include all your Gift Aid donations on your Self-Assessment tax return or ask HM Revenue and Customs to adjust your tax
                                code.</strong></div>
                        <hr>
                        <div class="update-btn">
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

@section('js')
    @parent
    <script>
        $('#form_aiddeclaration').validationEngine();
    </script>
@stop