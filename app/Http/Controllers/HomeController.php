<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Redirect;
use App\Charity;
use App\Partner;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on different user type/group.
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function index() {
        /** @var \App\User $user */
        $user = \Auth::user();

        if ($user->isSuperUser()) {
            return view("dashboards.admin.index");
        }
        if ($user->ofPartner() && $user->partner()->exists()) {
            // If the brand is not valid redirect him
            if ($user->partner->validateModel()->fails()) {
                setError('First, fill in all the necessary information related to your brand');
                return Redirect::route('partners.edit', [$user->partner_id]);
            }
            return view("dashboards.partner.index")->with('partner', $user->partner);

        }
        if ($user->ofCharity()) {
            return view("dashboards.charity.index")->with('charity', $user->charity);
        }
        if ($user->isRecommender()) {
            return redirect(route('shop.index'));
        }
        if ($user->isLBAccounts()) {
            return view("dashboards.lb-accounts.index");
        }
        return view("dashboards.default.index");
    }

    /**
     * View partner dashboard as super admin
     * @param  \App\Partner $partner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function partnerDashboard(Partner $partner) {
        if (!user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }
        return view("dashboards.partner.index")->with('partner', $partner);

    }

    /**
     * View partner dashboard as super admin
     * @param  \App\Charity $charity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function charityDashboard(Charity $charity) {
        if (!user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }
        return view("dashboards.charity.index")->with('charity', $charity);
    }

    /**
     * Use for getting the data for reports
     * @param $report_type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function report_data($report_type) {
        /** @var \App\User $user */
        $user = \Auth::user();
        if ($user->isSuperUser()) {
            if ($report_type == 'users-by-day') {
                $from_date = Request::get('from_date');
                $to_date = Request::get('to_date');
                $user_by_date = [];
                $login_by_date = [];

                if (Request::has('include_test') && Request::has('include_test') == 1) { // Include the Test Users
                    $new_users = DB::table('users')
                        ->whereNull('deleted_at')
                        ->where('group_ids_csv', '8')
                        ->whereBetween('created_at', [$from_date, $to_date])
                        ->select("created_at")->get();

                    $login_users = DB::table('users')
                        ->whereNull('deleted_at')
                        ->where('group_ids_csv', '8')
                        ->whereBetween('first_login_at', [$from_date, $to_date])
                        ->select("first_login_at")->get();
                } else { // Exclude the Test Users
                    $new_users = DB::table('users')
                        ->whereNull('deleted_at')
                        ->where('group_ids_csv', '8')
                        ->where('is_test', 0)
                        ->whereBetween('created_at', [$from_date, $to_date])
                        ->select("created_at")->get();

                    $login_users = DB::table('users')
                        ->whereNull('deleted_at')
                        ->where('group_ids_csv', '8')
                        ->where('is_test', 0)
                        ->whereBetween('first_login_at', [$from_date, $to_date])
                        ->select("first_login_at")->get();
                }
                foreach ($new_users AS $new_user) {
                    $user_by_date[date("Y-m-d", strtotime($new_user->created_at))][] = 1;
                }
                foreach ($login_users AS $login_user) {
                    $login_by_date[date("Y-m-d", strtotime($login_user->first_login_at))][] = 1;
                }
                $fromdate = date("Y-m-d", strtotime($from_date));
                $todate = date("Y-m-d", strtotime($to_date));
                while (strtotime($fromdate) <= strtotime($todate)) {
                    $user_data[$fromdate]['register'] = isset($user_by_date[$fromdate]) ? array_sum($user_by_date[$fromdate]) : 0;
                    $user_data[$fromdate]['login'] = isset($login_by_date[$fromdate]) ? array_sum($login_by_date[$fromdate]) : 0;
                    $fromdate = date("Y-m-d", strtotime("+1 Days", strtotime($fromdate)));
                }
                echo "<pre>";
                print_r($user_data);
                die;
            } else {
                if ($report_type == 'recommend-by-category') {
                    $categories = DB::table('partnercategories')
                        ->whereNull('deleted_at')
                        ->where('is_active', 1)
                        ->get();
                    $category_by_parent = [];
                    $main_category = [];
                    foreach ($categories AS $category) {
                        if ($category->parent_id == 0) {
                            $main_category[$category->id] = $category->name;
                            $category_by_parent[$category->id][] = $category->id;
                        } else {
                            $category_by_parent[$category->parent_id][] = $category->id;
                        }
                    }
                    $from_date = "2019-03-02 00:00:00";
                    $to_date = date("Y-m-d 23:59:59", strtotime("-1 Days"));
                    $recommendation = [];
                    $purchases = [];
                    echo "<pre>";
                    foreach ($category_by_parent AS $key => $categorybyparent) {
                        if (array_key_exists($key, $main_category)) {
                            $brands = DB::table('partners')
                                ->whereNull('deleted_at')
                                ->whereIn('partnercategory_id', $categorybyparent)
                                ->where('is_published', 1)
                                ->where('is_test', 0)
                                ->where('is_active', 1)
                                ->select('id')
                                ->get();
                            $brand_ids = array_column($brands->toArray(), 'id');
                            $recommendation[$key] = DB::table('recommendurls')
                                ->whereNull('deleted_at')
                                ->where('is_shared', 1)
                                ->where('is_test', 0)
                                ->whereIn('partner_id', $brand_ids)
                                ->whereBetween('created_at', [$from_date, $to_date])
                                ->count();
                            $purchases[$key] = DB::table('purchases')
                                ->whereNull('deleted_at')
                                ->where('is_test', 0)
                                ->whereIn('partner_id', $brand_ids)
                                ->whereBetween('created_at', [$from_date, $to_date])
                                ->sum('product_quantity');
                        }
                    }
                    $total_recommendation = array_sum($recommendation);
                    $total_purchase = array_sum($purchases);
                    foreach ($recommendation AS $k => $recommend) {
                        $final_data[$main_category[$k]] = [
                            'recommendation' => $recommend,
                            'recommendation_percentage' => round(($recommend * 100) / $total_recommendation, 2),
                            'purchase' => $purchases[$k],
                            'purchase_percentage' => ($total_purchase) ? (round(($purchases[$k] * 100) / $total_purchase, 2)) : 0,
                            'rate' => ($recommend) ? (round(($purchases[$k] / $recommend) * 100, 2)) : 0
                        ];
                    }
                    echo "<pre>";
                    print_r($final_data);
                    die;
                } else {
                    if ($report_type == 'login-by-country') {
                        $from_date = "2019-03-06 00:00:00";
                        $to_date = date("Y-m-d 23:59:59", strtotime("-1 Days"));
                        if (Request::has('include_test') && Request::has('include_test') == 1) { // Include the Test Users
                            echo "UK Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where('country_id', 187)
                                    ->count();

                            echo "<br/>US Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where('country_id', 200)
                                    ->count();

                            echo "<br/>Other Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where(function ($q) {
                                        $q->whereNotIn('country_id', [187, 200])
                                            ->orWhereNull('country_id');
                                    })
                                    ->count();
                        } else { // Exclude the Test Users
                            echo "UK Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->where('is_test', 0)
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where('country_id', 187)
                                    ->count();

                            echo "<br/>US Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->where('is_test', 0)
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where('country_id', 200)
                                    ->count();

                            echo "<br/>Other Logins: " .
                                \App\User::where('group_ids_csv', '8')
                                    ->whereNull('deleted_at')
                                    ->whereNotNull('first_login_at')
                                    ->where('is_test', 0)
                                    ->whereBetween('first_login_at', [$from_date, $to_date])
                                    ->where(function ($q) {
                                        $q->whereNotIn('country_id', [187, 200])
                                            ->orWhereNull('country_id');
                                    })
                                    ->count();
                        }
                        die;
                    } else {
                        if ($report_type == 'recommend-conversion-by-category') {
                            $from_date = "2019-03-02 00:00:00";
                            $to_date = date("Y-m-d 23:59:59", strtotime("-1 Days"));
                            $recommendations = \App\Recommendurl::leftJoin('partners', 'partners.id', 'recommendurls.partner_id')
                                ->select(DB::Raw('route, COUNT(*) as count'))
                                ->whereBetween('recommendurls.created_at', [$from_date, $to_date])
                                ->where('recommendurls.is_test', 0)
                                ->where('recommendurls.is_shared', 1)
                                ->whereNull('recommendurls.deleted_at')
                                ->where('partners.is_test', 0)
                                ->where('partners.is_active', 1)
                                ->where('partners.is_published', 1)
                                ->whereNull('partners.deleted_at')
                                ->groupBy('route')
                                ->orderBy('route', 'DESC')
                                ->get();
                            $finalData = [];
                            foreach ($recommendations AS $recommendation) {
                                $finalData[$recommendation->route]['recommendations'] = $recommendation->count;
                            }
                            $conversions = \App\Purchase::leftJoin('partners', 'partners.id', 'purchases.partner_id')
                                ->select(DB::Raw('route, SUM(product_quantity) as count'))
                                ->whereBetween('purchases.created_at', [$from_date, $to_date])
                                ->where('purchases.is_test', 0)
                                ->whereNull('purchases.deleted_at')
                                ->where('partners.is_test', 0)
                                ->where('partners.is_active', 1)
                                ->where('partners.is_published', 1)
                                ->whereNull('partners.deleted_at')
                                ->groupBy('route')
                                ->orderBy('route', 'DESC')
                                ->get();
                            foreach ($conversions AS $conversion) {
                                $finalData[$conversion->route]['conversions'] = $conversion->count;
                            }
                            echo "<pre>";
                            print_r($finalData);
                            die;
                        } else {
                            if ($report_type == "analytic-report") {
                                // Create S3Client
                                $client = \Aws\S3\S3Client::factory([
                                    'key' => env('AWS_ACCESS_KEY_ID'),
                                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                                    'region' => env('AWS_DEFAULT_REGION'),
                                    'version' => 'latest'
                                ]);

                                // Register the stream wrapper from a client object
                                $client->registerStreamWrapper();
                                $uploads = \App\Upload::select('id', 'element_id', 'name', 'path')
                                    ->where('module_id', 34)
                                    // ->whereIn('element_id', explode(",", Request::get('upload_id')))
                                    ->whereIn('id', explode(",", Request::get('upload_id')))
                                    ->get();
                                $reportData = [];
                                foreach ($uploads AS $upload) {

                                    if (env('APP_ENV') != 'local') {
                                        $path_factors = explode("/", $upload->path);
                                        $file_path = 's3://yantra-bucket/' . env('APP_ENV') . '/' . end($path_factors);
                                    } else {
                                        $file_path = $upload->dir;
                                    }
                                    if (file_exists($file_path)) {
                                        if (($handle = fopen($file_path, "r")) !== false) {
                                            $row = 0;
                                            while (($data = fgetcsv($handle, 0, ",")) !== false) {
                                                if ($row == 0) {
                                                    $row++;
                                                } else {
                                                    $rowData = [];
                                                    //$data8_exp = explode(";", str_replace(['{', '}', ' '], '', $data[8]));
                                                    $data10_exp = explode(",", str_replace([chr(34), '{', '}', ' '], '', $data[10]));//chr(34) implies double quote
                                                    foreach ($data10_exp AS $data10) {
                                                        $key_val = explode(":", $data10);
                                                        $rowData[$key_val[0]] = $key_val[1];
                                                    }
                                                    $rowData = array_merge($rowData, [
                                                        'datetime' => $data[0],
                                                        'version' => $data[1],
                                                        'device' => (array_key_exists(18, $data)) ? $data[18] : null,//platform
                                                        'device_name' => $data[5],
                                                    ]);
                                                    $reportData[] = $rowData;

                                                }
                                            }
                                        } else {
                                            echo "Not Read";
                                        }
                                    }
                                }
                                $userId = '';
                                $finalData = [];
                                $headings = [
                                    'user_id' => 'UserID',
                                    'datetime' => 'Date & Time Stamp',
                                    'version' => 'Version',
                                    'device' => 'Device',
                                    'timespent' => 'Spent Time'
                                ];
                                if (Request::has('is_test') && Request::get('is_test') == 1) {
                                    $testUsers = [];
                                    $testBrands = [];
                                } else {
                                    // Get Test Users id's
                                    $getTestUsers = DB::table('users')->select('id')->whereNull('is_test')->orWhere('is_test', '1')->get();
                                    $testUsers = array_column($getTestUsers->toArray(), 'id');

                                    // Get Test Brands id's
                                    $getTestBrands = DB::table('partners')->select('id')->whereNull('is_test')->orWhere('is_test', '1')->get();
                                    $testBrands = array_column($getTestBrands->toArray(), 'id');
                                }
                                foreach ($reportData AS $rpData) {
                                    if (!isset($rpData['CurrentTimeStamp'])) {
                                        continue;
                                    }
                                    if (isset($rpData['UserID']) && in_array($rpData['UserID'], $testUsers)) {
                                        continue;
                                    }
                                    if (isset($rpData['BrandID']) && in_array($rpData['BrandID'], $testBrands)) {
                                        continue;
                                    }
                                    if (!isset($rpData['UserID'])) {
                                        $rpData['UserID'] = $rpData['UniqueID'];
                                    }
                                    if ($userId != $rpData['UserID'] && !isset($finalData[$rpData['UserID']])) {
                                        $date_number = number_format($rpData['datetime'], 0, '', '');
                                        $finalData[$rpData['UserID']] = [
                                            'datetime' => date("M d,Y H:i:s", $date_number / 1000),
                                            'version' => $rpData['version'],
                                            'device' => $rpData['device'],
                                            'device_name' => $rpData['device_name'],
                                        ];
                                        // dd(myprint_r($finalData));
                                        if (isset($rpData['CurrentTimeStamp'])) {
                                            $finalData[$rpData['UserID']]['CurrentTimeStamp'] = $rpData['CurrentTimeStamp'];
                                            if (!in_array('Date', $headings)) {
                                                $headings['date'] = 'Date';
                                            }
                                        }

                                        if (isset($rpData['UserName'])) {
                                            $finalData[$rpData['UserID']]['UserName'] = $rpData['UserName'];
                                            if (!in_array('Username', $headings)) {
                                                $headings['username'] = 'Username';
                                            }
                                        }
                                        if (isset($rpData['BrandName'])) {
                                            $finalData[$rpData['UserID']]['Brands'][$rpData['BrandName']][] = $rpData['Time'];
                                            if (!in_array('BrandName', $headings)) {
                                                $headings['brand'] = 'BrandName';
                                            }
                                        } else if (isset($rpData['BrandID'])) {
                                            $finalData[$rpData['UserID']]['Brands'][$rpData['BrandID']][] = $rpData['Time'];
                                            if (!in_array('BrandName', $headings)) {
                                                $headings['brand'] = 'BrandName';
                                            }
                                        } else {
                                            $finalData[$rpData['UserID']]['Time'][] = $rpData['Time'];
                                        }
                                    } else {
                                        if (isset($rpData['BrandName'])) {
                                            $finalData[$rpData['UserID']]['Brands'][$rpData['BrandName']][] = $rpData['Time'];
                                        } else if (isset($rpData['BrandID'])) {
                                            $finalData[$rpData['UserID']]['Brands'][$rpData['BrandID']][] = $rpData['Time'];
                                            if (!in_array('BrandName', $headings)) {
                                                $headings['brand'] = 'BrandName';
                                            }
                                        } else {
                                            $finalData[$rpData['UserID']]['Time'][] = $rpData['Time'];
                                        }
                                    }
                                }
                                $tabularData = [];
                                $rowData = [];
                                foreach ($finalData AS $userId => $fnlData) {
                                    if (isset($fnlData['Brands'])) {
                                        foreach ($fnlData['Brands'] AS $brand => $timespent) {
                                            $rowData = [
                                                'user_id' => $userId,
                                                'datetime' => $fnlData['datetime'],
                                                'version' => $fnlData['version'],
                                                'device' => $fnlData['device_name'],
                                                'brand' => $brand,
                                                'timespent' => gmdate("H:i:s", array_sum($timespent))
                                            ];
                                            if (isset($fnlData['CurrentTimeStamp'])) {
                                                $rowData['date'] = date("M d, Y", $fnlData['CurrentTimeStamp']);
                                            }
                                            if (isset($fnlData['UserName'])) {
                                                $rowData['username'] = $fnlData['UserName'];
                                            }
                                            $tabularData[] = $rowData;
                                        }
                                    }
                                    if (isset($fnlData['Time'])) {
                                        $rowData = [
                                            'user_id' => $userId,
                                            'datetime' => $fnlData['datetime'],
                                            'version' => $fnlData['version'],
                                            'device' => $fnlData['device_name'],
                                            'timespent' => gmdate("H:i:s", array_sum($fnlData['Time']))
                                        ];
                                        if (isset($fnlData['CurrentTimeStamp'])) {
                                            $rowData['date'] = date("M d, Y", $fnlData['CurrentTimeStamp']);
                                        }
                                        if (isset($fnlData['UserName'])) {
                                            $rowData['username'] = $fnlData['UserName'];
                                        }
                                        $tabularData[] = $rowData;
                                    }
                                }
                                if (Request::has("mode") && Request::get("mode") == "download") {
                                    if (Request::has('report_name')) {
                                        $report_name = Request::get('report_name');
                                    } else {
                                        $report_name = "analytic-report";
                                    }
                                    $f = fopen('php://memory', 'w');
                                    foreach ($tabularData as $key => $line) {
                                        fputcsv($f, $line);
                                    }
                                    // reset the file pointer to the start of the file
                                    fseek($f, 0);
                                    // tell the browser it's going to be a csv file
                                    header('Content-Type: application/csv');
                                    // tell the browser we want to save it instead of displaying it
                                    header('Content-Disposition: attachment; filename="' . $report_name . '.csv";');
                                    // make php send the generated csv lines to the browser
                                    fpassthru($f);
                                    die;
                                } else {
                                    $table = "<table border=1><thead></tr>";
                                    foreach ($headings AS $key => $heading) {
                                        $table .= "<th>$heading</th>";
                                    }
                                    $table .= "</tr></thead><tbody>";
                                    foreach ($tabularData AS $tblData) {
                                        $table .= "<tr>";
                                        foreach ($headings AS $key => $heading) {
                                            $table .= "<td>" . (isset($tblData[$key]) ? $tblData[$key] : '') . "</td>";
                                        }
                                        $table .= "</tr>";
                                    }
                                    $table .= "</tbody></table>";
                                    echo $table;
                                    die;
                                }
                            } else {
                                if ($report_type == "daily-recommendation") {
                                    $from_date = Request::get('from_date');
                                    $to_date = Request::get('to_date');
                                    $recommendations = \App\Recommendurl::leftJoin('partners', 'partners.id', 'recommendurls.partner_id')
                                        ->select(DB::Raw('recommendurls.created_at'))
                                        ->whereBetween('recommendurls.created_at', [$from_date, $to_date])
                                        ->where('recommendurls.is_test', 0)
                                        ->where('recommendurls.is_shared', 1)
                                        ->whereNull('recommendurls.deleted_at')
                                        ->where('partners.is_test', 0)
                                        ->where('partners.is_active', 1)
                                        ->where('partners.is_published', 1)
                                        ->whereNull('partners.deleted_at')
                                        ->orderBy('recommendurls.created_at')
                                        ->get();
                                    $recommendation_datewise = [];
                                    foreach ($recommendations AS $recommendation) {
                                        $recommendation_datewise[date("Y-m-d", strtotime($recommendation->created_at))][] = 1;
                                    }
                                    $conversions = \App\Purchase::leftJoin('partners', 'partners.id', 'purchases.partner_id')
                                        ->select(DB::Raw('purchases.created_at, product_quantity'))
                                        ->whereBetween('purchases.created_at', [$from_date, $to_date])
                                        ->where('purchases.is_test', 0)
                                        ->whereNull('purchases.deleted_at')
                                        ->where('partners.is_test', 0)
                                        ->where('partners.is_active', 1)
                                        ->where('partners.is_published', 1)
                                        ->whereNull('partners.deleted_at')
                                        ->orderBy('purchases.created_at')
                                        ->get();

                                    $conversion_datewise = [];
                                    foreach ($conversions AS $conversion) {
                                        $conversion_datewise[date("Y-m-d", strtotime($conversion->created_at))][] = $conversion->product_quantity;
                                    }
                                    $final_data = [];
                                    foreach ($recommendation_datewise AS $date => $recommendationdatewise) {
                                        $final_data[$date]['recommendation'] = array_sum($recommendationdatewise);
                                        $final_data[$date]['purchase'] = isset($conversion_datewise[$date]) ? array_sum($conversion_datewise[$date]) : 0;
                                    }
                                    echo "<pre>";
                                    print_r($final_data);
                                    die;
                                } else {
                                    if ($report_type == "most-recommend-brands") {
                                        $from_date = Request::get("from_date");
                                        $to_date = Request::get("to_date");
                                        $query = \App\Recommendurl::select(DB::Raw('COUNT(*) as count, partner_id'))
                                            ->whereBetween('created_at', [$from_date, $to_date])
                                            ->where('is_test', 0)
                                            ->where('is_shared', 1)
                                            ->whereNull('deleted_at')
                                            ->whereNotNull('partner_id')
                                            ->groupBy('partner_id')
                                            ->orderBy('count', 'DESC');
                                        if (Request::has('topten') && Request::get('topten') == 1) {
                                            $recommendations = $query->take(10)->get();
                                        } else {
                                            $recommendations = $query->get();
                                        }
                                        $partner_ids = array_column($recommendations->toArray(), 'partner_id');
                                        $conversions = \App\Purchase::select(DB::Raw('SUM(product_quantity) as count, partner_id'))
                                            ->whereBetween('created_at', [$from_date, $to_date])
                                            ->where('is_test', 0)
                                            ->whereNull('deleted_at')
                                            ->whereIn('partner_id', $partner_ids)
                                            ->groupBy('partner_id')
                                            ->get();
                                        $conversion_by_brand = [];
                                        foreach ($conversions AS $conversion) {
                                            $conversion_by_brand[$conversion->partner_id] = $conversion->count;
                                        }
                                        $partners = \App\Partner::select("id", "name", "partnercategory_name", "partnercategory_id", "route")
                                            ->where("is_test", 0)
                                            ->whereNull("deleted_at")
                                            ->whereIn("id", $partner_ids)
                                            ->get();
                                        $partner_by_id = [];
                                        foreach ($partners AS $partner) {
                                            $partner_by_id[$partner->id] = [
                                                'name' => $partner->name,
                                                'route' => $partner->route,
                                                'category' => $partner->partnercategory_name
                                            ];
                                        }
                                        $final_data = [];
                                        $final_data[] = [
                                            'name' => 'Brand Name',
                                            'route' => 'Category',
                                            'recommendation' => 'Recommendation',
                                            'conversion' => 'Conversions'
                                        ];
                                        foreach ($recommendations AS $recommendation) {
                                            $final_data[] = [
                                                'name' => isset($partner_by_id[$recommendation->partner_id]['name']) ? $partner_by_id[$recommendation->partner_id]['name'] : '',
                                                'route' => isset($partner_by_id[$recommendation->partner_id]['route']) ? $partner_by_id[$recommendation->partner_id]['route'] : '',
                                                'recommendation' => $recommendation->count,
                                                'conversions' => isset($conversion_by_brand[$recommendation->partner_id]) ? $conversion_by_brand[$recommendation->partner_id] : 0,
                                            ];
                                        }
                                        $report_name = "most_recommend_brands";

                                        $f = fopen('php://memory', 'w');
                                        foreach ($final_data as $key => $line) {
                                            fputcsv($f, $line);
                                        }
                                        // reset the file pointer to the start of the file
                                        fseek($f, 0);
                                        // tell the browser it's going to be a csv file
                                        header('Content-Type: application/csv');
                                        // tell the browser we want to save it instead of displaying it
                                        header('Content-Disposition: attachment; filename="' . $report_name . '.csv";');
                                        // make php send the generated csv lines to the browser
                                        fpassthru($f);
                                        die;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect("/");
    }
}
