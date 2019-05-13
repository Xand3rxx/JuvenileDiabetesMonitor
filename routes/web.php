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

/* 
    All Routes related to user authentication
*/
Route::get('/', 'Auth\LoginController@index');
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/authenticate-login','Auth\LoginController@authLogin')->name('authLogin');
Route::get('/checklogin', 'Auth\LoginController@checkUser')->name('checklogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


/* 
    All Routes related to Physiciian
    Route List: Home, Appointments, 

*/

Route::get('/physician', 'PhysicianController@index')->name('physicianHome');
Route::get('/patient', 'PatientController@index')->name('patientHome');
Route::get('/all-patients', 'PhysicianController@allPatients');
Route::get('/physician-appointment', 'PhysicianController@allAppointments');
Route::get('/physician-settings', 'PhysicianController@settings');


/* 
    All Routes related to user Registration

*/

Route::get('/register-patient', function () { return view('auth.registerPatient'); })->name('registerPatient');
Route::post('/register-new-patient', 'PatientController@store')->name('newPatient');
Route::get('/register-physician', function () { return view('auth.registerPhysician'); })->name('registerPhysician');
Route::post('/register-new-physician', 'PhysicianController@store')->name('newPyhsician');
