<?php

  use App\Http\Controllers\AppointmentController;
  use App\Http\Controllers\DoctorController;
  use App\Http\Controllers\FrontendController;
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

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('/', [FrontendController::class, 'index']);


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

/*  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'doctor'
  ])->group(function (){
    Route::resource('appointment', 'App\Http\Controllers\AppointmentController');
    Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [AppointmentController::class, 'updateTime'])->name('appointment.update');

  });*/

  Route::resource('appointment', 'App\Http\Controllers\AppointmentController');
  Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
  Route::post('/appointment/update', [AppointmentController::class, 'updateTime'])->name('appointment.update');
