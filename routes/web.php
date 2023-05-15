<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminClientNoteController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminProjectMilestoneController;
use App\Http\Controllers\Admin\AdminProjectNotesController;
use App\Http\Controllers\Admin\AdminProjectTasksController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminTransactionController;
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
    Route::post('clients/transaction-store', [AdminClientController::class, 'transactionStore'])->name('clients.transaction-store');
    Route::resource('clients', AdminClientController::class);
    Route::delete('clients/transaction-destroy/{id}', [AdminClientController::class, 'transactionDelete'])->name('clients.transaction-destroy');
    Route::post('clients/email-update/{id}', [AdminClientController::class, 'updateEmailAddress'])->name('clients.email-update');
    Route::post('clients/update-user-details/{id}', [AdminClientController::class, 'updateUserDetails'])->name('clients.update-user-details');

    //Transactions
    Route::resource('transactions', AdminTransactionController::class);

    //Admin Client Notes
    Route::resource('client-notes', AdminClientNoteController::class);

    //Projects
    Route::resource('projects', AdminProjectController::class);
    Route::resource('projects-tasks', AdminProjectTasksController::class);
    Route::resource('projects-notes', AdminProjectNotesController::class);
    Route::resource('projects-milestones', AdminProjectMilestoneController::class);


    //Settings
    Route::resource('settings', AdminSettingsController::class);

    //Activity log
    Route::post('activity/clear-log', [ActivityController::class, 'clearLog'])->name('activity.clear-log');
    Route::resource('activity', ActivityController::class);

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
