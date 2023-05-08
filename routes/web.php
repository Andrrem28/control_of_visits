<?php

use App\Http\Controllers\Admin\{InstitutionController, DashboardController, SectorController, UnitController, UserController, VisitController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('institutions', InstitutionController::class);
    Route::resource('units', UnitController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('users', UserController::class);
    Route::resource('visits', VisitController::class);
    Route::patch('visit/confirm-visit/{visitId}', [VisitController::class, 'confirmVisit'])->name('confirmed');
    Route::patch('visit/canceled-visit/{visitId}', [VisitController::class, 'canceledVisit'])->name('canceled');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
