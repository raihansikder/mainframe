<ol class="breadcrumb">

    <li><a href="{{route('home')}}"></i> Home</a></li>
    @if(isset($currentModule))
        @foreach(breadcrumb($currentModule) as $k=>$v)
            <li><a href="{{$v['url']}}">{{$v['title']}}</a></li>
        @endforeach
    @endif

    {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
    {{--<li><a href="#">Examples</a></li>--}}
    {{--<li class="active">Blank page</li>--}}
</ol>