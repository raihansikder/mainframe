<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var bool $mutableFields
 */

?>

@if($element->hasQuote())
    <a class="btn btn-default" href="{{route('quotes.edit',$element->quote_id)}}">
        <i class="fa fa-angle-left"></i> Quote : {{$element->quote_id}}
    </a>
@endif

@if($element->shippingLabels()->exists())
    @foreach($element->shippingLabels as $shippingLabel)
        @if($shippingLabel->tracking_number)

            <a class="btn btn-default bg-gray-light"
               target="_blank"
               style="border: 1px black"
               href="{{$shippingLabel->fedexTrackingUrl()}}">
                TRACK <i class="fa fa-send"></i> &nbsp; &nbsp;{{ $shippingLabel->tracking_number }}
            </a>
        @endif
    @endforeach
@endif

<div class="btn-group pull-right">
    {{-- Quote --}}

    @if($element->scheduleLink())
        <a class="btn btn-default" href="{{$element->scheduleLink()}}" title="Schedule"><i class="fa fa-clock-o"></i> Schedule</a>
    @endif

    @if($element->canBeCopied())
        <a class="btn btn-default" href="{{route('orders.copy',$element->id)}}" title="Create a copy"><i class="fa fa-copy"></i> Copy</a>
    @endif

    @if($element->deliverables()->exists())
        <a class="btn btn-default" href="{{route('orders.deliverables',$element->id)}}">
            <i class="fa fa-list-ul"></i> Deliverables
        </a>
    @endif



    {{-- Print --}}
    <?php
    $printUrl = route('orders.print-view', $element->id);
    if ($user->ofClient()) $printUrl .= "?type=client";
    ?>
    <a class="btn btn-default" href="{{$printUrl}}" target="_blank"><i class="fa fa-print"></i> Print</a>

    <div class="btn-group">

        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>

        <ul class="dropdown-menu" role="menu">
            {{-- Send --}}
            <li><a href="{{route('orders.send',$element->id)}}"><i class="fa fa-envelope"></i>Send</a></li>

            {{-- PDF --}}
            <?php
            //             $pdfUrl = route('orders.pdf-download', $element->id);
            //             if ($user->ofClient()) $pdfUrl .= "?type=client";
            ?>
            {{--<li><a href="{{$pdfUrl}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF</a></li>--}}

            {{--Client pdf download--}}
            @if(!$user->ofClient())
                {{--<li><a href="{{route('orders.pdf-download',$element->id)}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF</a></li>--}}
                <li><a href="{{route('orders.pdf-download',$element->id)."?type=partner-without-rrp"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF
                        Partner Pricing</a></li>
                <li><a href="{{route('orders.pdf-download',$element->id)."?type=client"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF End Client
                        Pricing</a></li>
            @else

                {{--Non-Client pdf download--}}
                <li><a href="{{route('orders.pdf-download',$element->id)."?type=client"}}" target="_blank"><i class="fa fa-file-pdf-o"></i>PDF End Client
                        Pricing</a></li>

            @endif

            {{-- Dispatch Summary --}}
            <li><a href="{{route('orders.print-view',$element->id)."?type=dispatch-summary"}}" target="_blank">
                    <i class="fa fa-print"></i>Dispatch Summary Print</a></li>

            {{-- Dispatch Summary Print --}}
            <li><a href="{{route('orders.pdf-download',$element->id)."?type=dispatch-summary"}}"
                   target="_blank"><i class="fa fa-file-pdf-o"></i> Dispatch Summary PDF</a></li>
        </ul>
    </div>
</div>
<div class="clearfix margin"></div>