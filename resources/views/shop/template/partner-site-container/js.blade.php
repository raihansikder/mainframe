<script src="{{asset('letsbab/shop/js/jquery-3.2.1.min.js')}}"></script>
<script>
    var childUrl = "";
    //var shouldDisableButton = true;

    // get a timestamp for time when post msg received.
    var timeStampMessage = Date.now();

    // Create IE + others compatible event handler
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
    var jsonMessage = {};

    //function to check if url matches with patters for product
    // note: affiliates such are farfetch will have empty url or product url posted only.
    function checkIfUrlMatchesPattern(url,) {
        const urlRegExPartsWhiteList = [
            /\/\/casper.com((\/.*?\/buy\/)|(\/.*\/(pillows|sheets|duvet|nightstand|glow-light|mattress-protector|mattress-foundation|mattresses\/casper.{0,10}|.*-bed.?|.*-bed-frame|.+-mattress.{0,2})\/))/,
            /feelunique\.com\/p\//,
            /athleticpropulsionlabs\.com(?!.*(about|technology))(?!.*(\/merinowoolapparel|-footwear|-apparel|-arrivals|-cleaning|-shoes|\/tops|\/bottoms|\/slides|\/mens)\.html)\/[a-zA-Z0-9_\-]+\/.*([a-zA-Z0-9_\-]+\.html)/,
            /\/product\//,
            /desmondanddempsey\.com\/.+?\/products\//,
            /haven-collective\.com\/.*?products\//,
            /st-roche\.com\/.+?\/products\//,
            /whit-ny\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /soi55lifestyle\.com\/shop\//,
            /bloomandblossom\.com\/products\//,
            /eyeforlondonprints\.com\/product-page\//,
            /cocoandindie\.com\/product\//,
            /costarellos\.com\/shop\/.+\/[a-zA-Z0-9_\-]+/,
            /dinkihuman\.com.*\/products\//,
            /lisavalentinehome.*\/shop\/[a-zA-Z0-9_\-]+/,
            /ponchlin\.com\/shop-1\/[a-zA-Z0-9_\-]+/,
            /selfishmother\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /soi55lifestyle\.com\/shop\/[a-zA-Z0-9_\-]+/,
            /tibaandmarl\.com\/shop\/[a-zA-Z0-9_\-]+/,
            /finnandemma\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /blisslau\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /avery-row\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /bullabaloo\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /elvisandkresse\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /ettaloves\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /fredandnoah\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /littlehotdogwatson\.com\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /littlewildlings\.co\.uk\/.*\/products\/[a-zA-Z0-9_\-]+/,
            /themodernnursery\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /muthahoodgoods\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /neverfullydressed\.co\.uk.*\/products\/[a-zA-Z0-9_\-]+/,
            /omamimini\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /onemamaoneshed\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /quayaustralia\.co.*\/products\/[a-zA-Z0-9_\-]+/,
            /schutz-shoes\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /thebebehive\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /thebrightcompany\.uk.*\/products\/[a-zA-Z0-9_\-]+/,
            /tuttifrutticlothing\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /weststantonstore\.com.*\/products\/[a-zA-Z0-9_\-]+/,
            /farfetch\.com/,
            /boohoo\.com/,
            /boohooman\.com/,
            /prettylittlething\.com/,
            /shopbop\.com/,
            /missguided\.co/,
            /thebodyshop\.com/,
            /newbalance\.co/
        ];
        const isUrlRegExPartsWhiteList = urlRegExPartsWhiteList.some(function (part) {
            return !!url.match(part);
        });

        if (isUrlRegExPartsWhiteList) {
            return true;
        }
    }


    // Listen to message from child window
    eventer(messageEvent, function (e) {
        //console.log(e);
        jsonMessage = JSON.parse(e.data);
        //console.log('message from child:  ',jsonMessage);
        if (jsonMessage.id == '__JS_LB__') {
            //document.getElementById('txtUrl').value = jsonMessage.message;
            if (checkIfUrlMatchesPattern(jsonMessage.message)) {
                //console.log(jsonMessage.message);
                document.querySelector('.lb-recommend').disabled = false;
                childUrl = jsonMessage.message;
            } else {
                document.querySelector('.lb-recommend').disabled = true;
            }
        }

        // capture timestamp when msg received.
        timeStampMessage = Date.now();
    }, false);

    // check for a global varaible for disabling button if script not on all pages
    // and if the user browses to some other page, the button will need to be disabled.
    setInterval(function () {
        var timeStampCurrent = Date.now();

        // if msg is not received for more than 3 seconds, disable the button
        if (timeStampCurrent - timeStampMessage > 3200) {
            document.querySelector('.lb-recommend').disabled = true;
        }
    }, 1500);


    $(".dropdown-item").click(function (event) {
        event.preventDefault();
        console.log($(this).attr('href'));
        $('#lb_store').attr('src', $(this).attr('href'));
    });


    function copyToClipboard(text) {
        var dummy = document.createElement("textarea");
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
    }

    function btnRecClicked() {
        generateRecommendationLink(childUrl);
        return false;
    }


    function generateRecommendationLink(url) {
        //var api_url = "http://localhost/gitrepos/letsbab-server-laravel-iso/public/api/1.0/user/recommendurls";
        //var api_xauth = "00c5f5375de386443d3c3b7694188f4faa2d5da4997e1f6cbeb89cdbdc063309";
        //console.log(url);
        var api_url = "{{env('LB_API_ROOT')}}/user/recommendurls";
        var api_xauth = "{{env('LB_API_XAUTH_TOKEN')}}";
        var client_id = "{{env('LB_API_CLIENT_ID')}}";
        var partner_id = '{{Request::get('partner_id')}}';
        partner_id = partner_id?partner_id:'';
        $.ajax({
            url: api_url,
            type: 'post',
            data: {
                product_url: url,
                partner_id: partner_id
            },
            headers: {
                "X-Auth-Token": api_xauth,
                "client-id": client_id,
                "Authorization": "Bearer {!! $usr_token !!}",
            },
            dataType: 'json',
            success: function (response) {
                //console.info(response.data.short_url_u);
                copyToClipboard(response.data.short_url_u);
                //alert("Recommend url copied to clipboard: \n" + response.data.short_url_u);
            }
        });
    }

    $(document).ready(function () {
        $('.button').click(function () {
            $('#modal-container').removeAttr('class').addClass("five");
            $('body').addClass('modal-active');

        });

        $('#modal-container, .letsbab-btn-sec').click(function (event) {
            event.preventDefault();
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    });


</script>