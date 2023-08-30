<?php

use App\Http\Controllers\projectController;
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

Route::resource('project', projectController::class);

Route::delete('/delete', [projectController::class, 'destroy'])->name('destroy');

// Route::get("/insert", function(){
//     return view('mini-project.insert');
// });
