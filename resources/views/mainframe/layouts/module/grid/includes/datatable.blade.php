<?php
/**
 * Variables
 * @var \App\Mainframe\Features\Datatable\Datatable $datatable
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var array $columns
 * @var \App\Mainframe\Features\Core\ViewProcessor $view
 */
$datatable = $datatable ?? $view->datatable;
$titles = $datatable->titles();
$columnsJson = $datatable->columnsJson();
$ajaxUrl = $datatable->ajaxUrl();

?>
<div class="">
    <table id="{{$datatable->identifier()}}Grid" class="table module-grid table-condensed  dataTable" style="width: 100%">
        <thead class="bg-gray-light">
        <tr>
            @foreach($titles as $title)
                <th>{!! $title !!}</th>
            @endforeach
        </tr>
        </thead>
        {{-- Note: Table body will be added by the dataTable JS --}}
    </table>
</div>

{{-- Section: JS --}}
@section('js')
    @parent
    <script type="text/javascript">
        var table = $('.module-grid').dataTable({
            ajax: "{!! $ajaxUrl !!}",
            columns: [ {!! $columnsJson !!} ],
            processing: true,
            serverSide: true,
            pageLength: {{$datatable->pageLength()}},
            "order": [[0, 'desc']]
        }).fnSetFilteringDelay(2000);
    </script>
@endsection