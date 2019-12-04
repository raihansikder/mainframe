<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var MessageBag $messageBag */

use Illuminate\Support\MessageBag;

/**
 * These vars are passed from \App\Mainframe\Features\Responder\Response::redirect
 * and \App\Mainframe\Features\Responder\Response::with
 * See \App\Mainframe\Features\Responder\Response::viewVars
 */
$responseStatus = $responseStatus ?? session('responseStatus');
$responseMessage = $responseMessage ?? session('responseMessage');

$messageBag = session('messageBag'); // todo: need to show messageBag values


if($messageBag){
    myprint_r($messageBag->toArray());
}

$css = "callout-danger";
if ($responseStatus == 'success') {
    $css = "callout-success";
}

?>


@if($responseStatus || $responseMessage || $errors->any())
    <div class="message-container">
        <div class="callout {{$css}} ajaxMsg errorDiv" id="errorDiv">
            @if($responseStatus)
                <h4>
                    {{ Str::upper($responseStatus) }} :
                    {{ $responseMessage }}
                </h4>
            @endif

            @if ($errors->any())
                {!! implode('<br/>', $errors->all()) !!}
            @endif
        </div>
    </div>
@endif

<?php session()->forget(['status', 'message', 'error']);?>