<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

// include_once('mainframe/modules.php'); // Later when we move routes to a different directory

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Module;
use App\Modulegroup;

Auth::routes(['verify' => true]);
Route::get('change-email/{verification_code}', 'EmailchangesController@changeEmailVerify')->name('change-email-verify');

Route::get('register-partner', 'Auth\RegisterPartnerController@showRegistrationForm')->name('register.partner');
Route::post('register-partner', 'Auth\RegisterPartnerController@register')->name('post.partner-registration');

Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);

/*
 *
 * Isotone Resources / RESTful routes.
 * ***************************************************************************
 * Resources automatically generates index, create, store, show, edit, update,
 * destroy routes. Based on the modules table all these routes are created.
 * In addition to above we also need a 'restore' as we have soft delete
 * enabled for our solution.
 *
 * prefix    :
 * filter    : before [auth] - only authenticated users can access these routes
 *        : before [resource.route.permission.check] - checks permission using Sentry.
 *****************************************************************************/
$modules = dbTableExists('modules') ? Module::names() : []; // dbTableExists() was causing issue.
$modulegroups = dbTableExists('modulegroups') ? Modulegroup::names() : [];

Route::middleware(['auth'])->group(function () use ($modules, $modulegroups) {
    Route::get('change-email', 'EmailchangesController@showChangeEmailForm')->name('change-email');
    Route::post('change-email', 'EmailchangesController@changeEmail')->name('post.change-email');

    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
    # default routes for all modules
    foreach ($modules as $module) {
        $Controller = ucfirst($module)."Controller";
        Route:: get($module."/{".Str::singular($module)."}/restore", $Controller."@restore")->name($module.'.restore');
        Route:: get($module."/grid", $Controller."@grid")->name($module.'.grid');
        Route:: get($module."/list/json", $Controller."@list")->name($module.'.list-json');
        Route:: get($module."/report", $Controller."@report")->name($module.'.report');
        Route:: get($module."/{".Str::singular($module)."}/changes", $Controller."@changes")->name($module.'.changes');
        Route::resource($module, $Controller);
    }

    # default routes for all modulegroups
    foreach ($modulegroups as $modulegroup) {
        Route::get($modulegroup, 'ModulegroupsController@modulegroupIndex')->name($modulegroup.'.index');
    }

    # route for updating an existing upload file
    Route::post('update_upload', 'UploadsController@updateExistingUpload')->name('uploads.update_last_upload');
    /**
     * Generate download request of a file.
     * Files are stored in a physical file system. To hide the urls from the user following URL generates a download
     * request that initiates download of the file matching the uuid.
     */
    Route::get('download/{uuid}', 'UploadsController@download')->name('get.download');

    # Individual/Current partner routes
    Route::get('partner/edit', 'PartnersController@editMyPartner')->name('edit-partner');
    Route::get('users/{user}/invoices', 'UsersController@invoices')->name('user-invoices');
    Route::get('users/{user}/create-transferwise-account', 'UsersController@createTransferwiseAccount')->name('create-user-transferwise-account');
    Route::get('users/{user}/create-sendbird-account', 'UsersController@createSendbirdAccount')->name('create-user-sendbird-account');

    # Show charity invoices.
    Route::get('charities/{charity}/invoices', 'CharitiesController@invoices')->name('get.charities-invoices');

    # Show partner invoices.
    Route::get('partners/{partner}/invoices', 'PartnersController@invoices')->name('get.partners-invoices');
    Route::get('download-conversion-excel-of-partner', 'PurchasesController@partnerExcelDownload')->name('download-conversion-excel');
    Route::post('invoices/partner', 'InvoicesController@storePartnerInvoices')->name('invoices.store-partner');
    Route::get('partners-integration', 'PartnersController@integration')->name('partners.integration');

    # Push to xero
    Route::post('invoices/{invoice}/push-to-xero', 'InvoicesController@pushToXero')->name('post.invoices.push-to-xero');

    # Individual/Current partner routes
    Route::get('custom-report/bankline-export', 'InvoicesController@reportBanklineExport')->name('invoices.report-bankline-export');

    Route::get('partners/{partner}/dashboard', 'HomeController@partnerDashboard')->name('admin.partner-dashboard');
    Route::get('charities/{charity}/dashboard', 'HomeController@charityDashboard')->name('admin.charity-dashboard');
    Route::get('recommendurls/{recommendurl}/mock-visit', 'RecommendurlsController@mockVisit')->name('admin.recommendurl-mock-visit');
    Route::get('purchases/{purchase}/send-notification', 'PurchasesController@sendNotification')->name('purchase.send-notification');

    Route::get('verification/bulk-resend', 'Auth\VerificationController@bulkResend')->name('bulk-resend');
    Route::post('verification/bulk-resend', 'Auth\VerificationController@postBulkResend')->name('post-bulk-resend');

    Route::prefix('analytics')->middleware(['ret.json'])->group(function () {
        Route::get('launch-matrix/summary', 'AnalyticsController@launchMatrixSummary')->name('launch-matrix.summary');
        Route::get('launch-matrix/recommendation-conversion-details', 'AnalyticsController@recommendationConversionDetails')
            ->name('launch-matrix.recommendation-conversion-details');
        Route::get('launch-matrix/new-users', 'AnalyticsController@launchMatrixNewUsers')->name('launch-matrix.new-users');
        Route::get('launch-matrix/cumulative-registrations-logins', 'AnalyticsController@cumulativeRegistrationsLogins')
            ->name('launch-matrix.cumulative-registrations-logins');
    });

    /**
     * Data migration routes
     */
    // Route::get('migrate/partnercategories', 'TableMigrationController@migratePartnercategories')->name('migrate.partnercategories');
    //Route::get('migrate/partners', 'TableMigrationController@migratePartners')->name('migrate.partners');
    // Route::get('migrate/charities', 'TableMigrationController@migrateCharities')->name('migrate.charities');
    Route::get('migrate/users', 'TableMigrationController@migrateUsers')->name('migrate.users');
    // Route::get('migrate/recommendurls/{start}', 'TableMigrationController@migrateRecommendUrls')->name('migrate.recommendurls');
    // Route::get('migrate/beacons', 'TableMigrationController@migrateBeacons')->name('migrate.beacons');
    // Route::get('migrate/conversionrates', 'TableMigrationController@migrateConversionRates')->name('migrate.conversionrates');
    // Route::get('migrate/charityselections', 'TableMigrationController@migrateCharitySelections')->name('migrate.charityselections');
    // Route::get('migrate/pushnotifications', 'TableMigrationController@migratePushNotifications')->name('migrate.pushnotifications');
    // Route::get('migrate/purchases', 'TableMigrationController@migratePurchases')->name('migrate.purchases');
    Route::get('migrate/updaterecommendcharitypartner', 'TableMigrationController@updateRecommendCharityPartner')
        ->name('migrate.updaterecommendcharitypartner');
    Route::get('migrate/updatepurchasescharitypartner', 'TableMigrationController@updatePurchasesCharityPartner')
        ->name('migrate.updatepurchasescharitypartner');
});

// Redirection
Route::get('u/{short_code}', 'RecommendurlsController@redirectU')->name('recommendurls.redirect-u');
Route::get('m/{short_code}', 'RecommendurlsController@redirectM')->name('recommendurls.redirect-m');

Route::get('link-expired', 'MiscController@showLinkExpiredUI')->name('misc.link-expired');
Route::get('test', 'MiscController@test')->name('misc.test');
Route::get('update-user-country', 'MiscController@updateUserCountry')->name('misc.update-user-country');

Route::get('transferwise/profile', 'MiscController@transferwiseProfile')->name('misc.transferwise-profile');
Route::get('transferwise/quotes', 'MiscController@transferwiseQuote')->name('misc.transferwise-quotes');

/**
 * Show users charity settings and store
 * These are added after apple submission feedback.
 */
Route::get('user-charity-settings', 'CharityselectionsController@getUserSettings')->name('users.charity-settings');
Route::post('user-charity-settings', 'CharityselectionsController@postUserSettings')->name('post.users.charity-settings');
/**
 * Use for dummy report
 */
Route::get('report-data/{report_type}', 'HomeController@report_data');
Route::get('tracker/1.0', 'TrackerController@load')->name('tracker');

Route::get('test/read-branch-data', 'MiscController@readBranchData')->name('test.read-branch-data');

/**
 * Web app routes
 ***********************************/
Route::prefix('web')->group(function () {
    Route::get('register', 'Shop\ShopController@register')->name('shop.register');
    Route::get('login', 'Shop\ShopController@login')->name('shop.login');
    Route::get('logout', 'Shop\ShopController@logout')->name('shop.logout');

    Route::get('password/reset', 'Shop\Auth\ForgotPasswordController@showLinkRequestForm')->name('shop.password.request');
    // Route::post('password/email', 'Shop\Auth\ForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
    // Route::get('password/reset/{token}', 'Shop\Auth\ResetPasswordController@showResetForm')->name('shop.password.reset');
    // Route::post('password/reset', 'Shop\Auth\ResetPasswordController@reset')->name('shop.password.update');

    Route::get('/', 'Shop\ShopController@index')->name('shop.index');
    Route::get('category/{id}', 'Shop\ShopController@category')->name('shop.category');
    Route::get('search', 'Shop\ShopController@search')->name('shop.search');

    // Route::get('site', 'Shop\ShopController@site')->name('shop.site');
    Route::get('partner-store', 'Shop\ShopController@showPartnerStore')->name('shop.partner-store');

    Route::get('user/activities', 'Shop\ShopController@userActivities')->name('shop.user.activities'); //lets-review
    Route::get('user/charity-settings', 'Shop\ShopController@userCharitySettings')->name('shop.user.charity-settings'); //lets-share

    Route::get('user/notifications', 'Shop\ShopController@userNotifications')->name('shop.user.notifications');
    Route::post('user/notifications/delete-all', 'Shop\ShopController@userNotificationsDeleteAll')->name('shop.user.notifications-delete-all');

    Route::get('user/notification-settings', 'Shop\ShopController@userNotificationSettings')->name('shop.user.notifications-settings');

    Route::get('user/preference', 'Shop\ShopController@userPreference')->name('shop.user.preference');
    Route::get('user/profile', 'Shop\ShopController@userProfile')->name('shop.user.profile');
    Route::get('user/total-babs', 'Shop\ShopController@userTotalBabs')->name('shop.user.total-babs');
    Route::get('user/total-donated', 'Shop\ShopController@userTotalDonated')->name('shop.user.total-donated');
    Route::get('user/total-earnings', 'Shop\ShopController@userTotalEarnings')->name('shop.user.total-earnings');
    Route::get('user/total-shared', 'Shop\ShopController@userTotalShared')->name('shop.user.total-shared');
    Route:: get("partnercategories/list/options", "PartnercategoriesController@list")->name('partnercategories.list-options');

    //social-login
    Route::get('login/{provider}', 'Shop\ShopController@redirectToProvider')->name('login.provider');
    Route::get('login/{provider}/callback', 'Shop\ShopController@handleProviderCallback')->name('login.provider.callback');

    // routes for affiliates setup locally, pass affiliate store url with url= param
    Route::get('affiliate', 'Shop\ShopController@affiliate')->name('shop.affiliate');

});
/****** Web app routes *************/

