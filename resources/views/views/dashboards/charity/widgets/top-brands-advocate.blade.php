{{-- Original widget template : resources/views/dashboards/template/widgets/chart-area-donut.blade.php --}}
<?php
/** @var \App\Purchase $purchases */
/** @var \App\Charity $charity */
$title = "Top Brand Advocates";
use App\Purchase;
$get_top_brands = \App\Purchase::remember(cacheTime('short'))
    ->select('partner_name', DB::raw('COUNT(*) as count'))
    ->where('is_test', 0)
    ->whereNotNull('partner_name')
    ->where('charity_id', $charity->id)
    ->take(5);
if(Request::get('date_range_from') != "" && Request::get('date_range_to') != ""){
    $start_date = date('Y-m-d 00:00:00',strtotime(Request::get('date_range_from')));
    $end_date   = date('Y-m-d 23:59:59',strtotime(Request::get('date_range_to')));
    $get_top_brands->whereBetween('created_at', [$start_date, $end_date]);
}
$top_brands = $get_top_brands->groupBy('partner_name')
        ->orderBy('count', 'DESC')
        ->get();
?>
<div class='clearfix'></div>
<div class="">
    <table id="tbl_purchases_not_invoiced" class="datatable-min table module-grid table table-bordered table-striped"
           width="100%" data-order="[]">
        <thead>
        <tr>
            <th>{{ $title }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($top_brands as $top_brand)
            <?php
            /** @var \App\Purchase $purchase */
            ?>
            <tr>
                <td>
                    {{ $top_brand->partner_name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
