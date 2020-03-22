<?php
/** @var \App\Mainframe\Modules\Modules\Module $module */
/** @var \App\Mainframe\Modules\Uploads\Upload $upload */
/** @var \App\Mainframe\Modules\Uploads\Upload[] $uploads */
/** @var \App\Mainframe\Modules\SuperHeroes\SuperHero $element */

$uploads = $uploads ?: [];
?>

<div class="row">
    @foreach($uploads as $upload)
        <div class="col-md-6 col-sm-6 col-xs-12 filecard">
            <div class="info-box shadow">
                <a href="{{$upload->downloadUrl(false)}}">
                <span class="info-box-icon">
                    {{--@if(File::exists($upload->absPath()) && $upload->isImage())--}}
                    @if($upload->isImage())
                        <img src="{{$upload->url}}" alt="{{$upload->name}}"/>
                    @else
                        <img src="{{$upload->extIconPath()}}" alt="{{$upload->name}}"/>
                    @endif
                </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ route('uploads.edit', $upload->id) }}">{{$upload->name}}</a></span>
                    @if(File::exists($upload->absPath()))
                        <span class="info-box-text">{{$upload->ext}}
                            <b>{{convertFileSize(filesize($upload->absPath()))}}</b></span>
                        <span class="info-box-number">{{convertFileSize(filesize($upload->absPath()))}}</span>
                    @endif
                    <div class="pull-right">
                        @if($editable)
                            <?php
                            $var = [
                                'route' => route("uploads.destroy", $upload->id),
                                'redirect_success' => URL::full(),
                                'params' => [
                                    'class' => 'btn btn-xs btn-danger flat',
                                ],
                                'value' => '<i class="fa fa-trash"></i>',
                            ];
                            ?>
                            @include('form.delete-button',['var'=>$var])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
