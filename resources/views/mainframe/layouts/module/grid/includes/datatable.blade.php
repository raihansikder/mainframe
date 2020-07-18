<?php
/**
 * Variables used in this view file.
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var array $columns
 */
?>

<div class="">
    <table id="{{$module->name}}Grid" class="table module-grid  dataTable" style="width: 100%">
        <thead class="bg-gray-light">
        <tr>
            {{-- print the headers/columns --}}
            @foreach($columns as $col)
                <th>{!! $col[2] !!}</th>
            @endforeach
        </tr>
        </thead>
    </table>
</div>

{{-- js --}}
@section('js')
    @parent

    <?php
    $columns_json = '';
    foreach ($columns as $column) {
        $columns_json .= "{ data: '".$column[1]."', name: '".$column[0]."' },";
    }
    ?>

    <script type="text/javascript">
        var table = $('.module-grid').dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route($module->name . '.datatable-json')}}?{!! parse_url(URL::full(), PHP_URL_QUERY) !!}",
            columns: [
                {!! $columns_json !!}
                // { data: 'id', name: 'id' },
                // { data: 'name', name: 'name'},
                // { data: 'user_name', name: 'updater.name' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'is_active', name: 'updated_at' }
            ],
            "order": [[0, 'desc']]
        }).fnSetFilteringDelay(2000);
    </script>
@endsection