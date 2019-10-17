<?php
/**
 * Variables used in this view file.
 * @var $moduleName           string 'superheroes'
 * @var $currentModule                   Module
 * @var $element               string 'superhero'
 * @var $elementIsEditable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 * @var $grid_columns          array
 */
?>

<div class="table-responsive">
    <table id="{{$moduleName}}Grid" class="table module-grid table table-bordered table-striped dataTable " width="100%">
        <thead>
        <tr>
            {{-- print the headers/columns --}}
            @foreach($grid_columns as $c)
                <th>{!! $c[2] !!}</th>
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
    foreach ($grid_columns as $column) {
        $columns_json .= "{ data: '".$column[1]."', name: '".$column[0]."' },";
    }
    ?>

    <script type="text/javascript">
        var table = $('.module-grid').dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route($moduleName . '.grid')}}?{{parse_url(URL::full(), PHP_URL_QUERY)}}",
            columns: [
                {!! $columns_json !!}
                //                { data: 'id', name: 'id' },
                //                { data: 'name', name: 'name'},
                //                { data: 'user_name', name: 'updater.name' },
                //                { data: 'updated_at', name: 'updated_at' },
                //                { data: 'is_active', name: 'updated_at' }
            ],
            "order": [[0, 'desc']]
        }).fnSetFilteringDelay(2000);
    </script>
@endsection