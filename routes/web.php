<?php

use App\Http\Controllers\Admin\AdminIndexController;
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

Route::get('/', function(){
    return redirect('login');
});

//Admin & Super Admin Routes
Route::middleware(['auth', 'role:super admin|admin'])->name('admin.')->prefix('admin')->group(function(){
    //Main Dashboard Route
   Route::get('dashboard', [AdminIndexController::class, 'index'])->name('dashboard');

   //Clients Routes


});

//Staff Routes
Route::middleware(['auth', 'role:staff'])->name('staff.')->prefix('staff')->group(function(){

});

//Client Routes
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function(){

});

//Lead Routes
Route::middleware(['auth', 'role:lead'])->name('lead.')->prefix('lead')->group(function(){

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
