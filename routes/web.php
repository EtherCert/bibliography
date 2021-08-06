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
 
Route::get('notifications','NotificationsController@index')->name('notifications');
Route::delete('notifications/{id}','NotificationsController@delete')->name('notifications-delete');
Route::delete('notifications-add/','NotificationsController@deleteAll')->name('notifications-delete-all');
    
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
    
});

Route::get('/', function () { return view('site.index');})->name('index');

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
