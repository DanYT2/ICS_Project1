<?php

  use App\Http\Controllers\AppointmentController;
  use App\Http\Controllers\DoctorController;
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
  Route::get('/dashboards', function (){
    return view('dashboards');
  });
  Route::get('/test', function (){
    return view('test');
  });

//  Route::get('/doctor/create', [DoctorController::class, 'create']);
/*  Route::group([
  'middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
  ]
], function (){
    Route::resource('doctor', 'App\Http\Controllers\DoctorController');
  });*/

  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('doctor', 'App\Http\Controllers\DoctorController');
  });

  Route::resource('appointment', 'App\Http\Controllers\AppointmentController');
  Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
