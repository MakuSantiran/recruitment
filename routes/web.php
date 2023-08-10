<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

// use Inertia\Inertia;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\EmpStatusController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PendingController;

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
    Route::get('/opportunity/id/{slug}','showOpp')->name('opportunity');
});

// login logout // login logout // login logout // login logout // login logout // login logout 
Route::get('/login', function() {
    $opId = '';
    return view('applicant.login', compact('opId'));
})->name('login')->middleware('guest');

Route::get('/login/redirect={opId?}', function($opId) {
    return view('applicant.login', compact('opId'));
})->name('loginRe')->middleware('guest');

Route::post('/login/{opId?}', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);


// registration// registration// registration// registration// registration
 
Route::get('/registration', function() {
    $opId = -1;
    return view('applicant.registration', compact('opId'));
})->name('registration')->middleware('guest');

Route::get('/registration/redirect={opId?}', function($opId) {
    return view('applicant.registration', compact('opId'));
})->name('registrationRe')->middleware('guest');

Route::post('/register', [UserController::class, 'register']); 

// ?????
Route::post('/getApplicant', [UserController::class, 'getApplicant']);
Route::post('/getOpp/{id}', [OpportunityController::class, 'getOpp']);

//uploading related things 
Route::post('/userUploadDoc', [UploadController::class, 'initiateUpload']);

// this just means if nakapag log in na si user
Route::prefix('my')->group(function () {

    // opportunity related things
    Route::post('/getAll', [OpportunityController::class, 'getAll']);
    Route::post('/userSearchOpps', [OpportunityController::class, 'displaySearched']);
    
    // pending applications
    Route::post('/getPending/{id}', [PendingController::class, 'helloWorld']);
    
    // ??? uhh
    Route::post('/getApplicant', [UserController::class, 'getApplicant']);
    Route::post('my/getApplicant', [UserController::class, 'getApplicant']);
    
    // portfolio related things
    Route::post('/updBasicInf', [PortfolioController::class, 'updateUserForm']);
    Route::post('/addEdu', [PortfolioController::class, 'addUserEducattion']);
    Route::post('/addExp', [PortfolioController::class, 'addUserExp']);
    Route::post('/addEli', [PortfolioController::class, 'addUserEli']);
    Route::post('/addTrain', [PortfolioController::class, 'addUserTrain']);


    Route::post('/getUserAdress', [PortfolioController::class, 'getAddress']);
    Route::post('/getEmpStatus', [EmpStatusController::class, 'getEmpStatus']);

    //file address
    Route::post('/getFileAddress', [UploadController::class, 'getFileAddress']);
    Route::post('/withdrawApplication', [PendingController::class, 'withdrawApplication']);

    Route::get('/{vue_route?}', [UserController::class, 'dashboard'])->where('vue_route', '[\/\w\.-]*');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', function() {
        return view('admin.login');  
    })->name('admin.login')->middleware('guest');
    
    Route::post('/getPendingAsAdmin', [PendingController::class, 'getPendingAsAdmin']);
    Route::post('/markPending', [PendingController::class, 'markPending']);
    Route::post('/getFileAddress', [UploadController::class, 'getFileAddress']);


    Route::post('/getApplicantDetails', [PortfolioController::class, 'getApplicantDetails']);
    Route::post('/getEducationDetails', [PortfolioController::class, 'getEducationDetails']);
    Route::post('/getWorkExperience', [PortfolioController::class, 'getWorkExperience']);
    Route::post('/getEligibility', [PortfolioController::class, 'getEligibility']);
    Route::post('/getTraining', [PortfolioController::class, 'getTraining']);
    Route::post('/getUserAdress', [PortfolioController::class, 'getAddress']);
    
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