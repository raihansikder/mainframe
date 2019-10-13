@extends('template.app-frame')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area one --}}
                @include('dashboards.admin.widgets.count-cards')
                @include('dashboards.admin.widgets.count-cards-split')
                @include('dashboards.admin.widgets.count-cards-non-split')
                <div class="clearfix"></div>
            </div>
        </div>
    @endif
@endsection

