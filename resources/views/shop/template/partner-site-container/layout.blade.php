<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LetsBab Brands :: {!! $urlDecoded !!}</title>

    @include('shop.template.partner-site-container.css')


</head>
<body style="margin:0;padding:0;overflow:hidden">

<header class="header">
    <a href="{{route('shop.index')}}"><img src="{{asset('letsbab/shop/images/logo.png')}}" alt=" Letsbab"></a>
    <div class="col-sm3" style="float:right">
        <button class="lb-recommend button" disabled="disabled" onclick="btnRecClicked();" id="lbBtnRecommend">Recommend</button>
    </div>
</header>
@php
$urlParam = Request::get('url');
$partnerId = Request::get('partner_id');

// if store needs to be handled internally then it needs to be routed to shop.affiliate route
if($partner->display_store_internally){
    $urlDecoded = route('shop.affiliate') . "?url=$urlParam&partner_id=$partnerId";
    Debugbar::info($urlDecoded);
}
/*
if (strstr($urlDecoded, 'farfetch'))                                                // farfetch.com
        $urlDecoded = route('shop.affiliate') . "?url=farfetch.com";                
if (strstr($urlDecoded, 'awin1.com/cread.php?s=2350366&v=2319&q=145623&r=568195'))  // boohoo.com
        $urlDecoded = route('shop.affiliate') . "?url=boohoo.com";
if (strstr($urlDecoded, 'awin1.com/cread.php?s=683965&v=7009&q=293133&r=568195'))   // boohooman.com
        $urlDecoded = route('shop.affiliate') . "?url=boohooman.com";
if (strstr($urlDecoded, 'awin1.com/cread.php?s=231188&v=2872&q=114376&r=568195'))   // missguided.co.uk
        $urlDecoded = route('shop.affiliate') . "?url=missguided.co.uk";
if (strstr($urlDecoded, 'click.linksynergy.com/fs-bin/click?id=*WoBJxZ6Yjk&offerid=654258.10002895&subid=0&type=4')) //thebodyshop.com
        $urlDecoded = route('shop.affiliate') . "?url=thebodyshop.com";
if (strstr($urlDecoded, 'awin1.com/cread.php?s=2361634&v=5577&q=353853&r=568195'))   // prettylittlething.com
        $urlDecoded = route('shop.affiliate') . "?url=prettylittlething.com";        
        

if (strstr($urlDecoded, 'click.linksynergy.com/fs-bin/click?id=UoEVnMz9Ix4&offerid=504179.137&subid=0&type=4'))   // shopbop.com
        $urlDecoded = route('shop.affiliate') . "?url=shopbop.com";

if (strstr($urlDecoded, 'hellofresh.co'))   // hellofresh.co.uk
        $urlDecoded = route('shop.affiliate') . "?url=hellofresh.co.uk";
        
if (strstr($urlDecoded, 'awin1.com/cread.php?s=2013371&v=6533&q=318679&r=568195'))   // newbalance.co.uk
        $urlDecoded = route('shop.affiliate') . "?url=newbalance.co.uk";
if (strstr($urlDecoded, 'awin1.com/cread.php?s=2369096&v=7822&q=337066&r=568195'))   // casper
        $urlDecoded = route('shop.affiliate') . "?url=casper.com";                        
*/
@endphp

<iframe id="lb_store" src="{!! $urlDecoded !!}" frameborder="0" width="100%" height="100%" class="store-iframe"></iframe> 

<div id="modal-container">
    <div class="modal-background">
        <div class="modal">
            <div class="letsbab-pop-sec">
                <div class="letsbab-pop-content">
                    <div class="letsbab-logo"><img src="{{asset('letsbab/shop/images/logo.png')}}"></div>

                    <div class="letsbab-sub-heading">
                        <h2>Link is ready to share...</h2>
                        <p>Your link has copied to the clipboard. You can share this link anywhere and with anyone you like!</p>
                    </div>
                    <div class="letsbab-btn-sec">
                        <a href="letsbab://letsbab.co/Gallery" class="letsbab-accept-btn letsbab-remove-download">LetsShare</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('shop.template.partner-site-container.js')
</body>
</html>