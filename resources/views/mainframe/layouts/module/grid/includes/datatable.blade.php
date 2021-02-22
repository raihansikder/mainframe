<?php
/**
 * Variables used in this view file.
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var array $columns
 * @var \App\Mainframe\Features\Core\ViewProcessor $view
 */
$titles = $view->datatable->titles();
$columnsJson = $view->datatable->columnsJson();
$ajaxUrl = $view->datatable->ajaxUrl();
?>

<div class="">
    <table id="{{$module->name}}Grid" class="table module-grid  dataTable" style="width: 100%">
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
            ajax: "{{$ajaxUrl}}",
            columns: [ {!! $columnsJson !!} ],
            processing: true,
            serverSide: true,
            "order": [[0, 'desc']]
        }).fnSetFilteringDelay(2000);
    </script>
@endsection