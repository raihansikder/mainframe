@extends('projects.my-project.layouts.module.grid.template')

@section('content-top')
    <?php
    $tabs = [
        'Active' => 'Active',
        'Archived' => 'Archived',
        'All' => 'All',
    ];
    $selectedTab = request('tab', 'contact');

    ?>
    <ul class="list-group tabs">
        @foreach($tabs as $tab=>$title)
            <?php
            /** @var string $selectedClass */
            /** @var string $tab */
            $selectedClass = $tab == $selectedTab ? 'selected' : '';
            ?>

            <li class="list-group-item pull-left {{$selectedClass}}" style="border-bottom:0">
                <a href="{{route('quotes.index')}}?state%5B%5D={{$tab}}">{{$title}}</a>
            </li>

        @endforeach
    </ul>
    <div class="clearfix"></div>
    <form action="{{route($module->name.'.index')}}" method="get">
        <?php
        $statuses = kv(\App\Projects\MphMarket\Modules\Quotes\Quote::$statuses) ;
        unset($statuses['Accepted']);
        $states = kv(['Active', 'Archived', 'All']);
        ?>
        @include('form.select-array-multiple',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        @include('form.select-array-multiple',['var'=>['name'=>'state','label'=>'Quote State', 'options'=>$states]])
        <button class="btn btn-default" style="margin-top:20px" type="submit">Filter</button>
        <a class="btn btn-default" style="margin-top:20px; background: white" href="{{route($module->name.'.index')}}">Reset</a>
    </form>
    <div class="clearfix"></div>
@endsection

@section('js')
    @parent
    <script>
        // Activate select2
        $('select[id=status]').select2();
        $('select[id=state]').select2();
    </script>
@endsection