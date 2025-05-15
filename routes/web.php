<?php

use App\Console\Commands\MakeMigrationCommand;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// $mit;
// $storeController = ucfirst(Storage::get('newController'));
// dump(ucfirst($storeController));

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/Home');

// Route::get('/Home', function(){
//     return view('Pages.Home');
// });

Route::resource('/Home', HomeController::class);


use App\Http\Controllers\Madhav_tableController;
Route::post('/Madhav_tableController', [Madhav_tableController::class, 'store'])->name('Madhav_tableController.store');
