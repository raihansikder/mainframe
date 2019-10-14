<div class="row">
    @foreach($uploads as $upload)
        <div class="col-md-6 col-sm-6 col-xs-12 filecard">
            <div class="info-box shadow">
                <a href="{{ $upload->downloadUrl(false)}}">
                <span class="info-box-icon">
                    {{--@if(File::exists($upload->absPath()) && $upload->isImage())--}}
                    @if($upload->isImage())
                        <img src="{{ $upload->url}}"/>
                    @else
                        <img src="{{ $upload->extIconPath() }}"/>
                    @endif
                </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ route('uploads.edit', $upload->id) }}">{{$upload->name}}</a></span>
                    @if(File::exists($upload->absPath()))
                        <span class="info-box-text">{{$upload->ext}}
                            <b>{{FileSizeConvert(filesize($upload->absPath()))}}</b></span>
                        <span class="info-box-number">{{FileSizeConvert(filesize($upload->absPath()))}}</span>
                    @endif
                    <div class="pull-right">{!! deleteBtn(route("uploads.destroy",$upload->id),URL::full(),$redirect_on_fail = '', $class='btn btn-xs btn-danger flat', $text='<i class="fa fa-trash"></i>') !!}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>