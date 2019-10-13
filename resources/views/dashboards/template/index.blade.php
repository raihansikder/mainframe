@extends('template.app-frame')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area one --}}
                @include('dashboards.template.widgets.count-cards')
                <div class="clearfix"></div>
                <div id="area-2"  class="col-md-6 pull-left no-padding-l">
                    area-2
                </div>
                <div id="area-3" class="col-md-6 pull-left no-padding-l">
                    area-3
                </div>
            </div>
            <div id="area-4" class="col-md-3 pull-left no-padding-l">
                area-4
            </div>
            <div id="area-5" class="col-md-3 pull-left no-padding-l">
                area-5
            </div>
        </div>
    @endif
@endsection

