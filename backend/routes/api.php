<?php

use App\Http\Controllers\api\ActivityController;
use App\Http\Controllers\Api\AdditionalInformationController;
use App\Http\Controllers\api\AttachmentController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AttendanceLogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\api\BoardController;
use App\Http\Controllers\api\CardController;
use App\Http\Controllers\api\CardLabelController;
use App\Http\Controllers\api\CatalogController;
use App\Http\Controllers\Api\CurriculumVitaeController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\api\LabelController;
use App\Http\Controllers\Api\SkillMasterController;
use App\Http\Controllers\Api\FcmController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\api\InventoryController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\ParameterDetailController;
use App\Http\Controllers\Api\ParameterMasterController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TimelineController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductTagController;
use App\Http\Controllers\Api\ProjectHistoryController;
use App\Http\Controllers\Api\UserAddressController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\api\ChecklistController;
use App\Http\Controllers\api\ChecklistItemController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\CompanyProjectController;
use App\Http\Controllers\Api\DamageHistoryController;
use App\Http\Controllers\api\LeaveAllocationController;
use App\Http\Controllers\Api\LeaveRequestController;
use App\Http\Controllers\api\ListAssignmentController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\api\ProjectCategoryController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UsageHistoryController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ProjectHistoryMasterController;
use App\Http\Controllers\Api\referenceContactController;
use App\Http\Controllers\api\UserProjectController;
use App\Http\Controllers\api\VendorController;
use App\Http\Controllers\Api\WorkHistoryController;
use App\Http\Controllers\Api\LeaveTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$version = "v1/";
$url = $version;


/**
 * AUTHENTICATION
 */

Route::group([
    'prefix' => $url . 'auth',
    'middleware' => 'api',
], function ($router) {
    $router->post('/login', [AuthController::class, 'loginUser'])->name('login');
    $router->post('/login-admin', [AuthController::class, 'loginAdmin']);
    $router->post('/push-notif', [FcmController::class, 'sendCheckInReminderPushNotification']);
});

Route::group([
    'prefix' => $url . 'auth',
    'middleware' => 'jwt.verify',
], function ($router) {
    $router->post('/logout', [AuthController::class, 'logout']);

    $router->put('/first-change-password', [PasswordController::class, 'firstChangePassword']);
});


/**
 * PROFILE
 */
Route::group([
    'prefix' => $url . 'user',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/self', [ProfileController::class, 'getUser']);
    $router->put('/update', [ProfileController::class, 'updateUser']);
    $router->put('/change-password', [PasswordController::class, 'changePassword']);
    $router->put('/update-fcm-token', [FcmController::class, 'updateFcmToken']);
});

/**
 * ATTENDANCE
 */
Route::group([
    'prefix' => $url . 'attendance',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/status', [AttendanceController::class, 'status']);
    $router->get('/status/{user_guid}', [AttendanceController::class, 'statusByUser']);
    $router->get('/detail/{guid}', [AttendanceController::class, 'attendanceByGuid']);
    $router->post('/check-in', [AttendanceController::class, 'checkIn']);
    $router->post('/check-out', [AttendanceController::class, 'checkOut']);
    $router->post('/update-location', [AttendanceLogController::class, 'updateLocation']);
    $router->post('/user-by-location', [AttendanceController::class, 'userByLocation']);
    $router->get('/count-user-by-location', [AttendanceController::class, 'countUserByLocation']);
    $router->get('/data-user-all-location', [AttendanceController::class, 'dataUserAllLocation']);
    $router->delete('/reset', [AttendanceController::class, 'reset']);
    $router->post('/filter', [AttendanceController::class, 'rangeAttendance']);
    $router->post('/filter/datatable', [AttendanceController::class, 'rangeAttendanceDatatable']);
    $router->post('/filter/user/datatable', [AttendanceController::class, 'rangeAttendanceDatatableByUser']);
});

/**
 * UPLOAD
 */
Route::group([
    'prefix' => $url . 'upload',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->post('/image', [FileController::class, 'uploadImage']);
    $router->post('/file', [FileController::class, 'uploadFile']);
});

/**
 * DELETE
 */
Route::group([
    'prefix' => $url . 'delete',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->post('/image', [FileController::class, 'deleteImage']);
});

/**
 * NOTICES
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/notice/all', [NoticeController::class, 'getNotices']);
    $router->get('/notice/datatable', [NoticeController::class, 'getAllDataTable']);
    $router->get('/notice/{guid}', [NoticeController::class, 'getData']);
    $router->post('/notice', [NoticeController::class, 'insertData']);
    $router->put('/notice', [NoticeController::class, 'updateData']);
    $router->delete('/notice/{guid}', [NoticeController::class, 'deleteData']);
});

/**
 * BANNERS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/banner/all', [BannerController::class, 'getBanners']);
    $router->get('/banner/datatable', [BannerController::class, 'getAllDataTable']);
    $router->get('/banner/{guid}', [BannerController::class, 'getData']);
    $router->post('/banner', [BannerController::class, 'insertData']);
    $router->put('/banner', [BannerController::class, 'updateData']);
    $router->delete('/banner/{guid}', [BannerController::class, 'deleteData']);
});

/**
 * MAIL
 */
Route::group([
    'prefix' => $url . 'mail',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->post('/send', [MailController::class, 'sendMail']);
});

/**
 * FORGOT PASSWORD
 */
Route::group([
    'prefix' => $url . 'forgot-password',
    'middleware' => 'api',
], function ($router) {
    $router->post('/generate-otp', [OtpController::class, 'generateOtp']);
    $router->post('/validate-otp', [OtpController::class, 'validateOtp']);
    $router->post('/reset-password', [PasswordController::class, 'resetPassword']);
});

/**
 * POSITIONS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/position', [PositionController::class, 'getAll']);
    $router->get('/position/datatable', [PositionController::class, 'getAllDataTable']);
    $router->get('/position/{guid}', [PositionController::class, 'getData']);
    $router->post('/position', [PositionController::class, 'insertData']);
    $router->put('/position', [PositionController::class, 'updateData']);
    $router->delete('/position/{guid}', [PositionController::class, 'deleteData']);
});

/**
 * DEPARTMENTS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/department', [DepartmentController::class, 'getAll']);
    $router->get('/department/datatable', [DepartmentController::class, 'getAllDataTable']);
    $router->get('/department/{guid}', [DepartmentController::class, 'getData']);
    $router->post('/department', [DepartmentController::class, 'insertData']);
    $router->put('/department', [DepartmentController::class, 'updateData']);
    $router->delete('/department/{guid}', [DepartmentController::class, 'deleteData']);
});


/**
 * ROLES
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/role', [RoleController::class, 'getAll']);
    $router->get('/role/datatable', [RoleController::class, 'getAllDataTable']);
    $router->get('/role/datatableconcat', [RoleController::class, 'getAllDataTableConcat']);
    $router->get('/role/{guid}', [RoleController::class, 'getData']);
    $router->put('/role', [RoleController::class, 'updateData']);
});

/**
 * DIVISIONS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/division', [DivisionController::class, 'getAll']);
    $router->get('/division/datatable', [DivisionController::class, 'getAllDataTable']);
    $router->get('/division/{guid}', [DivisionController::class, 'getData']);
    $router->post('/division', [DivisionController::class, 'insertData']);
    $router->put('/division', [DivisionController::class, 'updateData']);
    $router->delete('/division/{guid}', [DivisionController::class, 'deleteData']);
});

/**
 * USERS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/user', [UserController::class, 'getAll']);
    $router->get('/user/datatable', [UserController::class, 'getAllDataTable']);
    $router->get('/user/{guid}', [UserController::class, 'getData']);
    $router->get('/user/check/permissions', [UserController::class, 'checkPermissions']);
    $router->post('/user', [UserController::class, 'insertData']);
    $router->put('/user', [UserController::class, 'updateData']);
    $router->put('/user/reset-password/{guid}', [UserController::class, 'resetPassword']);
});

/**
 * DATA
 */
Route::group([
    'prefix' => $url . 'data',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/overall', [DataController::class, 'overallStatistic']);
    $router->get('/timeline', [TimelineController::class, 'getTimelines']);
    $router->get('/timeline/{user_guid}', [TimelineController::class, 'getTimelinesByUser']);
});

/**
 * PRODUCT TAG
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/product-tag', [ProductTagController::class, 'getAll']);
    $router->get('/product-tag/datatable', [ProductTagController::class, 'getAllDataTable']);
    $router->get('/product-tag/{guid}', [ProductTagController::class, 'getData']);
    $router->post('/product-tag', [ProductTagController::class, 'insertData']);
    $router->put('/product-tag', [ProductTagController::class, 'updateData']);
    $router->delete('/product-tag/{guid}', [ProductTagController::class, 'deleteData']);
});

/**
 * PRODUCT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/product', [ProductController::class, 'getAll']);
    $router->get('/product/datatable', [ProductController::class, 'getAllDataTable']);
    $router->get('/product/{guid}', [ProductController::class, 'getData']);
    $router->post('/product', [ProductController::class, 'insertData']);
    $router->put('/product', [ProductController::class, 'updateData']);
    $router->delete('/product/{guid}', [ProductController::class, 'deleteData']);
});

/**
 * PARAMETER MASTER
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/parameter-master', [ParameterMasterController::class, 'getAll']);
    $router->get('/parameter-master/datatable', [ParameterMasterController::class, 'getAllDataTable']);
    $router->get('/parameter-master/{guid}', [ParameterMasterController::class, 'getData']);
    $router->post('/parameter-master', [ParameterMasterController::class, 'insertData']);
    $router->put('/parameter-master', [ParameterMasterController::class, 'updateData']);
    $router->delete('/parameter-master/{guid}', [ParameterMasterController::class, 'deleteData']);
});

/**
 * PARAMETER DETAIL
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/parameter-detail', [ParameterDetailController::class, 'getAll']);
    $router->get('/parameter-detail/datatable', [ParameterDetailController::class, 'getAllDataTable']);
    $router->get('/parameter-detail/{guid}', [ParameterDetailController::class, 'getData']);
    $router->post('/parameter-detail', [ParameterDetailController::class, 'insertData']);
    $router->put('/parameter-detail', [ParameterDetailController::class, 'updateData']);
    $router->delete('/parameter-detail/{guid}', [ParameterDetailController::class, 'deleteData']);
});

/**
 * INVENTORY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/inventory', [InventoryController::class, 'getAll'])->middleware('permission:Read_Banner');
    $router->get('/inventory/datatable', [InventoryController::class, 'getAllDataTable']);
    $router->get('/inventory/{guid}', [InventoryController::class, 'getData']);
    $router->post('/inventory', [InventoryController::class, 'insertData']);
    $router->put('/inventory', [InventoryController::class, 'updateData']);
    $router->delete('/inventory/{guid}', [InventoryController::class, 'deleteData']);
});

/**
 * OFFICE
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/office', [OfficeController::class, 'getAll']);
    $router->get('/office/datatable', [OfficeController::class, 'getAllDataTable']);
    $router->get('/office/{guid}', [OfficeController::class, 'getData']);
    $router->post('/office', [OfficeController::class, 'insertData']);
    $router->put('/office', [OfficeController::class, 'updateData']);
    $router->delete('/office/{guid}', [OfficeController::class, 'deleteData']);
});

/**
 * ROOM
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/room', [RoomController::class, 'getAll']);
    $router->get('/room/datatable', [RoomController::class, 'getAllDataTable']);
    $router->get('/room/{guid}', [RoomController::class, 'getData']);
    $router->post('/room', [RoomController::class, 'insertData']);
    $router->put('/room', [RoomController::class, 'updateData']);
    $router->delete('/room/{guid}', [RoomController::class, 'deleteData']);
});

/**
 * CATEGORY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/category', [CategoryController::class, 'getAll']);
    $router->get('/category/datatable', [CategoryController::class, 'getAllDataTable']);
    $router->get('/category/{guid}', [CategoryController::class, 'getData']);
    $router->post('/category', [CategoryController::class, 'insertData']);
    $router->put('/category', [CategoryController::class, 'updateData']);
    $router->delete('/category/{guid}', [CategoryController::class, 'deleteData']);
});
/**
 * USAGE HISTORY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/usage-history', [UsageHistoryController::class, 'getAll']);
    $router->get('/usage-history/datatable', [UsageHistoryController::class, 'getAllDataTable']);
    $router->get('/usage-history/{guid}', [UsageHistoryController::class, 'getData']);
    $router->post('/usage-history', [UsageHistoryController::class, 'insertData']);
    $router->delete('/usage-history/{guid}', [UsageHistoryController::class, 'deleteData']);
    $router->post('/usage-history/filter/inventory/datatable', [UsageHistoryController::class, 'usageHistoryDatatableByInventory']);
});

/**
 * DAMAGE HISTORY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/damage-history', [DamageHistoryController::class, 'getAll']);
    $router->get('/damage-history/datatable', [DamageHistoryController::class, 'getAllDataTable']);
    $router->get('/damage-history/{guid}', [DamageHistoryController::class, 'getData']);
    $router->post('/damage-history', [DamageHistoryController::class, 'insertData']);
    $router->put('/damage-history', [DamageHistoryController::class, 'updateData']);
    $router->delete('/damage-history/{guid}', [DamageHistoryController::class, 'deleteData']);
    $router->post('/damage-history/filter/inventory/datatable', [DamageHistoryController::class, 'damageHistoryDatatableByInventory']);
});

/**
 * USER ADDRESS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/province', [VillageController::class, 'getAllProvince']);
    $router->get('/city', [VillageController::class, 'getAllCity']);
    $router->get('/district', [VillageController::class, 'getAllDistrict']);
    $router->get('/village', [VillageController::class, 'getAllVillage']);
});

/**
 * USER ADDRESS
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/user-address', [UserAddressController::class, 'getAll']);
    $router->get('/user-address/datatable', [UserAddressController::class, 'getAllDataTable']);
    $router->get('/user-address/{guid}', [UserAddressController::class, 'getData']);
    $router->post('/user-address', [UserAddressController::class, 'insertData']);
    $router->put('/user-address', [UserAddressController::class, 'updateData']);
    $router->delete('/user-address/{guid}', [UserAddressController::class, 'deleteData']);
});


/**
 * Education Admin
 */
Route::group([
    'prefix' => $url . 'admin/education',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [EducationController::class, 'getAll']);
    $router->get('/datatable', [EducationController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [EducationController::class, 'getData']);
});


/**
 * Education User
 */
Route::group([
    'prefix' => $url . 'users/education',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [EducationController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [EducationController::class, 'getData']);
    $router->post('/', [EducationController::class, 'userInsertData']);
    $router->put('/', [EducationController::class, 'userUpdateData']);
    $router->delete('/{guid}', [EducationController::class, 'userDeleteData']);
});

/**
 * Skill Master
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/skill-master', [SkillMasterController::class, 'getAll']);
    $router->get('/skill-master/datatable', [SkillMasterController::class, 'getAllDataTable']);
    $router->get('/skill-master/{guid}', [SkillMasterController::class, 'getData']);
    $router->post('/skill-master', [SkillMasterController::class, 'insertData']);
    $router->put('/skill-master', [SkillmasterController::class, 'updateData']);
    $router->delete('/skill-master/{guid}', [SkillMasterController::class, 'deleteData']);
});

/**
 * Skill Admin
 */
Route::group([
    'prefix' => $url . 'admin/skill',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [SkillController::class, 'getAll']);
    $router->get('/datatable', [SkillController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [SkillController::class, 'getData']);
});

/**
 * Skill User
 */
Route::group([
    'prefix' => $url . 'users/skill',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [SkillController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [SkillController::class, 'getData']);
    $router->post('/', [SkillController::class, 'userInsertData']);
    $router->put('/', [SkillController::class, 'userUpdateData']);
    $router->delete('/{guid}', [SkillController::class, 'userDeleteData']);
});

/**
 * Project Master
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/project-history-master', [ProjectHistoryMasterController::class, 'getAll']);
    $router->get('/project-history-master/datatable', [ProjectHistoryMasterController::class, 'getAllDataTable']);
    $router->get('/project-history-master/{guid}', [ProjectHistoryMasterController::class, 'getData']);
    $router->post('/project-history-master', [ProjectHistoryMasterController::class, 'insertData']);
    $router->put('/projec-history-tmaster', [ProjectHistoryMasterController::class, 'updateData']);
    $router->delete('/project-history-master/{guid}', [ProjectHistoryMasterController::class, 'deleteData']);
});

/**
 * Project History Admin
 */
Route::group([
    'prefix' => $url . 'admin/project-history',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [ProjectHistoryController::class, 'getAll']);
    $router->get('/datatable', [ProjectHistoryController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [ProjectHistoryController::class, 'getData']);
});

/**
 * Project History User
 */
Route::group([
    'prefix' => $url . 'users/project-history',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [ProjectHistoryController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [ProjectHistoryController::class, 'getData']);
    $router->post('/', [ProjectHistoryController::class, 'userInsertData']);
    $router->put('/', [ProjectHistoryController::class, 'userUpdateData']);
    $router->delete('/{guid}', [ProjectHistoryController::class, 'userDeleteData']);
});

/**
 * Work History Admin
 */
Route::group([
    'prefix' => $url . 'admin/work-history',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [WorkHistoryController::class, 'getAll']);
    $router->get('/datatable', [WorkHistoryController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [WorkHistoryController::class, 'getData']);
});

/**
 * Work History User
 */
Route::group([
    'prefix' => $url . 'users/work-history',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [WorkHistoryController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [WorkHistoryController::class, 'getData']);
    $router->post('/', [WorkHistoryController::class, 'userInsertData']);
    $router->put('/', [WorkHistoryController::class, 'userUpdateData']);
    $router->delete('/{guid}', [WorkHistoryController::class, 'userDeleteData']);
});

/**
 * Additional Information Admin
 */
Route::group([
    'prefix' => $url . 'admin/additional-information',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [AdditionalInformationController::class, 'getAll']);
    $router->get('/datatable', [AdditionalInformationController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [AdditionalInformationController::class, 'getData']);
});

/**
 * Additional Information User
 */
Route::group([
    'prefix' => $url . 'users/additional-information',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [AdditionalInformationController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [AdditionalInformationController::class, 'getData']);
    $router->post('/', [AdditionalInformationController::class, 'userInsertData']);
    $router->put('/', [AdditionalInformationController::class, 'userUpdateData']);
    $router->delete('/{guid}', [AdditionalInformationController::class, 'userDeleteData']);
});

/**
 * Reference Contact Admin
 */
Route::group([
    'prefix' => $url . 'admin/reference-contact',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [referenceContactController::class, 'getAll']);
    $router->get('/datatable', [referenceContactController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [referenceContactController::class, 'getData']);
});

/**
 * Reference Contact User
 */
Route::group([
    'prefix' => $url . 'users/reference-contact',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/datatable', [referenceContactController::class, 'userGetAllDataTable']);
    $router->get('/{guid}', [referenceContactController::class, 'getData']);
    $router->post('/', [referenceContactController::class, 'userInsertData']);
    $router->put('/', [referenceContactController::class, 'userUpdateData']);
    $router->delete('/{guid}', [referenceContactController::class, 'userDeleteData']);
});

/**
 * Curriculum Vitae
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/cv', [CurriculumVitaeController::class, 'getAll']);
    $router->get('/cv/{guid}', [CurriculumVitaeController::class, 'getData']);
    $router->get('/cvself', [CurriculumVitaeController::class, 'getDataSelf']);
});

/**
 * COMPANY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/company', [CompanyController::class, 'getAll']);
    $router->get('/company/datatable', [CompanyController::class, 'getAllDataTable']);
    $router->get('/company/{guid}', [CompanyController::class, 'getData']);
    $router->post('/company', [CompanyController::class, 'insertData']);
    $router->put('/company', [CompanyController::class, 'updateData']);
    $router->delete('/company/{guid}', [CompanyController::class, 'deleteData']);
});

/**
 * PROJECT CATEGORY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/project-category', [ProjectCategoryController::class, 'getAll']);
    $router->get('/project-category/datatable', [ProjectCategoryController::class, 'getAllDataTable']);
    $router->get('/project-category/{guid}', [ProjectCategoryController::class, 'getData']);
    $router->post('/project-category', [ProjectCategoryController::class, 'insertData']);
    $router->put('/project-category', [ProjectCategoryController::class, 'updateData']);
    $router->delete('/project-category/{guid}', [ProjectCategoryController::class, 'deleteData']);
});

/**
 * COMPANY PROJECT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/company-project', [CompanyProjectController::class, 'getAll']);
    $router->get('/company-project/datatable', [CompanyProjectController::class, 'getAllDataTable']);
    $router->get('/company-project/{guid}', [CompanyProjectController::class, 'getData']);
    $router->post('/company-project', [CompanyProjectController::class, 'insertData']);
    $router->put('/company-project', [CompanyProjectController::class, 'updateData']);
    $router->delete('/company-project/{guid}', [CompanyProjectController::class, 'deleteData']);
});

/**
 * PROJECT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/project', [ProjectController::class, 'getAll']);
    $router->get('/project/datatable', [ProjectController::class, 'getAllDataTable']);
    $router->get('/project/{guid}', [ProjectController::class, 'getData']);
    $router->post('/project', [ProjectController::class, 'insertData']);
    $router->put('/project', [ProjectController::class, 'updateData']);
    $router->delete('/project/{guid}', [ProjectController::class, 'deleteData']);
});

/**
 * USER PROJECT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/user-project', [UserProjectController::class, 'getAll']);
    $router->get('/user-project/datatable', [UserProjectController::class, 'getAllDataTable']);
    $router->get('/user-project/{guid}', [UserProjectController::class, 'getData']);
    $router->post('/user-project', [UserProjectController::class, 'insertData']);
    $router->put('/user-project', [UserProjectController::class, 'updateData']);
    $router->delete('/user-project/{guid}', [UserProjectController::class, 'deleteData']);
});

/**
 * BOARD
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/board', [BoardController::class, 'getAll']);
    $router->get('/board/datatable', [BoardController::class, 'getAllDataTable']);
    $router->get('/board/{guid}', [BoardController::class, 'getData']);
    $router->post('/board', [BoardController::class, 'insertData']);
    $router->put('/board', [BoardController::class, 'updateData']);
    $router->delete('/board/{guid}', [BoardController::class, 'deleteData']);
});

/**
 * CATALOG (LIST)
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/catalog', [CatalogController::class, 'getAll']);
    $router->get('/catalog/datatable', [CatalogController::class, 'getAllDataTable']);
    $router->get('/catalog/{guid}', [CatalogController::class, 'getData']);
    $router->post('/catalog', [CatalogController::class, 'insertData']);
    $router->put('/catalog', [CatalogController::class, 'updateData']);
    $router->delete('/catalog/{guid}', [CatalogController::class, 'deleteData']);
});

/**
 * LIST ASSIGNMENT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/list-assignment', [ListAssignmentController::class, 'getAll']);
    $router->get('/list-assignment/datatable', [ListAssignmentController::class, 'getAllDataTable']);
    $router->get('/list-assignment/{guid}', [ListAssignmentController::class, 'getData']);
    $router->post('/list-assignment', [ListAssignmentController::class, 'insertData']);
    $router->put('/list-assignment', [ListAssignmentController::class, 'updateData']);
    $router->delete('/list-assignment/{guid}', [ListAssignmentController::class, 'deleteData']);
});

/**
 * CARD
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/card', [CardController::class, 'getAll']);
    $router->get('/card/datatable', [CardController::class, 'getAllDataTable']);
    $router->get('/card/{guid}', [CardController::class, 'getData']);
    $router->post('/card', [CardController::class, 'insertData']);
    $router->put('/card', [CardController::class, 'updateData']);
    $router->delete('/card/{guid}', [CardController::class, 'deleteData']);
});

/**
 * CARD LABEL
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/card-label', [CardLabelController::class, 'getAll']);
    $router->get('/card-label/datatable', [CardLabelController::class, 'getAllDataTable']);
    $router->get('/card-label/{guid}', [CardLabelController::class, 'getData']);
    $router->post('/card-label', [CardLabelController::class, 'insertData']);
    $router->put('/card-label', [CardLabelController::class, 'updateData']);
    $router->delete('/card-label/{guid}', [CardLabelController::class, 'deleteData']);
});

/**
 * LABEL
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/label', [LabelController::class, 'getAll']);
    $router->get('/label/datatable', [LabelController::class, 'getAllDataTable']);
    $router->get('/label/{guid}', [LabelController::class, 'getData']);
    $router->post('/label', [LabelController::class, 'insertData']);
    $router->put('/label', [LabelController::class, 'updateData']);
    $router->delete('/label/{guid}', [LabelController::class, 'deleteData']);
});

/**
 * COMMENT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/comment', [CommentController::class, 'getAll']);
    $router->get('/comment/datatable', [CommentController::class, 'getAllDataTable']);
    $router->get('/comment/{guid}', [CommentController::class, 'getData']);
    $router->post('/comment', [CommentController::class, 'insertData']);
    $router->put('/comment', [CommentController::class, 'updateData']);
    $router->delete('/comment/{guid}', [CommentController::class, 'deleteData']);
});

/**
 * ACTIVITY
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/activity', [ActivityController::class, 'getAll']);
    $router->get('/activity/datatable', [ActivityController::class, 'getAllDataTable']);
    $router->get('/activity/{guid}', [ActivityController::class, 'getData']);
    $router->post('/activity', [ActivityController::class, 'insertData']);
    $router->put('/activity', [ActivityController::class, 'updateData']);
    $router->delete('/activity/{guid}', [ActivityController::class, 'deleteData']);
});

/**
 * ATTACHMENT
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/attachment', [AttachmentController::class, 'getAll']);
    $router->get('/attachment/datatable', [AttachmentController::class, 'getAllDataTable']);
    $router->get('/attachment/{guid}', [AttachmentController::class, 'getData']);
    $router->post('/attachment', [AttachmentController::class, 'insertData']);
    $router->put('/attachment', [AttachmentController::class, 'updateData']);
    $router->delete('/attachment/{guid}', [AttachmentController::class, 'deleteData']);
});

/**
 * CHECKLIST
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/checklist', [ChecklistController::class, 'getAll']);
    $router->get('/checklist/datatable', [ChecklistController::class, 'getAllDataTable']);
    $router->get('/checklist/{guid}', [ChecklistController::class, 'getData']);
    $router->post('/checklist', [ChecklistController::class, 'insertData']);
    $router->put('/checklist', [ChecklistController::class, 'updateData']);
    $router->delete('/checklist/{guid}', [ChecklistController::class, 'deleteData']);
});

/**
 * CHECKLIST ITEM
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/checklist-item', [ChecklistItemController::class, 'getAll']);
    $router->get('/checklist-item/datatable', [ChecklistItemController::class, 'getAllDataTable']);
    $router->get('/checklist-item/{guid}', [ChecklistItemController::class, 'getData']);
    $router->post('/checklist-item', [ChecklistItemController::class, 'insertData']);
    $router->put('/checklist-item', [ChecklistItemController::class, 'updateData']);
    $router->delete('/checklist-item/{guid}', [ChecklistItemController::class, 'deleteData']);
});


/**
 * VENDOR ITEM
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/vendor', [VendorController::class, 'getAll']);
    $router->get('/vendor/datatable', [VendorController::class, 'getAllDataTable']);
    $router->get('/vendor/{guid}', [VendorController::class, 'getData']);
    $router->post('/vendor', [VendorController::class, 'insertData']);
    $router->put('/vendor', [VendorController::class, 'updateData']);
    $router->delete('/vendor/{guid}', [VendorController::class, 'deleteData']);
});

/**
 * Leave Type
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/leave-type', [LeaveTypeController::class, 'getAll']);
    $router->get('/leave-type/datatable', [LeaveTypeController::class, 'getAllDataTable']);
    $router->get('/leave-type/{guid}', [LeaveTypeController::class, 'getData']);
    $router->post('/leave-type', [LeaveTypeController::class, 'insertData']);
    $router->put('/leave-type', [LeaveTypeController::class, 'updateData']);
    $router->delete('/leave-type/{guid}', [LeaveTypeController::class, 'deleteData']);
});

/**
 * Leave Allocation
 */
Route::group([
    'prefix' => $url,
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/leave-allocation', [LeaveAllocationController::class, 'getAll']);
    $router->get('/leave-allocation-self', [LeaveAllocationController::class, 'getAllDataTableSelf']);
    $router->get('/leave-allocation/datatable', [LeaveAllocationController::class, 'getAllDataTable']);
    $router->get('/leave-allocation/{guid}', [LeaveAllocationController::class, 'getData']);
    $router->post('/leave-allocation', [LeaveAllocationController::class, 'insertData']);
    $router->put('/leave-allocation', [LeaveAllocationController::class, 'updateData']);
    $router->delete('/leave-allocation/{guid}', [LeaveAllocationController::class, 'deleteData']);
});

/**
 * Leave request admin
 */
Route::group([
    'prefix' => $url . 'admin/leave-request',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [LeaveRequestController::class, 'adminGetAll']);
    $router->get('/datatable', [LeaveRequestController::class, 'adminGetAllDataTable']);
    $router->get('/{guid}', [LeaveRequestController::class, 'adminGetData']);
    $router->put('/', [LeaveRequestController::class, 'adminUpdateData']);
});

/**
 * Leave request user
 */
Route::group([
    'prefix' => $url . 'users/leave-request',
    'middleware' => 'jwt.verify'
], function ($router) {
    $router->get('/', [LeaveRequestController::class, 'userGetAll']);
    $router->get('/datatable', [LeaveRequestController::class, 'userGetAllDataTable']);
    $router->post('/', [LeaveRequestController::class, 'userInsertData']);
    $router->put('/cancel', [LeaveRequestController::class, 'userDeleteData']);
});
