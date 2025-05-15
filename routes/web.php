<?php

use App\Console\Commands\MakeMigrationCommand;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\AController;
use App\Http\Controllers\PatelController;
use App\Http\Controllers\Patel1Controller;
use App\Http\Controllers\Patel2Controller;
use App\Http\Controllers\ParthController;
use App\Http\Controllers\MaanController;
use App\Http\Controllers\Maan2Controller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AAAController;
use App\Http\Controllers\BBBController;
use App\Http\Controllers\TestingController;

// use App\Http\Controllers\TestingController;
// [USE_CONTROLLERS]


Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/Home');

Route::resource('/Home', HomeController::class);

Route::resource('patel', PatelController::class);
Route::resource('Patel1Controller', Patel1Controller::class);
Route::resource('Patel2Controller', Patel2Controller::class);
Route::resource('ParthController', ParthController::class);
Route::resource('MaanController', MaanController::class);
Route::resource('Maan2Controller', Maan2Controller::class);
Route::resource('TestController', TestController::class);
Route::resource('AAAController', AAAController::class);
Route::resource('BBBController', BBBController::class);
Route::resource('TestingController', TestingController::class);
// [ROUTE_CONTROLLERS]
