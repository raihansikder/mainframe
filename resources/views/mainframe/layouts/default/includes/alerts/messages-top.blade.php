<?php
/**
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \Illuminate\Support\MessageBag $messageBag
 */

/**
 * These vars are passed from \App\Mainframe\Features\Responder\Response::defaultViewVars
 */
$response = $response ?? session('response');
$messageBag = $response['messageBag'];

$css = "callout-danger";
$textCss = "text-red";
if ($response['status'] == 'success') {
    $css     = "callout-success";
    $textCss = "text-green";
}

$showAlerts = false;
if ((isset($response['status'], $response['message']))
    || $errors->any()
    || ($messageBag && $messageBag->count())) {
    $showAlerts = true;
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

            @if(isset($messageBag))
                <?php $keys = ['errors', 'messages', 'warnings', 'debug']; ?>
                @foreach($keys as $key)
                    @if($messages = $messageBag->messages()[$key] ?? null)
                        {!! implode('<br/>',Arr::flatten($messages)) !!}<br/>
                    @endif
                @endforeach
            @elseif ($errors->any())
                {!! implode('<br/>', $errors->all()) !!}
            @endif
        </div>
    </div>
@endif

<?php session()->forget(['status', 'message', 'error']); ?>