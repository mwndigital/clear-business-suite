<?php

use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Client\ClientIndexController;
use App\Http\Controllers\Lead\LeadIndexController;
use App\Http\Controllers\PasswordGenerateController;
use App\Http\Controllers\Staff\StaffIndexController;
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

//Super Admin & Admin Routes
Route::middleware(['auth', 'role:super admin|admin'])->name('admin.')->prefix('admin')->group(function(){
    //Dashboard
    Route::get('dashboard', [AdminIndexController::class, 'index'])->name('dashboard');

    //Clients
    Route::resource('clients', AdminClientController::class);

    //Password Generation Route
    Route::get('generate-password', [PasswordGenerateController::class, 'generatePassword'])->name('generate.password');
});

//Staff Routes
Route::middleware(['auth', 'role:staff'])->name('staff.')->prefix('staff')->group(function(){
    //Dashboard
    Route::get('dashboard', [StaffIndexController::class, 'index'])->name('dashboard');
});

//Client Routes
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function(){
    //Dashboard
    Route::get('dashboard', [ClientIndexController::class, 'index'])->name('dashboard');
});

//Lead Routes
Route::middleware(['auth', 'role:lead'])->name('lead.')->prefix('lead')->group(function(){
    //Dashboard
    Route::get('dashboard', [LeadIndexController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
