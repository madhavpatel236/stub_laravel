<?php

use App\Console\Commands\MakeMigrationCommand;
// use app\Http\Controller\Customer14Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\XmlConfiguration\RemoveLogTypes;
use Illuminate\Support\Str;

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
// Route::post('/test',  $storeController$)->name('test');
// Route::post('/test',  "$storeController@index")->name('test');
// Route::resource('/test',  $storeController::class);

