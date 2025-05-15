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
use App\Http\Controllers\NandController;
use App\Http\Controllers\TryController;
use App\Http\Controllers\Try2Controller;
use App\Http\Controllers\try2;
use App\Http\Controllers\Try3Controller;
use App\Http\Controllers\try3;
use App\Http\Controllers\Try4Controller;
use App\Http\Controllers\Try5Controller;
use App\Http\Controllers\Try6Controller;
use App\Http\Controllers\Try7Controller;
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
Route::resource('NandController', NandController::class);
Route::resource('TryController', TryController::class);
Route::resource('Try2Controller', Try2Controller::class);
Route::resource('Try3Controller', Try3Controller::class);
Route::resource('Try4Controller', Try4Controller::class);
Route::resource('Try5Controller', Try5Controller::class);
Route::resource('Try6Controller', Try6Controller::class);
Route::resource('Try7Controller', Try7Controller::class);
// [ROUTE_CONTROLLERS]
