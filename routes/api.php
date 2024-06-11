<?php

use App\Http\Controllers\Api\v1\AuthenticationController;
use App\Http\Controllers\Api\v1\DashboardController;
use App\Http\Controllers\Api\v1\EnvironmentalController;
use App\Http\Controllers\Api\v1\FirstResponderController;
use App\Http\Controllers\Api\v1\IcaController;
use App\Http\Controllers\Api\v1\IncidentsController;
use App\Http\Controllers\Api\v1\PermitsApplicableController;
use App\Http\Controllers\Api\v1\PersonellController;
use App\Http\Controllers\Api\v1\SorController;
use App\Http\Controllers\Api\v1\SupervisorsController;
use App\Http\Controllers\Api\v1\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::prefix('/v1')->group(
    function () {
        Route::post('/login', [AuthenticationController::class, 'login']);
        Route::post('/users/register', [UserController::class, 'registerUnAuthenticatedUser']);

        Route::group(['middleware' => ['auth:sanctum', 'ensure.json.header']], function () {
            Route::post('/logout', [AuthenticationController::class, 'logout']);

            //tasks
            Route::ApiResource('/tasks', TasksController::class);
            //delete task
            Route::delete('/delete-task/{id}', [TasksController::class, 'destroy']);
            Route::post('/complete-task', [TasksController::class, 'markTaskAsCompleted']);
            //dashboard
            Route::get('/dashboard-stats', [DashboardController::class, 'index']);
            //sor types
            Route::get('/sor-types', [SorController::class, 'sorTypes']);
            //add sor
            Route::post('/add-sor', [SorController::class, 'store']);
            //open sor
            Route::get('/open-sor', [SorController::class, 'openSor']);
            //delete sor
            Route::delete('/delete-sor/{id}', [SorController::class, 'destroy']);
            //bad practice
            Route::get('/bad-practices', [SorController::class, 'badPractices']);
            //good practices
            Route::get('/good-practices', [SorController::class, 'goodPractices']);
            //reported hazards
            Route::get('/reported-hazards', [SorController::class, 'reportedHazards']);
            //improvement suggestions
            Route::get('/improvements', [SorController::class, 'improvements']);

            //incident types
            Route::get('/incident-types', [IncidentsController::class, 'index']);

            //add incident
            Route::post('/add-incident', [IncidentsController::class, 'store']);

            //open incidents
            Route::get('/open-incidents', [IncidentsController::class, 'openIncidents']);

            //near miss
            Route::get('/near-miss', [IncidentsController::class, 'nearMiss']);
            //first aid case
            Route::get('/first-aid-case', [IncidentsController::class, 'firstAidCase']);
            //medical treatment case
            Route::get('/medical-treatment-case', [IncidentsController::class, 'medicalTreatmentCase']);
            //lost time accident
            Route::get('/lost-time-accident', [IncidentsController::class, 'lostTimeAccident']);
            //sif
            Route::get('/sif', [IncidentsController::class, 'sif']);
            //delete incident
            Route::delete('/delete-incident/{id}', [IncidentsController::class, 'destroy']);

            //ica routes
            Route::get('/icas', [IcaController::class, 'index']);
            Route::post('/add-ica', [IcaController::class, 'store']);
            Route::delete('/delete-ica/{id}', [IcaController::class, 'destroy']);

            //permits routes
            Route::get('/permits', [PermitsApplicableController::class, 'index']);
            Route::post('/add-permit', [PermitsApplicableController::class, 'store']);
            Route::delete('/delete-permit/{id}', [PermitsApplicableController::class, 'destroy']);

            //supervisors
            Route::get('/supervisors', [SupervisorsController::class, 'index']);
            Route::post('/add-supervisor', [SupervisorsController::class, 'store']);
            Route::delete('/delete-supervisor/{id}', [SupervisorsController::class, 'destroy']);

            //personell routes
            Route::get('/personell', [PersonellController::class, 'index']);
            Route::post('/add-personell', [PersonellController::class, 'store']);
            Route::delete('/delete-personell/{id}', [PersonellController::class, 'destroy']);

            //first responders
            Route::get('/first-responders', [FirstResponderController::class, 'index']);
            Route::post('/add-first-responder', [FirstResponderController::class, 'store']);
            Route::delete('/delete-first-responder/{id}', [FirstResponderController::class, 'destroy']);

            //environmental policy
            Route::get('/environmental-policy', [EnvironmentalController::class, 'index']);
            Route::post('/add-environmental-form', [EnvironmentalController::class, 'storeFreeForm']);
            Route::post('/add-environmental-checklist', [EnvironmentalController::class, 'storeCheckList']);
            Route::delete('/delete-environmental-policy/{id}', [EnvironmentalController::class, 'destroy']);

        });
    }
);
