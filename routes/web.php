<?php

use App\Console\Commands\MakeMigrationCommand;
use app\Http\Controller\Test_table1;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/Home');

// Route::get('/Home', function(){
//     return view('Pages.Home');
// });

Route::resource('/Home', HomeController::class);
// Route::resource('/view', [Test_table1::class]);
