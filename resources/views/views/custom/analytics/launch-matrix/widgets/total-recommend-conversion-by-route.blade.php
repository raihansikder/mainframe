<?php
//$from_date = '2019-03-02 00:00:00';
$from_date = (Request::has('date_range_from')) ? (Request::get('date_range_from') . ' 00:00:00') : ('2019-03-02 00:00:00');
$to_date = $yesterday_date . ' 23:59:59';
$recommendation_conversion_by_routes = \App\Classes\Analytics\Analytics::recommendationsAndConversionsByRoutes($from_date, $to_date);
?>
<div class='clearfix'></div>
<div>
    <b>Total Recommendations & Conversions By Categories</b>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th></th>
            <th>Direct</th>
            <th>Affiliate Direct</th>
            <th>Affiliate Indirect</th>
            <th>Total</th>
        </tr>
        </thead>
        <tr>
            <td>Recommendations</td>
            <td>@if(isset($recommendation_conversion_by_routes['Direct']['recommendations'])){{ $recommendation_conversion_by_routes['Direct']['recommendations'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Direct']['recommendations'])){{ $recommendation_conversion_by_routes['Affiliated-Direct']['recommendations'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Indirect']['recommendations'])){{ $recommendation_conversion_by_routes['Affiliated-Indirect']['recommendations'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['total_recommendations'])){{ $recommendation_conversion_by_routes['total_recommendations'] }}@endif</td>
        </tr>
        <tr>
            <td>Recommendations - %age of total</td>
            <td>@if(isset($recommendation_conversion_by_routes['Direct']['recommendation_percentage'])){{ round($recommendation_conversion_by_routes['Direct']['recommendation_percentage']) }}
                %@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Direct']['recommendation_percentage'])){{ round($recommendation_conversion_by_routes['Affiliated-Direct']['recommendation_percentage']) }}
                %@endif
            </td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Indirect']['recommendation_percentage'])){{ round($recommendation_conversion_by_routes['Affiliated-Indirect']['recommendation_percentage']) }}
                %@endif
            </td>
            <td>@if(isset($recommendation_conversion_by_routes['total_recommendation_percentage'])){{ $recommendation_conversion_by_routes['total_recommendation_percentage'] }}
                %@endif</td>
        </tr>
        <tr>
            <td>Conversions</td>
            <td>@if(isset($recommendation_conversion_by_routes['Direct']['conversions'])){{ $recommendation_conversion_by_routes['Direct']['conversions'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Direct']['conversions'])){{ $recommendation_conversion_by_routes['Affiliated-Direct']['conversions'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Indirect']['conversions'])){{ $recommendation_conversion_by_routes['Affiliated-Indirect']['conversions'] }}@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['total_conversions'])){{ $recommendation_conversion_by_routes['total_conversions'] }}@endif</td>
        </tr>
        <tr>
            <td>Conversions rate</td>
            <td>@if(isset($recommendation_conversion_by_routes['Direct']['conversion_rate'])){{ round($recommendation_conversion_by_routes['Direct']['conversion_rate']) }}
                %@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Direct']['conversion_rate'])){{ round($recommendation_conversion_by_routes['Affiliated-Direct']['conversion_rate']) }}
                %@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['Affiliated-Indirect']['conversion_rate'])){{ round($recommendation_conversion_by_routes['Affiliated-Indirect']['conversion_rate']) }}
                %@endif</td>
            <td>@if(isset($recommendation_conversion_by_routes['total_conversions_rate'])){{ round($recommendation_conversion_by_routes['total_conversions_rate']) }}
                %@endif</td>
        </tr>
        <tbody>
        </tbody>
    </table>
</div>