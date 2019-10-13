<?php
$cumulative_recommendations_conversions = \App\Classes\Analytics\Analytics::cumulativeRecommendationAndConversions($from_date, $to_date, $top); // From date, To Date, and number for top getting top number of records
?>
<b>{{ $heading }}</b>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Category</th>
            <th>Recommendations</th>
            <th>Conversions</th>
            <th>Returns</th>
        </tr>
    </thead>
    <tbody>
        @php $total_recommendations = 0; $total_conversions = 0; $total_returns = 0; @endphp
        @foreach($cumulative_recommendations_conversions AS $recommendationsconversions)
        @php $total_recommendations += $recommendationsconversions['recommendation']; $total_conversions += $recommendationsconversions['conversions']; $total_returns += $recommendationsconversions['return_conversion']; @endphp
        <tr>
            <td>{{ $recommendationsconversions['name'] }}</td>
            <td>{{ $recommendationsconversions['route'] }}</td>
            <td>{{ $recommendationsconversions['recommendation'] }}</td>
            <td>{{ $recommendationsconversions['conversions'] }}</td>
            <td>{{ $recommendationsconversions['return_conversion'] }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan=2><b>Total:</b> </td>
            <td>{{ $total_recommendations }}</td>
            <td>{{ $total_conversions }}</td>
            <td>{{ $total_returns }}</td>
        </tr>
    </tbody>
</table>