<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my-profile/{user}', 'UserController@userprofile')->name('profile');
    Route::patch('/update-profile/{user}','UserController@update')->name('update.profile');
});
Route::middleware(['auth', 'admin'])->group(function () {
    //employee
    Route::get('/all-employee','UserController@addEmployee')->name('all.employee');
    Route::post('store-employee','UserController@storeEmployee')->name('store.employee');
    Route::delete('/delete-employee/{user}','UserController@employeeDelete')->name('delete.employee');
    Route::patch('/update-profile-employee/{user}','UserController@updateEmployee')->name('update.profile.employee');
    //room
    Route::get('/add-room','RoomController@index')->name('add.room');
    Route::post('/store-room','RoomController@storeRoom')->name('store.room');
    Route::delete('/delete-room/{room}','RoomController@delete')->name('delete.room');
    Route::patch('/update-room/{room}','RoomController@update')->name('update.room');
    //meeting delete
    Route::delete('/admin-delete-meeting/{meeting}','MeetingController@adminmeetingDelete')->name('admin.delete.meeting');

});
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/add-meeting','MeetingController@index')->name('add.meeting');
    Route::post('/store-meeting','MeetingController@store')->name('store.meeting');
    Route::delete('/delete-meeting/{meeting}','MeetingController@ownMeetingDelete')->name('delete.meeting');
    Route::patch('/update-meeting/{meeting}','MeetingController@update')->name('update.meeting');
});
