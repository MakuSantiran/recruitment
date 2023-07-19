<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

// use Inertia\Inertia;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\EmpStatusController;
use App\Http\Controllers\LandingPageController;
// use App\Models\User;

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

// Public Website 
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'getActiveOpp')->name('landingPage');
    Route::get('/search', 'searchOpp')->name('landingSearch');
    Route::get('/opportunities', 'getAllOpp')->name('opportunities');
    Route::get('/opportunity/{slug}','showOpp')->name('opportunity');
});

Route::get('/login', function() {
    return view('applicant.login');
})->name('login')->middleware('guest');

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/registration', function() {
    return view('applicant.registration');
})->name('registration')->middleware('guest');

Route::post('/register', [UserController::class, 'register']); 

Route::prefix('my')->group(function () {

    Route::post('/getAll', [OpportunityController::class, 'getAll']);
    Route::post('/getApplicant', [UserController::class, 'getApplicant']);
    
    Route::get('/{vue_route?}', [UserController::class, 'dashboard'])->where('vue_route', '[\/\w\.-]*');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', function() {
        return view('admin.login');  
    })->name('admin.login')->middleware('guest');
    

    Route::post('/login', [AdminController::class, 'login']);  
    Route::post('/logout', [AdminController::class, 'logout']);  

    Route::post('/publish', [OpportunityController::class, 'publish']);
    Route::post('/getAll', [OpportunityController::class, 'getAll']);
    Route::post('/update', [OpportunityController::class, 'update']);
    Route::post('/deleteOppurtunity/{id}', [OpportunityController::class, 'deleteOpportunity']);

    Route::post('/getEmpStatus', [EmpStatusController::class, 'getEmpStatus']);

    Route::get('/{vue_route?}', [OpportunityController::class, 'adminIndex'])->where('vue_route', '[\/\w\.-]*');
});




/*
19/7/2023
    ctrl + shift + p -> Index workspace to fix it  9:40am


*/