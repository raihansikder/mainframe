@if($element->isUpdating() && $element->packages)
    <h3 class="pull-left">Print Labels</h3>
    <div class="clearfix"></div>
    <a class="pull-left t" target="_blank" href="{{route('shipping-labels.view.labels',$element->id)}}">View all labels</a>
    <div class="clearfix margin"></div>
    @foreach($element['packages'] as $package)
        <img src="data:image/png;base64,{{$package['label']}}" alt="" class="shadow col-md-4"/>
        @foreach($package['documents'] as $document)
            <img src="data:image/png;base64,{{$document['media']}}" alt="" class="shadow col-md-4"/>
        @endforeach
    @endforeach
@endif