<?php

use App\Http\Controllers\Task;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Incidents;
use App\Http\Controllers\Attendance;
use App\Http\Controllers\Deviations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SFAController;
use App\Http\Controllers\SORController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ICASController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersListController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\BadPractisesController;
use App\Http\Controllers\ImprovementsController;
use App\Http\Controllers\GoodPractisesController;
use App\Http\Controllers\ReportedHazardsController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/incidents', [Incidents::class, 'index'])->name('incidents');
Route::get('/attendance', [Attendance::class, 'index'])->name('attendance');
Route::get('/deviations', [Deviations::class, 'index'])->name('deviations');
Route::get('/task', [Task::class, 'index'])->name('tasks');
Route::get('/icas', [ICASController::class, 'index'])->name('icas');
Route::get('/sfa', [SFAController::class, 'index'])->name('sfa');
Route::get('userslist', [UsersListController::class, 'index'])->name('userslist');
Route::get('roles', [RolesController::class, 'index'])->name('roles');
Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');
Route::get('faqs', [FAQController::class, 'index'])->name('faqs');
Route::get('help', [HelpController::class, 'index'])->name('help');

//badpractises routes
Route::get('badpractises', [BadPractisesController::class, 'index'])->name('badpractises');
Route::get('badpractises/{id}', [BadPractisesController::class, 'show'])->name('badpractises.show');
Route::delete('/badpractises/{id}', [BadpractisesController::class, 'destroy'])->name('badpractises.destroy');
Route::put('/badpractises/{id}', [BadpractisesController::class, 'update'])->name('badpractises.update');

//goodpractises routes
Route::get('goodpractises', [GoodPractisesController::class, 'index'])->name('goodpractises');
Route::get('goodpractises/{id}', [GoodPractisesController::class, 'show'])->name('goodpractises.show');
Route::delete('/goodpractises/{id}', [GoodpractisesController::class, 'destroy'])->name('goodpractises.destroy');
Route::put('/goodpractises/{id}', [GoodpractisesController::class, 'update'])->name('goodpractises.update');

//improvements routes
Route::get('improvements', [ImprovementsController::class, 'index'])->name('improvements');
Route::get('improvements/{id}', [ImprovementsController::class, 'show'])->name('improvements.show');
Route::delete('/improvements/{id}', [ImprovementsController::class, 'destroy'])->name('improvements.destroy');
Route::put('/improvements/{id}', [ImprovementsController::class, 'update'])->name('improvements.update');

//reportedhazards routes
Route::get('hazards', [ReportedHazardsController::class, 'index'])->name('hazards');
Route::get('/reported-hazards', [ReportedHazardsController::class, 'index'])->name('reported-hazards.index');

Route::get('hazards/{id}', [ReportedHazardsController::class, 'show'])->name('hazards.show');
Route::delete('/hazards/{id}', [ReportedHazardsController::class, 'destroy'])->name('hazards.destroy');
Route::put('/hazards/{id}', [ReportedHazardsController::class, 'update'])->name('hazards.update');


//sor routes
Route::get('/sor', [SORController::class, 'index'])->name('sor');
Route::post('/sor', [SORController::class, 'store'])->name('sor.store');
