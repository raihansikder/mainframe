<?php
/** @var \App\Projects\MphMarket\Modules\Quotes\Quote $element */
?>

@if($element->isUpdating())
    <div class="col-md-4 pull-right no-padding">
        <div class="btn-group pull-right">

            {{--  Send --}}
            @if($element->status == 'Submitted' && user()->isAdmin())
                <button class="btn btn-default flat" id="dealRegSendBtn"
                        name="dealRegSendBtn" type="button"
                        data-url="{{route('deal-regs.send',$element->id)}}"
                        data-redirect_success="{{URL::full()}}"
                        data-token="{{@csrf_token()}}"
                        data-redirect_fail="#"> Send
                </button>
            @endif

            @if($element->status == 'Sent')
                <button class="btn btn-success flat" id="dealRegAcceptBtn" type="button"> Accept</button>
                <button class="btn btn-danger flat" id="dealRegRejectBtn" type="button"> Decline</button>
            @endif

            <a class="btn btn-default" href="{{route('deal-regs.csv',$element->id)}}">
                <i class="fa fa-file-excel-o"></i> &nbsp;&nbsp;CSV
            </a>

            {{--<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-print"></i> Print</a>--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">--}}
            {{--<span class="caret"></span>--}}
            {{--<span class="sr-only">Toggle Dropdown</span>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="#" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF</a></li>--}}
            {{--<li><a href="#" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF--}}
            {{--Partner Pricing</a></li>--}}

            {{--<li class="divider"></li>--}}
            {{--<li><a href="#"><i class="fa fa-envelope"></i>Send</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
@endif

@section('js')
    @parent
    @if($element->isUpdating() && $element->status == 'Submitted')
        <script>
            $('#dealRegSendBtn').click(function () {
                var url = $(this).data('url');
                var redirect_success = $(this).data('redirect_success');
                var token = $(this).data('token');

                $.ajax({
                    datatype: 'json',
                    method: "POST",
                    url: url,
                    data: {_token: token, redirect_success: redirect_success}
                }).done(function (ret) {
                    ret = parseJson(ret); // Convert the response into a valid json object.
                    window.location.replace(ret.redirect);
                });
            });
        </script>
    @endif

    @if($element->isUpdating() && $element->status == 'Sent')
        <script>
            $('#dealRegAcceptBtn').click(function () {
                $('select[name=status]').val('Accepted').select2().trigger('change');
                $('#deal-regsSubmitBtn').trigger('click');
            });

            $('#dealRegRejectBtn').click(function () {
                $('select[name=status]').val('Rejected').select2().trigger('change');
                $('#deal-regsSubmitBtn').trigger('click');
            });
        </script>
    @endif

@endsection