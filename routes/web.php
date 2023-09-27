<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Incidents;
use App\Http\Controllers\Attendance;
use App\Http\Controllers\Deviations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SIFController;
use App\Http\Controllers\SORController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ICASController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermitsController;
use App\Http\Controllers\NearMissController;
use App\Http\Controllers\UsersListController;
use App\Http\Controllers\UserTasksController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\BadPractisesController;
use App\Http\Controllers\FirstAidCaseController;
use App\Http\Controllers\ImprovementsController;
use App\Http\Controllers\GoodPractisesController;
use App\Http\Controllers\ReportedHazardsController;
use App\Http\Controllers\LostTimeAccidentsController;
use App\Http\Controllers\MedicalTreatedCaseController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/attendance', [Attendance::class, 'index'])->name('attendance');
    Route::get('/deviations', [Deviations::class, 'index'])->name('deviations');
    Route::get('/permits', [PermitsController::class, 'index'])->name('permits');
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');
    Route::get('faqs', [FAQController::class, 'index'])->name('faqs');
    Route::get('help', [HelpController::class, 'index'])->name('help');

    //badpractises routes
    Route::get('badpractises', [BadPractisesController::class, 'index'])->name('badpractises');
    Route::get('badpractise-search', [BadPractisesController::class, 'index'])->name('badpractises.search');
    Route::get('badpractises/{id}', [BadPractisesController::class, 'show'])->name('badpractises.show');
    Route::delete('/badpractises/{id}', [BadpractisesController::class, 'destroy'])->name('badpractises.destroy');
    Route::patch('/badpractises/{id}', [BadpractisesController::class, 'update'])->name('badpractises.update');

    //goodpractises routes
    Route::get('goodpractises', [GoodPractisesController::class, 'index'])->name('goodpractises');
    Route::get('goodpractise-search', [GoodPractisesController::class, 'index'])->name('goodpractises.search');
    Route::get('goodpractises/{id}', [GoodPractisesController::class, 'show'])->name('goodpractises.show');
    Route::delete('/goodpractises/{id}', [GoodpractisesController::class, 'destroy'])->name('goodpractises.destroy');
    Route::patch('/goodpractises/{id}', [GoodpractisesController::class, 'update'])->name('goodpractises.update');

    //improvements routes
    Route::get('improvements', [ImprovementsController::class, 'index'])->name('improvements');
    Route::get('improvement-search', [ImprovementsController::class, 'index'])->name('improvements.search');
    Route::get('improvements/{id}', [ImprovementsController::class, 'show'])->name('improvements.show');
    Route::delete('/improvements/{id}', [ImprovementsController::class, 'destroy'])->name('improvements.destroy');
    Route::patch('/improvements/{id}', [ImprovementsController::class, 'update'])->name('improvements.update');

    //reportedhazards routes
    Route::get('hazards', [ReportedHazardsController::class, 'index'])->name('hazards');
    Route::get('/reported-hazards', [ReportedHazardsController::class, 'index'])->name('reported-hazards.index');
    Route::get('hazards/{id}', [ReportedHazardsController::class, 'show'])->name('hazards.show');
    Route::delete('/hazards/{id}', [ReportedHazardsController::class, 'destroy'])->name('hazards.destroy');
    Route::patch('/hazards/{id}', [ReportedHazardsController::class, 'update'])->name('hazards.update');


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
    Route::patch('/icas/{id}', [ICASController::class, 'update'])->name('icas.update');


    //incidents routes
    Route::get('/incidents', [Incidents::class, 'index'])->name('incidents');
    Route::post('/incidents', [Incidents::class, 'store'])->name('incidents.store');

    //nearmiss routes
    Route::get('/nearmiss', [NearMissController::class, 'index'])->name('nearmiss');
    Route::get('/nearmiss-search', [NearMissController::class, 'index'])->name('nearmiss.search');
    Route::get('/nearmiss/{id}', [NearMissController::class, 'show'])->name('nearmiss.show');
    Route::delete('/nearmiss/{id}', [NearMissController::class, 'destroy'])->name('nearmiss.destroy');
    Route::patch('/nearmiss/{id}', [NearMissController::class, 'update'])->name('nearmiss.update');

    //medicaltreatedcase routes
    Route::get('/medicaltreatedcase', [MedicalTreatedCaseController::class, 'index'])->name('medicaltreatedcase');
    Route::get('/medicaltreatedcase-search', [MedicalTreatedCaseController::class, 'index'])->name('medicaltreatedcase.search');
    Route::get('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'show'])->name('medicaltreatedcase.show');
    Route::delete('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'destroy'])->name('medicaltreatedcase.destroy');
    Route::patch('/medicaltreatedcase/{id}', [MedicalTreatedCaseController::class, 'update'])->name('medicaltreatedcase.update');

    //lost time accidents routes
    Route::get('/losttimeaccidents', [LostTimeAccidentsController::class, 'index'])->name('losttimeaccidents');
    Route::get('/losttimeaccidents-search', [LostTimeAccidentsController::class, 'index'])->name('losttimeaccidents.search');
    Route::get('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'show'])->name('losttimeaccidents.show');
    Route::delete('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'destroy'])->name('losttimeaccidents.destroy');
    Route::patch('/losttimeaccidents/{id}', [LostTimeAccidentsController::class, 'update'])->name('losttimeaccidents.update');

    //firstaidcase routes
    Route::get('/firstaidcase', [FirstAidCaseController::class, 'index'])->name('firstaidcase');
    Route::get('/firstaidcase-search', [FirstAidCaseController::class, 'index'])->name('firstaidcase.search');
    Route::get('/firstaidcase/{id}', [FirstAidCaseController::class, 'show'])->name('firstaidcase.show');
    Route::delete('/firstaidcase/{id}', [FirstAidCaseController::class, 'destroy'])->name('firstaidcase.destroy');
    Route::patch('/firstaidcase/{id}', [FirstAidCaseController::class, 'update'])->name('firstaidcase.update');

    //sif routes
    Route::get('/sif', [SIFController::class, 'index'])->name('sif');
    Route::get('/sif-search', [SIFController::class, 'index'])->name('sif.search');
    Route::get('/sif/{id}', [SIFController::class, 'show'])->name('sif.show');
    Route::delete('/sif/{id}', [SIFController::class, 'destroy'])->name('sif.destroy');
    Route::patch('/sif/{id}', [SIFController::class, 'update'])->name('sif.update');

    //roles routes
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::patch('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show');

    //userslist routes
    Route::get('userslist', [UsersListController::class, 'index'])->name('userslist');
    Route::post('userslist', [UsersListController::class, 'store'])->name('userslist.store');
    Route::get('userslist/{id}/edit', [UsersListController::class, 'edit'])->name('userslist.edit');
    Route::delete('userslist/{id}', [UsersListController::class, 'destroy'])->name('userslist.destroy');
    Route::patch('userslist/{id}/update', [UsersListController::class, 'update'])->name('userslist.update');


    //user tasks routes
    Route::get('user-tasks', [UserTasksController::class, 'index'])->name('user-tasks');
    Route::post('user-tasks', [UserTasksController::class, 'store'])->name('user-tasks.store');
    Route::get('user-tasks/{id}', [UserTasksController::class, 'show'])->name('user-tasks.show');
    Route::delete('user-tasks/{id}', [UserTasksController::class, 'destroy'])->name('user-tasks.destroy');
    Route::post('user-tasks/{id}', [UserTasksController::class, 'update'])->name('user-tasks.update');
    Route::get('user-tasks/{id}/edit', [UserTasksController::class, 'edit'])->name('user-tasks.edit');

    //enviromental routes
    Route::get('environment', [EnvironmentController::class, 'index'])->name('environment');

});
