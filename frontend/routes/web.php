<?php

use Illuminate\Support\Facades\Route;


// use App\Http\Controllers\ErrorController;

// // Route untuk kesalahan 401 (Unauthorized)
// Route::get('/error/401', [ErrorController::class, 'unauthorized'])->name('error.401');

// // Route untuk kesalahan 402 (Payment Required)
// Route::get('/error/402', [ErrorController::class, 'paymentRequired'])->name('error.402');

// // Route untuk kesalahan 403 (Forbidden)
// Route::get('/error/403', [ErrorController::class, 'forbidden'])->name('error.403');

// // Route untuk kesalahan 404 (Not Found)
// Route::get('/error/404', [ErrorController::class, 'notFound'])->name('error.404');

// // Route untuk kesalahan 419 (Authentication Timeout)
// Route::get('/error/419', [ErrorController::class, 'authenticationTimeout'])->name('error.419');

// // Route untuk kesalahan 429 (Too Many Requests)
// Route::get('/error/429', [ErrorController::class, 'tooManyRequests'])->name('error.429');

// // Route untuk kesalahan 500 (Internal Server Error)
// Route::get('/error/500', [ErrorController::class, 'internalServerError'])->name('error.500');

// // Route untuk kesalahan 503 (Service Unavailable)
// Route::get('/error/503', [ErrorController::class, 'serviceUnavailable'])->name('error.503');

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/set-session', [App\Http\Controllers\SessionController::class, 'setLogin'])->name('session.login');
Route::get('/clear-session', [App\Http\Controllers\SessionController::class, 'clearSession'])->name('session.clear');

Route::group([
    'middleware' => 'auth.guest',
], function ($router) {
    $router->get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
});


Route::group([
    'middleware' => 'auth.token',
], function ($router) {
    $router->get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home')->middleware('role:Super Admin,Admin,User')->middleware('permission:Read_Dashboard');

    $router->get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index-user')->middleware('permission:Read_User');
    $router->get('/user/insert', [App\Http\Controllers\UserController::class, 'indexInsert'])->name('index-insert-user')->middleware('permission:Create_User');
    $router->get('/user/edit/{guid}', [App\Http\Controllers\UserController::class, 'indexEdit'])->name('index-edit-user')->middleware('permission:Update_User');
    $router->get('/user/detail/profile/{guid}', [App\Http\Controllers\UserController::class, 'indexDetailProfile'])->name('index-detail-profile-user')->middleware('permission:Read_User');
    $router->get('/user/detail/attendance/{guid}', [App\Http\Controllers\UserController::class, 'indexDetailAttendance'])->name('index-detail-attendance-user')->middleware('permission:Read_User');
    $router->get('/user/detail/CV/{guid}', [App\Http\Controllers\UserController::class, 'indexDetailCV'])->name('index-detail-CV-user');
    $router->get('/user/detail/print/{guid}', [App\Http\Controllers\UserController::class, 'indexDetailPrint'])->name('index-print-CV-user');

    $router->get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('index-role')->middleware('permission:Read_Role');
    $router->get('/role/edit/{guid}', [App\Http\Controllers\RoleController::class, 'indexEdit'])->name('index-edit-permission')->middleware('permission:Update_Role');

    $router->get('/position', [App\Http\Controllers\PositionController::class, 'index'])->name('index-position')->middleware('role:Super Admin,Admin')->middleware('permission:Read_Position');
    $router->get('/position/insert', [App\Http\Controllers\PositionController::class, 'indexInsert'])->name('index-insert-position')->middleware('permission:Create_Position');
    $router->get('/position/edit/{guid}', [App\Http\Controllers\PositionController::class, 'indexEdit'])->name('index-edit-position')->middleware('permission:Update_Position');

    $router->get('/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('index-department')->middleware('permission:Read_Department');
    $router->get('/department/insert', [App\Http\Controllers\DepartmentController::class, 'indexInsert'])->name('index-insert-department')->middleware('permission:Create_Department');
    $router->get('/department/edit/{guid}', [App\Http\Controllers\DepartmentController::class, 'indexEdit'])->name('index-edit-department')->middleware('permission:Update_Department');

    $router->get('/division', [App\Http\Controllers\DivisionController::class, 'index'])->name('index-division')->middleware('permission:Read_Division');
    $router->get('/division/insert', [App\Http\Controllers\DivisionController::class, 'indexInsert'])->name('index-insert-division')->middleware('permission:Create_Division');
    $router->get('/division/edit/{guid}', [App\Http\Controllers\DivisionController::class, 'indexEdit'])->name('index-edit-division')->middleware('permission:Update_Division');

    $router->get('/notice', [App\Http\Controllers\NoticeController::class, 'index'])->name('index-notice')->middleware('permission:Read_Notice');
    $router->get('/notice/insert', [App\Http\Controllers\NoticeController::class, 'indexInsert'])->name('index-insert-notice')->middleware('permission:Create_Notice');
    $router->get('/notice/edit/{guid}', [App\Http\Controllers\NoticeController::class, 'indexEdit'])->name('index-edit-notice')->middleware('permission:Update_Notice');

    $router->get('/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('index-banner')->middleware('permission:Read_Banner');
    $router->get('/banner/insert', [App\Http\Controllers\BannerController::class, 'indexInsert'])->name('index-insert-banner')->middleware('permission:Create_Banner');
    $router->get('/banner/edit/{guid}', [App\Http\Controllers\BannerController::class, 'indexEdit'])->name('index-edit-banner')->middleware('permission:Update_Banner');

    $router->get('/attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('index-attendance')->middleware('permission:Read_Attendance');

    $router->get('/product-tag', [App\Http\Controllers\ProductTagController::class, 'index'])->name('index-product-tag')->middleware('permission:Create_ProductTag');
    $router->get('/product-tag/insert', [App\Http\Controllers\ProductTagController::class, 'indexInsert'])->name('index-insert-product-tag')->middleware('permission:Create_ProductTag');
    $router->get('/product-tag/edit/{guid}', [App\Http\Controllers\ProductTagController::class, 'indexEdit'])->name('index-edit-product-tag')->middleware('permission:Update_ProductTag');

    $router->get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('index-product')->middleware('permission:Read_Product');
    $router->get('/product/insert', [App\Http\Controllers\ProductController::class, 'indexInsert'])->name('index-insert-product')->middleware('permission:Create_Product');
    $router->get('/product/edit/{guid}', [App\Http\Controllers\ProductController::class, 'indexEdit'])->name('index-edit-product')->middleware('permission:Update_Product');

    $router->get('/additionalinformation', [App\Http\Controllers\AdditionalInformationController::class, 'index'])->name('index-additionalinformation');
    $router->get('/additionalinformation/insert', [App\Http\Controllers\AdditionalInformationController::class, 'indexInsert'])->name('index-insert-additionalinformation');
    $router->get('/additionalinformation/edit/{guid}', [App\Http\Controllers\AdditionalInformationController::class, 'indexEdit'])->name('index-edit-additionalinformation');

    $router->get('/workhistory', [App\Http\Controllers\WorkHistoryController::class, 'index'])->name('index-workhistory');
    $router->get('/workhistory/insert', [App\Http\Controllers\WorkHistoryController::class, 'indexInsert'])->name('index-insert-workhistory');
    $router->get('/workhistory/edit/{guid}', [App\Http\Controllers\WorkHistoryController::class, 'indexEdit'])->name('index-edit-workhistory');

    $router->get('/education', [App\Http\Controllers\EbController::class, 'index'])->name('index-edbg');
    $router->get('/education/insert', [App\Http\Controllers\EbController::class, 'indexInsert'])->name('index-insert-edbg');
    $router->get('/education/edit/{guid}', [App\Http\Controllers\EbController::class, 'indexEdit'])->name('index-edit-edbg');

    $router->get('/skill', [App\Http\Controllers\SkillController::class, 'index'])->name('index-skill');
    $router->get('/skill/insert', [App\Http\Controllers\SkillController::class, 'indexInsert'])->name('index-insert-skill');
    $router->get('/skill/edit/{guid}', [App\Http\Controllers\SkillController::class, 'indexEdit'])->name('index-edit-skill');

    $router->get('/skillmaster', [App\Http\Controllers\SkillMasterController::class, 'index'])->name('index-skillmaster');
    $router->get('/skillmaster/insert', [App\Http\Controllers\SkillMasterController::class, 'indexInsert'])->name('index-insert-skillmaster');
    $router->get('/skillmaster/edit/{guid}', [App\Http\Controllers\SkillMasterController::class, 'indexEdit'])->name('index-edit-skillmaster');

    $router->get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('index-project');
    $router->get('/project/insert', [App\Http\Controllers\ProjectController::class, 'indexInsert'])->name('index-insert-project');
    $router->get('/project/edit/{guid}', [App\Http\Controllers\ProjectController::class, 'indexEdit'])->name('index-edit-project');

    $router->get('/projectmaster', [App\Http\Controllers\ProjectMasterController::class, 'index'])->name('index-projectmaster');
    $router->get('/projectmaster/insert', [App\Http\Controllers\ProjectMasterController::class, 'indexInsert'])->name('index-insert-projectmaster');
    $router->get('/projectmaster/edit/{guid}', [App\Http\Controllers\ProjectMasterController::class, 'indexEdit'])->name('index-edit-projectmaster');

    $router->get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('index-inventory')->middleware('permission:Read_Banner')->middleware('permission:Read_Item');
    $router->get('/inventory/insert', [App\Http\Controllers\InventoryController::class, 'indexInsert'])->name('index-insert-inventory')->middleware('permission:Create_Item');
    $router->get('/inventory/edit/{guid}', [App\Http\Controllers\InventoryController::class, 'indexEdit'])->name('index-edit-inventory')->middleware('permission:Update_Item');
    $router->get('/inventory/detail/{guid}', [App\Http\Controllers\InventoryController::class, 'indexDetail'])->name('index-detail-inventory')->middleware('permission:Read_Item');

    $router->get('/damage-history', [App\Http\Controllers\DamageHistoryController::class, 'index'])->name('index-damage-history')->middleware('permission:Read_DamageHistory');
    $router->get('/damage-history/insert', [App\Http\Controllers\DamageHistoryController::class, 'indexInsert'])->name('index-insert-damage-history')->middleware('permission:Create_DamageHistory');
    $router->get('/damage-history/insert/detail/inventory/{guid}', [App\Http\Controllers\DamageHistoryController::class, 'indexInsertByInventory'])->name('index-insert-damage-history-inventory-detail')->middleware('permission:Create_DamageHistory  ');
    $router->get('/damage-history/edit/{guid}', [App\Http\Controllers\DamageHistoryController::class, 'indexEdit'])->name('index-edit-damage-history')->middleware('permission:Update_DamageHistory');
    $router->get('/damage-history/detail/{guid}', [App\Http\Controllers\DamageHistoryController::class, 'indexDetail'])->name('index-detail-damage-history')->middleware('permission:Read_DamageHistory');

    $router->get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('index-room')->middleware('permission:Read_Room');
    $router->get('/room/insert', [App\Http\Controllers\RoomController::class, 'indexInsert'])->name('index-insert-room')->middleware('permission:Create_Room');
    $router->get('/room/edit/{guid}', [App\Http\Controllers\RoomController::class, 'indexEdit'])->name('index-edit-room')->middleware('permission:Update_Room');

    $router->get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('index-category')->middleware('permission:Read_Category');
    $router->get('/category/insert', [App\Http\Controllers\CategoryController::class, 'indexInsert'])->name('index-insert-category')->middleware('permission:Create_Category');
    $router->get('/category/edit/{guid}', [App\Http\Controllers\CategoryController::class, 'indexEdit'])->name('index-edit-category')->middleware('permission:Update_Category');

    $router->get('/office', [App\Http\Controllers\OfficeController::class, 'index'])->name('index-office')->middleware('permission:Read_Office');
    $router->get('/office/insert', [App\Http\Controllers\OfficeController::class, 'indexInsert'])->name('index-insert-office')->middleware('permission:Create_Office');
    $router->get('/office/edit/{guid}', [App\Http\Controllers\OfficeController::class, 'indexEdit'])->name('index-edit-office')->middleware('permission:Update_Office');

    $router->get('/all_usage_history', [App\Http\Controllers\AllUsageHistoryController::class, 'index'])->name('index-all_usage_history')->middleware('permission:Read_UsageHistory');
    // $router->get('/all_usage_history/insert', [App\Http\Controllers\AllUsageHistoryController::class, 'indexInsert'])->name('index-insert-all_usage_history')->middleware('permission:Read_User');
    // $router->get('/all_usage_history/edit/{guid}', [App\Http\Controllers\AllUsageHistoryController::class, 'indexEdit'])->name('index-edit-all_usage_history')->middleware('permission:Read_User');

    $router->get('/all_damage_history', [App\Http\Controllers\AllDamageHistoryController::class, 'index'])->name('index-all_damage_history')->middleware('permission:Read_DamageHistory');
    $router->get('/all_damage_history/insert', [App\Http\Controllers\AllDamageHistoryController::class, 'indexInsert'])->name('index-insert-all_damage_history')->middleware('permission:Create_DamageHistory');
    $router->get('/all_damage_history/edit/{guid}', [App\Http\Controllers\AllDamageHistoryController::class, 'indexEdit'])->name('index-edit-all_damage_history')->middleware('permission:Update_DamageHistory');

    $router->get('/leave-management', [App\Http\Controllers\LeaveManagementController::class, 'index'])->name('index-leave-management')->middleware('permission:Read_LeaveManagement');
    $router->get('/leave-management/insert', [App\Http\Controllers\LeaveManagementController::class, 'indexInsert'])->name('index-insert-leave-management')->middleware('permission:Create_LeaveManagement');
    $router->get('/leave-management/edit/{guid}', [App\Http\Controllers\LeaveManagementController::class, 'indexEdit'])->name('index-edit-leave-management')->middleware('permission:Update_LeaveManagement');

    $router->get('/leave-type', [App\Http\Controllers\LeaveTypeController::class, 'index'])->name('index-leave-type')->middleware('permission:Read_LeaveType');
    $router->get('/leave-type/insert', [App\Http\Controllers\LeaveTypeController::class, 'indexInsert'])->name('index-insert-leave-type')->middleware('permission:Create_LeaveType');
    $router->get('/leave-type/edit/{guid}', [App\Http\Controllers\LeaveTypeController::class, 'indexEdit'])->name('index-edit-leave-type')->middleware('permission:Update_LeaveType');

    $router->get('/leave-request', [App\Http\Controllers\LeaveRequestController::class, 'index'])->name('index-leave-request')->middleware('permission:Read_LeaveApllication');
    $router->get('/leave-request/insert', [App\Http\Controllers\LeaveRequestController::class, 'indexInsert'])->name('index-insert-leave-request')->middleware('permission:Create_LeaveApllication');
    $router->get('/leave-request/edit/{guid}', [App\Http\Controllers\LeaveRequestController::class, 'indexEdit'])->name('index-edit-leave-request')->middleware('permission:Update_LeaveApllication');


    $router->get('/dashboard_inventory', [App\Http\Controllers\DashboardInventoryController::class, 'index'])->name('index-dashboard_inventory');

    $router->get('/project_management', [App\Http\Controllers\ProjectManagementController::class, 'index'])->name('index-project_management');

    $router->get('/project_management/project/{project_guid}', [App\Http\Controllers\ProjectManagementController::class, 'project'])->name('index-project_management-project');

    $router->get('/project_management/project/{project_guid}/board/{board_guid}', [App\Http\Controllers\ProjectManagementController::class, 'board'])->name('index-project_management-project-board');

    $router->get('/project_management/project/{project_guid}/test/{board_guid}', [App\Http\Controllers\ProjectManagementController::class, 'boardTest'])->name('index-project_management-project-board');


    $router->get('/project_management/project/{project_guid}/board/{board_guid}/card/{card_guid}', [App\Http\Controllers\ProjectManagementController::class, 'card'])->name('index-project_management-project-board');
});
