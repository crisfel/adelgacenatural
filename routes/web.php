<?php

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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'IsEnabled']], static function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //USERS
    Route::get('/users/{id}', App\Http\Controllers\Users\IndexUsersController::class)->name('users.index');
    Route::get('/users-create/{role}', App\Http\Controllers\Users\CreateUsersController::class)->name('users.create');
    Route::post('/users-store', App\Http\Controllers\Users\StoreUsersController::class)->name('users.store');
    Route::get('/users-edit/{id}', App\Http\Controllers\Users\EditUsersController::class)->name('users.edit');
    Route::post('/users-update', App\Http\Controllers\Users\UpdateUsersController::class)->name('users.update');
    Route::get('/users-delete/{id}', App\Http\Controllers\Users\DeleteUsersController::class)->name('users.delete');
    Route::get('/assign-treatments/{id}', App\Http\Controllers\Users\AssignTreatmentsUsersController::class)->name('assign.treatments');
    Route::post('/store-treatments-assignments/', App\Http\Controllers\Users\StoreAssignmentsUsersController::class)->name('store.assignments');
    Route::post('/users-enable', App\Http\Controllers\Users\EnableUsersController::class)->name('users.enable');



    //TREATMENTS
    Route::get('/treatments', App\Http\Controllers\Treatments\IndexTreatmentsController::class)->name('treatments.index');
    Route::get('/treatments-create', App\Http\Controllers\Treatments\CreateTreatmentsController::class)->name('treatments.create');
    Route::post('/treatments-store', App\Http\Controllers\Treatments\StoreTreatmentsController::class)->name('treatments.store');
    Route::get('/treatments-edit/{id}', App\Http\Controllers\Treatments\EditTreatmentsController::class)->name('treatments.edit');
    Route::post('/treatments-update', App\Http\Controllers\Treatments\UpdateTreatmentsController::class)->name('treatments.update');
    Route::get('/treatments-detail/{id}', App\Http\Controllers\Treatments\DetailTreatmentsController::class)->name('treatments.detail');
    Route::get('/treatments-delete/{id}', App\Http\Controllers\Treatments\DeleteTreatmentsController::class)->name('treatments.delete');

    //RECORDS
    Route::get('/records/{id}', App\Http\Controllers\Records\IndexRecordsController::class)->name('records.index');
    Route::get('/records-create/{id}', App\Http\Controllers\Records\CreateRecordsController::class)->name('records.create');
    Route::post('/records-store', App\Http\Controllers\Records\StoreRecordsController::class)->name('records.store');
    Route::get('/records-edit/{id}', App\Http\Controllers\Records\EditRecordsController::class)->name('records.edit');
    Route::post('/records-update', App\Http\Controllers\Records\UpdateRecordsController::class)->name('records.update');

    //APPOINTMENTS
    Route::get('/appointments', App\Http\Controllers\Appointments\IndexAppointmentsController::class)->name('appointments.index');
    Route::get('/appointments-create', App\Http\Controllers\Appointments\CreateAppointmentsController::class)->name('appointments.create');
    Route::post('/appointments-store', App\Http\Controllers\Appointments\StoreAppointmentsController::class)->name('appointments.store');
    Route::post('/appointments-change-status', App\Http\Controllers\Appointments\ChangeStatusAppointmentsController::class)->name('appointments.change-status');


});
