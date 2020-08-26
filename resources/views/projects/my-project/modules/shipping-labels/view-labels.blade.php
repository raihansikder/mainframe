@if($element->packages)
    @foreach($element['packages'] as $package)
        <img src="data:image/png;base64,{{$package['label']}}" alt=""/>
        @foreach($package['documents'] as $document)
            <img src="data:image/png;base64,{{$document['media']}}" alt=""/>
        @endforeach
    @endforeach
@endif