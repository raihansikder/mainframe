<?php
/**
 * @version  1.1
 */
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var MessageBag $messageBag */

use Illuminate\Support\MessageBag;


$showAlerts = false;
/**
 * These vars are passed from \App\Mainframe\Features\Responder\Response::redirect
 * and \App\Mainframe\Features\Responder\Response::with
 * See \App\Mainframe\Features\Responder\Response::viewVars
 */


$response = $response ?? session('response');
// $responseStatus = $responseStatus ?? session('responseStatus');
// $responseMessage = $responseMessage ?? session('responseMessage');



$css = "callout-danger";
$textCss = "text-red";
if ($response['status'] == 'success') {
    $css     = "callout-success";
    $textCss = "text-green";
}


if ((isset($response['status'], $response['message'])) || $errors->any()) {
    $showAlerts = true;
}

$messageBag = session('response.messageBag');
$messageBagErrors = null;
if ($messageBag && $messageBag->count()) {
    // echoArray($messageBag->get('error')); // Only get a single key
    // echoArray($messageBag->messages()); // Get all messages
    $messageBagErrors = $messageBag->messages()['errors'] ?? null;
}
?>

@if($showAlerts)
    <div class="message-container">
        <div class="callout ajaxMsg errorDiv" id="errorDiv">
            @if($response['status'])
                <h4 class="{{$textCss}}">
                    {{ ucfirst($response['status']) }}
                </h4>
                {{ $response['message'] }}
            @endif
            <div class="clearfix"></div>

{{--            @if ($errors->any())--}}
{{--                {!! implode('<br/>', $errors->all()) !!}--}}
{{--            @endif--}}

            @if($messageBagErrors)
                 {!! implode('<br/>',Arr::flatten($messageBagErrors)) !!}
            @endif
        </div>
    </div>
@endif

<?php session()->forget(['status', 'message', 'error']); ?>