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
use App\Http\Controllers\LostTimeAccidentsController;
use App\Http\Controllers\FirstAidCaseController;
use App\Http\Controllers\MedicalTreatedCaseController;
use App\Http\Controllers\NearMissController;
use App\Http\Controllers\SIFController;

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
Route::get('/attendance', [Attendance::class, 'index'])->name('attendance');
Route::get('/deviations', [Deviations::class, 'index'])->name('deviations');
Route::get('/task', [Task::class, 'index'])->name('tasks');
Route::get('/sfa', [SFAController::class, 'index'])->name('sfa');
Route::get('userslist', [UsersListController::class, 'index'])->name('userslist');
Route::get('roles', [RolesController::class, 'index'])->name('roles');
Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');
Route::get('faqs', [FAQController::class, 'index'])->name('faqs');
Route::get('help', [HelpController::class, 'index'])->name('help');

//badpractises routes
Route::get('badpractises', [BadPractisesController::class, 'index'])->name('badpractises');
Route::get('badpractise-search', [BadPractisesController::class, 'index'])->name('badpractises.search');
Route::get('badpractises/{id}', [BadPractisesController::class, 'show'])->name('badpractises.show');
Route::delete('/badpractises/{id}', [BadpractisesController::class, 'destroy'])->name('badpractises.destroy');
Route::put('/badpractises/{id}', [BadpractisesController::class, 'update'])->name('badpractises.update');

//goodpractises routes
Route::get('goodpractises', [GoodPractisesController::class, 'index'])->name('goodpractises');
Route::get('goodpractise-search', [GoodPractisesController::class, 'index'])->name('goodpractises.search');
Route::get('goodpractises/{id}', [GoodPractisesController::class, 'show'])->name('goodpractises.show');
Route::delete('/goodpractises/{id}', [GoodpractisesController::class, 'destroy'])->name('goodpractises.destroy');
Route::put('/goodpractises/{id}', [GoodpractisesController::class, 'update'])->name('goodpractises.update');

//improvements routes
Route::get('improvements', [ImprovementsController::class, 'index'])->name('improvements');
Route::get('improvement-search', [ImprovementsController::class, 'index'])->name('improvements.search');
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

//icas routes
Route::get('/icas', [ICASController::class, 'index'])->name('icas');
Route::get('/icas-search', [ICASController::class, 'index'])->name('icas.search');
Route::get('/add-icas', [ICASController::class, 'create'])->name('icas.create');
Route::post('/add-icas', [ICASController::class, 'store'])->name('icas.store');
Route::get('/icas/{id}', [ICASController::class, 'show'])->name('icas.show');
Route::delete('/icas/{id}', [ICASController::class, 'destroy'])->name('icas.destroy');
Route::put('/icas/{id}', [ICASController::class, 'update'])->name('icas.update');


//incidents routes
Route::get('/incidents', [Incidents::class, 'index'])->name('incidents');
Route::post('/incidents', [Incidents::class, 'store'])->name('incidents.store');

//nearmiss routes
Route::get('/nearmiss', [NearMissController::class, 'index'])->name('nearmiss');
Route::get('/nearmiss-search', [NearMissController::class, 'index'])->name('nearmiss.search');
Route::get('/nearmiss/{id}', [NearMissController::class, 'show'])->name('nearmiss.show');
Route::delete('/nearmiss/{id}', [NearMissController::class, 'destroy'])->name('nearmiss.destroy');
Route::put('/nearmiss/{id}', [NearMissController::class, 'update'])->name('nearmiss.update');

//medicaltreatedcase routes
Route::get('/medicaltreatedcase', [MedicalTreatedCaseController::class, 'index'])->name('medicaltreatedcase');
Route::get('/medicaltreatedcase-search', [MedicalTreatedCaseController::class, 'index'])->name('medicaltreatedcase.search');
Route::get('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'show'])->name('medicaltreatedcase.show');
Route::delete('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'destroy'])->name('medicaltreatedcase.destroy');
Route::put('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'update'])->name('medicaltreatedcase.update');

//lost time accidents routes
Route::get('/losttimeaccidents', [LostTimeAccidentsController::class, 'index'])->name('losttimeaccidents');
Route::get('/losttimeaccidents-search', [LostTimeAccidentsController::class, 'index'])->name('losttimeaccidents.search');
Route::get('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'show'])->name('losttimeaccidents.show');
Route::delete('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'destroy'])->name('losttimeaccidents.destroy');
Route::put('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'update'])->name('losttimeaccidents.update');

//firstaidcase routes
Route::get('/firstaidcase', [FirstAidCaseController::class, 'index'])->name('firstaidcase');
Route::get('/firstaidcase-search', [FirstAidCaseController::class, 'index'])->name('firstaidcase.search');
Route::get('/firstaidcase/{id}', [FirstAidCaseController::class, 'show'])->name('firstaidcase.show');
Route::delete('/firstaidcase/{id}', [FirstAidCaseController::class, 'destroy'])->name('firstaidcase.destroy');
Route::put('/firstaidcase/{id}', [FirstAidCaseController::class, 'update'])->name('firstaidcase.update');

//sif routes
Route::get('/sif', [SIFController::class, 'index'])->name('sif');
Route::get('/sif-search', [SIFController::class, 'index'])->name('sif.search');
Route::get('/sif/{id}', [SIFController::class, 'show'])->name('sif.show');
Route::delete('/sif/{id}', [SIFController::class, 'destroy'])->name('sif.destroy');
Route::put('/sif/{id}', [SIFController::class, 'update'])->name('sif.update');