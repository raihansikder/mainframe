<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="deleteForm" method="POST" action="" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="DELETE">
                <input name="_token" type="hidden" value="{{csrf_token()}}">
                <input name="redirect_success" type="hidden"/>
                <input name="redirect_fail" type="hidden"/>
                <input name="ret" type="hidden">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteModalLabel">Confirm Delete</h4>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this item completely?
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id='deleteSubmit' name='delete' class="btn btn-danger pull-right flat">
                            Confirm delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script>
        enableValidation('deleteForm');
    </script>
@endsection