{!! $html !!}


<style>

    body {
        margin-top: 150px;

    }
    .lb-hover {
        z-index: 99999;
        width: 100%;
        height: 70px;
        position: fixed;
        top: 0;
        background: rgb(177, 154, 236);
        background: -moz-linear-gradient(left, rgba(177, 154, 236, 1) 0%, rgba(132, 202, 233, 1) 100%);
        background: -webkit-linear-gradient(left, rgba(177, 154, 236, 1) 0%, rgba(132, 202, 233, 1) 100%);
        background: linear-gradient(to right, rgba(177, 154, 236, 1) 0%, rgba(132, 202, 233, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b19aec', endColorstr='#84cae9', GradientType=1);
    }

    .lb-hover .lb-logo {
        width: 120px;
        float: left;
        padding: 15px 50px;
    }

    .lb-hover .lb-recommend {
        width: auto;
        float: right;
        text-align: center;
        padding: 10px 30px;
        background: #ffffff;
        color: black;
        margin: 10px 50px;
        border: 0;
        border-radius: 5px;
        font-size: 16px;
    }


</style>


<div class="lb-hover">
    <a href="{{route('shop.index')}}">
        <img class="lb-logo" src="{{asset('letsbab/shop/images/logo.png')}}" alt=" Letsbab">
    </a>

    <button class="lb-recommend">
        Recommend
    </button>

</div>
