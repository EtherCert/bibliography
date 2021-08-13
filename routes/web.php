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

Route::prefix('admin/')->name('admin.')->middleware(['general.admin', 'auth', 'verified'])->group(function () {

/* 
|--------------------------------------------------------------------------
Notifications
|--------------------------------------------------------------------------
*/    
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
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+ Start Full Admin +-+-+-+-+-+-+-+-+-+-+-+-+-+-
|--------------------------------------------------------------------------
*/    
Route::middleware(['myadmin'])->group(function () {
/* 
|--------------------------------------------------------------------------
Here Settings
|--------------------------------------------------------------------------
*/
Route::resource('settings', 'App\Http\Controllers\SettingController')->only(['index', 'edit','update']);     

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
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+ End Full Admin +-+-+-+-+-+-+-+-+-+-+-+-+-+-
|--------------------------------------------------------------------------
*/    
});    
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

/* 
|--------------------------------------------------------------------------
Here Contacts
|--------------------------------------------------------------------------
*/
Route::resource('contacts', 'App\Http\Controllers\ContactController')->only(['index','destroy']); 
Route::get('/contacts/mark-read/{id}', 'App\Http\Controllers\ContactController@markRead')->name('contacts.mark-read');  
Route::get('/contacts/delete-all', 'App\Http\Controllers\ContactController@deleteAll')->name('contacts.delete.all');  
    
/* 
|--------------------------------------------------------------------------
Here Chats
|--------------------------------------------------------------------------
*/ 
Route::get('chat/{id}', 'App\Http\Controllers\ChatController@indexAdmin')->name('chat.index'); 
Route::post('chat/store', 'App\Http\Controllers\ChatController@storeAdmin')->name('chat.store'); 
    
});

/* 
|--------------------------------------------------------------------------
Here Laravel Route 
|--------------------------------------------------------------------------
*/ 
Auth::routes();
Route::get('register-member', 'App\Http\Controllers\MemberController@create')->name('register.member');//مهم مهم
Route::post('register-member', 'App\Http\Controllers\MemberController@store')->name('store.member');//مهم مهم
Route::get('/reload-captcha', [App\Http\Controllers\MemberController::class, 'reloadCaptcha']);

////////////////////////////// Here Start Public //////////////////////////////
/* 
|--------------------------------------------------------------------------
Here Home Page
|--------------------------------------------------------------------------
*/ 
Route::get('/', 'App\Http\Controllers\HomeController@publicHome')->name('index');
/* 
|--------------------------------------------------------------------------
Here Contacts
|--------------------------------------------------------------------------
*/
Route::post('contacts/store', 'App\Http\Controllers\ContactController@store')->name('contacts.store');
/* 
|--------------------------------------------------------------------------
Here Studies
|--------------------------------------------------------------------------
*/
Route::get('/study/{id}', 'App\Http\Controllers\StudyController@detailsPublic')->name('study.details');     
Route::get('/studies', 'App\Http\Controllers\StudyController@indexPublicStudies')->name('studies');     

////////////////////////////// Here End Public //////////////////////////////

Route::prefix('member/')->name('member.')->group(function () {
Route::middleware(['member', 'auth', 'verified'])->group(function () {
/*
|--------------------------------------------------------------------------
| Here Home Controller
|--------------------------------------------------------------------------
*/
//Route::get('bloked', 'HomeController@bloked')->name('bloked');    
//Route::get('no-access', 'HomeController@noAccess')->name('no-access');    
Route::get('dashboard', 'App\Http\Controllers\HomeMemberController@dashboard')->name('dashboard');    
//Route::get('profile', 'HomeController@profile')->name('profile');
Route::get('edit-profile', 'App\Http\Controllers\HomeMemberController@editMember')->name('edit-profile');    
Route::put('update-profile', 'App\Http\Controllers\HomeMemberController@memeberUpdate')->name('update-profile');    
Route::put('update-password', 'App\Http\Controllers\HomeMemberController@updatePassword')->name('update-password');   

/*
|--------------------------------------------------------------------------
| Here Studies Controller
|--------------------------------------------------------------------------
*/    
Route::get('/studies/{study_state}', 'App\Http\Controllers\StudyController@indexMember')->name('studies.index');
Route::get('/studies/create/{study_type}', 'App\Http\Controllers\StudyController@create')->name('studies.create');
Route::post('/studies/store', 'App\Http\Controllers\StudyController@store')->name('studies.store');
Route::get('/studies/edit/{id}', 'App\Http\Controllers\StudyController@edit')->name('studies.edit');
Route::put('/studies/update/{id}', 'App\Http\Controllers\StudyController@update')->name('studies.update');    
Route::get('/study/details/{id}', 'App\Http\Controllers\StudyController@detailsMember')->name('study.details');   
Route::get('/studies/excel/scientific/{study_state}', 'App\Http\Controllers\ExportExcelController@exportScientificStudy')->name('studies.excel.scientific');    
Route::get('/studies/excel/state/{study_state}', 'App\Http\Controllers\ExportExcelController@exportStateStudyExport')->name('studies.excel.state'); 
/* 
|--------------------------------------------------------------------------
Here Chats
|--------------------------------------------------------------------------
*/ 
Route::get('chat', 'App\Http\Controllers\ChatController@indexMember')->name('chat.index'); 
Route::post('chat/store', 'App\Http\Controllers\ChatController@storeMember')->name('chat.store');     
   
});
    
Route::get('/download-summary-ar/{id}', 'App\Http\Controllers\StudyController@downloadSummaryAr')->name('study.download-summary-ar'); 
Route::get('/download-summary-en/{id}', 'App\Http\Controllers\StudyController@downloadSummaryEn')->name('study.download-summary-en');
Route::get('/download-study/{id}', 'App\Http\Controllers\StudyController@downloadStudyFile')->name('study.download-study'); 
Route::get('/download-search-leave/{id}', 'App\Http\Controllers\StudyController@downloadSearchLeave_File')->name('study.download-study-leave');  
    
});

/* 
|--------------------------------------------------------------------------
Here Laravel Route 
|--------------------------------------------------------------------------
*/ 
Auth::routes(['verify' => true]);