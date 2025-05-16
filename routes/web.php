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
use App\Http\Controllers\Maan_table10Controller;
use App\Http\Controllers\Test123Controller;
use App\Http\Controllers\Test1234Controller;
use App\Http\Controllers\Test_tableController;
use App\Http\Controllers\Test_table2Controller;
use App\Http\Controllers\Test3Controller;
use App\Http\Controllers\Test_table4Controller;
use App\Http\Controllers\Test_table5Controller;
use App\Http\Controllers\Tests01Controller;
use App\Http\Controllers\Test02Controller;
use App\Http\Controllers\Test03Controller;
use App\Http\Controllers\Test04Controller;
use App\Http\Controllers\Test05Controller;
use App\Http\Controllers\Test06Controller;
use App\Http\Controllers\Test07Controller;
use App\Http\Controllers\Test08Controller;
use App\Http\Controllers\Test09Controller;
use App\Http\Controllers\Test11Controller;
use App\Http\Controllers\Demo10Controller;
use App\Http\Controllers\Demo12Controller;
use App\Http\Controllers\Demo13Controller;
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
Route::resource('Maan_table10Controller', Maan_table10Controller::class);
Route::resource('Test123Controller', Test123Controller::class);
Route::resource('Test1234Controller', Test1234Controller::class);
Route::resource('Test_tableController', Test_tableController::class);
Route::resource('Test_table2Controller', Test_table2Controller::class);
Route::resource('Test3Controller', Test3Controller::class);
Route::resource('Test_table4Controller', Test_table4Controller::class);
Route::resource('Test_table5Controller', Test_table5Controller::class);
Route::resource('Tests01Controller', Tests01Controller::class);
Route::resource('Test02Controller', Test02Controller::class);
Route::resource('Test03Controller', Test03Controller::class);
Route::resource('Test04Controller', Test04Controller::class);
Route::resource('Test05Controller', Test05Controller::class);
Route::resource('Test06Controller', Test06Controller::class);
Route::resource('Test07Controller', Test07Controller::class);
Route::resource('Test08Controller', Test08Controller::class);
Route::resource('Test09Controller', Test09Controller::class);
Route::resource('Test11Controller', Test11Controller::class);
Route::resource('Demo10Controller', Demo10Controller::class);
Route::resource('Demo12Controller', Demo12Controller::class);
Route::resource('Demo13Controller', Demo13Controller::class);
// [ROUTE_CONTROLLERS]
