<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::get('destroy', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('user', 'UserController');

Route::get('search-user', 'RoleReportController@searchUser');
Route::resource('report','ReportController');

Route::resource('role','RoleController');

Route::resource('rolereport','RoleReportController');

//Route::resource('roleuser','RoleUserController');

Route::resource('wilayah','WilayahController');
Route::resource('cluster','ClusterController');

// User Log
Route::resource('userlog','UserlogController');
//Route::get('/export_excel', 'UserlogController@export_excel')->name('export_excel');
Route::post('/export_excel', 'UserlogController@export_excel')->name('export_excel');

// dept acq
Route::resource('nbot','Acquition\nbotController');
Route::resource('Embed/nbot','Acquition\EmbednbotController');
Route::resource('pvt','Acquition\pvtController');
Route::resource('Embed/pvt','Acquition\EmbedpvtController');
Route::resource('profilebooking','Acquition\profilebookingController');
Route::resource('Embed/profilebooking','Acquition\EmbedprofilebookingController');
Route::resource('bq','Acquition\bqController');
Route::resource('Embed/bq','Acquition\EmbedbqController');
Route::resource('kkh','Acquition\kkhController');
Route::resource('Embed/kkh','Acquition\EmbedkkhController');
Route::resource('lko','Acquition\lkoController');
Route::resource('proyeksi','Acquition\proyeksiController');
Route::resource('Embed/proyeksi','Acquition\EmbedproyeksiController');

// dept BOS

Route::resource('ARbooking','BOS\ARbookingController');
Route::resource('Embed/ARbooking','BOS\EmbedARbookingController');
Route::resource('ARexclude','BOS\ARexcludeController');
Route::resource('Embed/ARexclude','BOS\EmbedARexcludeController');
Route::resource('ARbookingrt','BOS\ARbookingrtController');
Route::resource('Embed/ARbookingrt','BOS\EmbedARbookingrtController');
Route::resource('DailyReport','BOS\DailyReportController');
Route::resource('Embed/DailyReport','BOS\EmbedDailyReportController');
Route::resource('RiskIndikator','BOS\RiskIndikatorController');
Route::resource('Embed/RRPKBJBooking','BOS\EmbedRRPKBJBookingController');
Route::resource('kkm','BOS\KKManagementController');
Route::resource('Embed/kkm','BOS\EmbedKKManagementController');
Route::resource('ppri','BOS\ppriController');
Route::resource('Embed/ppri','BOS\EmbedppriController');
Route::resource('BookingUnit','BOS\BookingUnitController');
Route::resource('Inventory','BOS\InventoryController'); // navigasi inventory BJ
Route::resource('Embed/Inventory','BOS\EmbedInventoryController');
Route::resource('RRPKBJBooking','BOS\RRPKBJBookingController');
Route::resource('MPP','BOS\MPPController');
Route::resource('TurnOver','BOS\TurnOverController');
Route::resource('CompareSaldoBank','BOS\CompareSaldoBankController');
Route::resource('RIJabar1','BOS\RIJabar1Controller');
Route::resource('RBUJabar1','BOS\RBUJabar1Controller');
Route::resource('RIJabar2','BOS\RIJabar2Controller');
Route::resource('RBUJabar2','BOS\RBUJabar2Controller');
Route::resource('RIJabar3','BOS\RIJabar3Controller');
Route::resource('RBUJabar3','BOS\RBUJabar3Controller');
Route::resource('RIJabar4','BOS\RIJabar4Controller');
Route::resource('RBUJabar4','BOS\RBUJabar4Controller');



// dept collection
Route::resource('ARPerformance','Collection\ARPerformanceController');
Route::resource('Embed/ARPerformance','Collection\EmbedARPerformanceController');
Route::resource('CollectionNavigation','Collection\CollectionNavigationController');
Route::resource('Embed/CollectionNavigation','Collection\EmbedCollectionNavigationController');
Route::resource('CollectionTrend','Collection\CollectionTrendController');
Route::resource('Embed/CollectionTrend','Collection\EmbedCollectionTrendController');
Route::resource('ARPerformanceJabar1','Collection\ARPerformanceJabar1Controller');
Route::resource('CollectionNavigationJabar1','Collection\CollectionNavigationJabar1Controller');
Route::resource('CollectionTrendJabar1','Collection\CollectionTrendJabar1Controller');
Route::resource('ARPerformanceJabar2','Collection\ARPerformanceJabar2Controller');
Route::resource('CollectionNavigationJabar2','Collection\CollectionNavigationJabar2Controller');
Route::resource('CollectionTrendJabar2','Collection\CollectionTrendJabar2Controller');
Route::resource('ARPerformanceJabar3','Collection\ARPerformanceJabar3Controller');
Route::resource('CollectionNavigationJabar3','Collection\CollectionNavigationJabar3Controller');
Route::resource('CollectionTrendJabar3','Collection\CollectionTrendJabar3Controller');
Route::resource('ARPerformanceJabar4','Collection\ARPerformanceJabar4Controller');
Route::resource('CollectionNavigationJabar4','Collection\CollectionNavigationJabar4Controller');
Route::resource('CollectionTrendJabar4','Collection\CollectionTrendJabar4Controller');

// dept HRD
Route::resource('MutasiKaryawan','HRD\MutasiKaryawanController');
Route::resource('Embed/TurnOver','HRD\EmbedMutasiKaryawanController');

// dept Recovery
Route::resource('Rppri','Recovery\RppriController');
Route::resource('Embed/Rppri','Recovery\EmbedRppriController');

Route::resource('Rppriclosing','Recovery\RppriclosingController');
Route::resource('Embed/Rppriclosing','Recovery\EmbedRppriclosingController');

//Route::resource('RppriJabar1','Recovery\RppriJabar1Controller');
Route::resource('RppriJabar2','Recovery\RppriJabar2Controller');
Route::resource('RppriJabar3','Recovery\RppriJabar3Controller');
Route::resource('RppriJabar4','Recovery\RppriJabar4Controller');

// dept TAF
Route::resource('Compare','TAF\CompareController');
Route::resource('LKBH','TAF\LKBHController');
Route::resource('RAT','TAF\RATController');
Route::resource('DRT','TAF\DRTController');

Route::resource('resign','ResignController');

// Logo
Route::view('/logo','logo');
//Route::resource('Embed/{report}','EmbedController');
