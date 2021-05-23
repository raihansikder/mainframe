<?php
/**
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \Illuminate\Support\MessageBag $messageBag
 */

/**
 * These vars are passed from \App\Mainframe\Features\Responder\Response::defaultViewVars
 */

$response = $response ?? session('response');
$messageBag = $response['messageBag'] ?? null;

// dd($messageBag);

$css = "callout-danger";
$textCss = "text-red";
if (isset($response['status']) && $response['status'] == 'success') {
    $css = "callout-success";
    $textCss = "text-green";
}

$showAlerts = false;
if ((isset($response['status'], $response['message']))
    || ($errors instanceof \Illuminate\Support\MessageBag && $errors->any())
    || ($messageBag && $messageBag->count())) {
    $showAlerts = true;

    $keys = ['errors', 'messages', 'warnings', 'debug'];

    $alerts = [];
    if (isset($messageBag)) {
        foreach ($keys as $key) {
            if ($messages = $messageBag->messages()[$key] ?? []) {
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $alerts = array_merge($alerts, $messages);
            }
        }
    }
    $alerts = collect(Arr::flatten($alerts))->unique()->toArray();
}


?>
@if($showAlerts)
    <div class="message-container">
        <div class="callout ajaxMsg errorDiv" id="errorDiv">
            @if(isset($response['status']))
                <h4 class="{{$textCss}}">
                    {{ ucfirst($response['status']) }}
                </h4>
                {{ $response['message'] ?? '' }}
            @endif
            <div class="clearfix"></div>

            @if(count($alerts))
                {!! implode('<br/>',$alerts) !!}<br/>
            @elseif ($errors->any())
                {!! implode('<br/>', $errors->all()) !!}
            @endif
        </div>
    </div>
@endif

<?php session()->forget(['status', 'message', 'error']); ?>