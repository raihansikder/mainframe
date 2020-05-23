<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
$input = new App\Mainframe\Features\Form\Comment($var, $element ?? null);
?>

{{-- comment div + form --}}
<div class="{{$input->containerClass}}  {{$input->uid}}">

    @if($user->can(['create','update'], $element))

        <div id="{{$input->commentBoxId}}" class="comments-container">
            <form action="{{route('comments.store')}}" method="post" name="{{$input->commentBoxId}}">
                @csrf
                {{-- <input type="hidden" name="ret" value="json"/>--}}
                <input type="hidden" name="tenant_id" value="{{$input->tenantId}}"/>
                <input type="hidden" name="module_id" value="{{$input->moduleId}}"/>
                <input type="hidden" name="element_id" value="{{$input->elementId}}"/>
                <input type="hidden" name="element_uuid" value="{{$input->elementUuid}}"/>
                {{-- <input type="hidden" name="commentable_id" value="{{$input->elementId}}"/>--}}
                {{-- <input type="hidden" name="commentable_type" value="{{$input->commentableType}}"/>--}}
                <input type="hidden" name="type" value="{{$input->type}}"/>
                <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
                <input type="hidden" name="redirect_fail" value="{{URL::full()}}"/>
                @include('form.textarea',['var'=>['name'=>'body','div'=>'col-md-12']])
                {{-- <textarea name="body"></textarea>--}}
                <button type="submit" class="btn btn-default">Save comment</button>
            </form>
        </div>
    @endif

    {{-- commented file list --}}
    @if($input->moduleId && $input->elementId)
        <?php
        /** @var \Illuminate\Database\Eloquent\Builder $query */
        $query = $element->comments();
        if ($input->type) {
            $query->where('type', $input->type);
        }
        $comments = $query->orderBy('created_at', 'DESC')
            ->offset(0)->take($input->limit)
            ->get();
        ?>

        @foreach($comments as $comment)
            <div class="item">
                {{-- <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">--}}

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$comment->created_at->format('H:i')}}</small>
                        {{$comment->creator->name}}
                    </a>
                    {{$comment->body}}
                </p>
            </div>
        @endforeach
    @endif
</div>

{{-- js --}}
@section('js')
    @parent
    @if($user->can(['create','update'], $model))
        <script>
            $('form[name={{$input->commentBoxId}}] textarea[name=body]').empty(); // Clear the comment field
            {{--enableValidation('{{$input->commentBoxId}}'); // Enable Ajax based form validation.--}}
        </script>
    @endif
@endsection

<?php unset($input); ?>


