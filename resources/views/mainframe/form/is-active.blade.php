{{--<div class="clearfix"></div>--}}
{{--@include('form.select-array',['var'=>['name'=>'is_active','label'=>'Enabled', 'options'=>kv(['Yes','No']),'div'=>'col-sm-3']])--}}
<div class="clearfix"></div>
{{-- checkbox code for is_active --}}
@include('form.checkbox',['var'=>['name'=>'is_active','label'=>'Active']])