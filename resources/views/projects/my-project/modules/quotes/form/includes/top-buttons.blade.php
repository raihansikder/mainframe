<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

?>
<div class="col-md-8 pull-right no-padding">
    <div class="btn-group pull-right">

        @if($element->scheduleLink())
            <a class="btn btn-default" href="{{$element->scheduleLink()}}" title="Schedule"><i class="fa fa-clock-o"></i> Schedule</a>
        @endif

        @if($element->canBeCopied())
            <a class="btn btn-default" href="{{route('quotes.copy',$element->id)}}" title="Create a copy"><i class="fa fa-copy"></i> Copy</a>
        @endif



        {{-- Process Quote --}}
        @if($element->showProcessQuoteBtn())
            <a class="btn btn-default" id="btnCreateOrderForReseller" href="#"><i class="fa fa-shopping-cart"></i> Create Order</a>
        @endif

        {{-- Create Order --}}
        @if($element->showCreateOrderBtn())
            <a class="btn btn-default" href="{{route('quotes.create-order',$element->id)}}">
                <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Create Order
            </a>
        @endif


        @if($element->validForDealReg())
            <?php $modalId = 'modalIdentifier'?>
            <button name="{{$modalId}}ModalBtn" class="btn btn-default flat" type="button"
                    data-route=""
                    data-redirect_success=""
                    data-redirect_fail=""
                    data-toggle="modal" data-target="#{{$modalId}}Modal"> DealReg
            </button>

        @section('content-bottom')
            @parent
            @include('projects.my-project.modules.quotes.form.includes.deal-reg-modal-new',['id'=>$modalId, 'element'=>$element])
        @endsection
        @endif


        {{-- Print--}}
        <?php
        $printUrl = route('quotes.print-view', $element->id);
        if ($user->ofClient()) $printUrl .= '?type=client';
        ?>
        <a class="btn btn-default" href="{{$printUrl}}" target="_blank"><i class="fa fa-print"></i> Print </a>

        {{--Button group--}}
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">

                {{--Client pdf download--}}
                @if(!$user->ofClient())
                    {{--<li><a href="{{route('quotes.pdf-download',$element->id)}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF</a></li>--}}
                    {{--<li><a href="{{route('quotes.pdf-download',$element->id)."?type=partner-without-rrp"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF--}}
                            {{--Partner Pricing</a></li>--}}
                    <li><a href="{{route('quotes.pdf-download',$element->id)."?type=client"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF End Client
                            Pricing</a></li>
                @else

                    {{--Non-Client pdf download--}}
                    <li><a href="{{route('quotes.pdf-download',$element->id)."?type=client"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF End Client
                            Pricing</a></li>

                @endif
                <li class="divider"></li>

                {{--Send--}}
                <li><a href="{{route('quotes.send',$element->id)}}"><i class="fa fa-envelope"></i>Send</a></li>
            </ul>
        </div>
    </div>
</div>


@section('content-bottom')
    @parent
    @if($element->validForDealReg())
        @include('projects.my-project.modules.quotes.form.includes.deal-reg-modal')
    @endif
@endsection

@section('js')
    @parent
    <script>
        $('#btnCreateOrderForReseller').click(function () {
            $('#quotesForm #status').append('<option value="Processing">Processing</option>').val('Processing'); //appended the option Processing and status set to Processing
            showAlert("We will contact you shortly to confirm your order.");
            setTimeout(function () {
                $('#quotesSubmitBtn').click();
            }, 3500);
        });
    </script>
@endsection
