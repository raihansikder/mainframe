<div id="{{$id}}Modal" aria-labelledby="{{$id}}ModalLabel"
     class="modal fade" tabindex="-1"
     role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{$id}}ModalLabel">
                    @section('header')
                    @show
                </h4>
            </div>

            <div class="modal-body">
                @section('body')
                @show
            </div>

            <div class="modal-footer">
                <div class="btn-group">
                    @section('footer')
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                    @show
                </div>
            </div>

        </div>
    </div>
</div>