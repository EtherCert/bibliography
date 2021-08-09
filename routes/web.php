<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/* 
|--------------------------------------------------------------------------
Notifications
|--------------------------------------------------------------------------
*/
Route::prefix('admin/')->name('admin.')->group(function () {
 
Route::get('notifications','App\Http\Controllers\NotificationsController@index')->name('notifications');
Route::delete('notifications/{id}','App\Http\Controllers\NotificationsController@delete')->name('notifications.delete');
Route::delete('notifications-add/','App\Http\Controllers\NotificationsController@deleteAll')->name('notifications-delete-all');
    
/*
|--------------------------------------------------------------------------
| Here Home Controller
|--------------------------------------------------------------------------
*/
Route::get('bloked', 'HomeController@bloked')->name('bloked');    
Route::get('no-access', 'HomeController@noAccess')->name('no-access');    
Route::get('dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');    
Route::get('profile', 'HomeController@profile')->name('profile');
Route::get('edit-profile', 'HomeController@editProfile')->name('edit-profile');    
Route::put('update-profile', 'HomeController@updateProfile')->name('update-profile');    
Route::put('update-password', 'HomeController@updatePassword')->name('update-password');     

/* 
|--------------------------------------------------------------------------
Here Settings
|--------------------------------------------------------------------------
*/
Route::resource('settings', 'App\Http\Controllers\SettingController')->only(['index', 'edit','update']); 
        
/*
|--------------------------------------------------------------------------
| Here Admin FileManager 
|--------------------------------------------------------------------------
*/

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
    
/*
|--------------------------------------------------------------------------
| Here Info 
|--------------------------------------------------------------------------
*/
 Route::get('info', 'App\Http\Controllers\InfoController@index')->name('info');
 Route::put('info/{id}', 'App\Http\Controllers\InfoController@update')->name('info.update'); 
    
/* 
|--------------------------------------------------------------------------
Here Users
|--------------------------------------------------------------------------
*/
Route::resource('users', 'App\Http\Controllers\UserController');   
Route::post('/users/my-update', 'App\Http\Controllers\UserController@myUpdate')->name('users.my-update');    
Route::post('/users/change-password', 'App\Http\Controllers\UserController@changePassword')->name('users.change-password'); 
Route::get('/users/details/{id}', 'App\Http\Controllers\UserController@details')->name('users.details'); 
Route::post('/users/change-password/admin', 'App\Http\Controllers\UserController@changePasswordByAdmin')->name('users.change-password.admin');    
Route::get('/admins/excel', 'App\Http\Controllers\ExportExcelController@exportAdmins')->name('admins.excel');     
/* 
|--------------------------------------------------------------------------
Here Members
|--------------------------------------------------------------------------
*/
Route::get('/members', 'App\Http\Controllers\UserController@indexMembers')->name('members.index'); 
Route::get('/members/details/{id}', 'App\Http\Controllers\UserController@detailsMember')->name('members.details'); 
Route::get('/member/excel', 'App\Http\Controllers\ExportExcelController@exportMembers')->name('members.excel');     

/* 
|--------------------------------------------------------------------------
Here Studies
|--------------------------------------------------------------------------
*/
Route::get('/studies/{study_state}', 'App\Http\Controllers\StudyController@indexAdmin')->name('studies.index');
Route::get('/study/details/{id}', 'App\Http\Controllers\StudyController@detailsAdmin')->name('study.details');     
Route::get('/download-summary-ar/{id}', 'App\Http\Controllers\StudyController@downloadSummaryAr')->name('study.download-summary-ar'); 
Route::get('/download-summary-en/{id}', 'App\Http\Controllers\StudyController@downloadSummaryEn')->name('study.download-summary-en');     
Route::get('/download-study/{id}', 'App\Http\Controllers\StudyController@downloadStudyFile')->name('study.download-study'); 
Route::get('/download-search-leave/{id}', 'App\Http\Controllers\StudyController@downloadSearchLeave_File')->name('study.download-study-leave');     
Route::post('/change-status-or-transferer/{id}', 'App\Http\Controllers\StudyController@changeStatusOrTransfere')->name('change-status-or-transfere');
Route::get('/studies/excel/scientific/{study_state}', 'App\Http\Controllers\ExportExcelController@exportScientificStudy')->name('studies.excel.scientific');    
Route::get('/studies/excel/state/{study_state}', 'App\Http\Controllers\ExportExcelController@exportStateStudyExport')->name('studies.excel.state');    
});

/* 
|--------------------------------------------------------------------------
Here Laravel Route 
|--------------------------------------------------------------------------
*/ 
Auth::routes();
Route::get('register-member', 'App\Http\Controllers\MemberController@create')->name('register.member');//مهم مهم مهم
Route::post('register-member', 'App\Http\Controllers\MemberController@store')->name('store.member');//مهم مهم مهم
/* 
|--------------------------------------------------------------------------
Here Home Page
|--------------------------------------------------------------------------
*/ 
Route::get('/', function () { return view('site.index');})->name('index');
//Route::get('/', 'MembershipController@indexPublic')->name('index');
//Route::post('/email-list', 'EmailListController@store')->name('email-list');
//Route::get('/details/{id}', 'MembershipController@show')->name('membeships-details');
//Route::get('/all', 'MembershipController@allMemberships')->name('all');
