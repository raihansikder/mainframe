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

$messageBag = app(MessageBag::class); // todo: need to show messageBag values

$css = "callout-danger";
if ($responseStatus == 'success') {
    $css = "callout-success";
}

?>


@if($responseStatus || $responseMessage || $errors->any())
    <div class="message-container">
        <div class="callout {{$css}} ajaxMsg errorDiv" id="errorDiv">
            @if($responseStatus)
                <h4>{{ Str::upper($responseStatus) }}</h4>
            @endif
            @if($responseMessage)
                {{ $responseMessage }}
            @endif
            @if ($errors->any())
                <br/>{!! implode('<br/>', $errors->all()) !!}
            @endif
        </div>
    </div>
@endif

<?php session()->forget(['status', 'message', 'error']);?>