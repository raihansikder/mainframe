<?php

use Illuminate\Support\MessageBag;

$responseStatus = $responseStatus ?? session('status');
$responseMessage = $responseMessage ?? session('message');
$messageBag = app(MessageBag::class);

$css = "callout-danger";
if ($responseStatus === 'success') {
    $css = "callout-success";
}
?>

@if($responseStatus || $responseMessage || $errors->any())
    <div class="message-container">
        <div class="callout {{$css}} ajaxMsg errorDiv" id="errorDiv">
            @if($responseStatus)
                <h4>{{ \Illuminate\Support\Str::upper($responseStatus) }}</h4>
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