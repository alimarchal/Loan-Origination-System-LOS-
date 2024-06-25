<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\BorrowerBusinessController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BorrowerEmploymentInformationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanSubCategoryController;
use App\Http\Controllers\RequestedLoanAmountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');


    Route::get('/loan-subcategories/{categoryId}', [LoanSubCategoryController::class, 'getLoanSubCategories'])->name('loan.subcategories');

    // Applicant
    Route::controller(BorrowerController::class)->group(function () {
        Route::get('/borrower', 'index')->name('applicant.index');;
        Route::get('/borrower/create', 'create')->name('applicant.create');;
        Route::post('/borrower', 'store')->name('applicant.store');;
        Route::get('/borrower/{borrower}/edit', 'edit')->name('applicant.edit');;
        Route::put('/borrower/{borrower}', 'update')->name('applicant.update');;
    });

    // Applicant Employment Information
    Route::controller(BorrowerEmploymentInformationController::class)->group(function () {
        Route::get('/borrower/{borrower}/employment-information', 'edit')->name('applicant.employment-information.edit');;
        Route::post('/borrower/{borrower}/employment-information', 'store')->name('applicant.employment-information.store');;
        Route::put('/borrower/{borrower}/employment-information/{borrowerEmploymentInformation}', 'update')->name('applicant.employment-information.update');;
    });

    // Applicant Business Information
    Route::controller(BorrowerBusinessController::class)->group(function () {
        Route::get('/borrower/{borrower}/applicant-business/index', 'index')->name('applicant.applicant-business.index');
        Route::get('/borrower/{borrower}/applicant-business/create', 'create')->name('applicant.applicant-business.create');
        Route::post('/borrower/{borrower}/applicant-business', 'store')->name('applicant.applicant-business.store');
        Route::get('/borrower/{borrower}/applicant-business/{businessID}/edit', 'edit')->name('applicant.applicant-business.edit');
        Route::put('/borrower/{borrower}/applicant-business/{borrowerBusiness}', 'update')->name('applicant.applicant-business.update');
        Route::delete('/applicant/{borrower}/applicant-business/{borrowerBusiness}/destroy', 'destroy')->name('applicant.applicant-business.destroy');
    });

    // Applicant Requested Loan Information
    Route::controller(RequestedLoanAmountController::class)->group(function () {
        Route::get('/applicant/{borrower}/requested-loan-information', 'edit')->name('applicant.requested-loan-information.edit');;
        Route::post('/applicant/{borrower}/requested-loan-information', 'store')->name('applicant.requested-loan-information.store');;
        Route::put('/applicant/{borrower}/requested-loan-information/{requestedLoanAmount}', 'update')->name('applicant.requested-loan-information.update');;
    });

    // Applicant Vehicle
    Route::controller(VehicleController::class)->group(function () {
        Route::get('/applicant/{borrower}/vehicles/index', 'index')->name('applicant.vehicle.index');
        Route::get('/applicant/{borrower}/vehicles/create', 'create')->name('applicant.vehicle.create');
        Route::post('/applicant/{borrower}/vehicles/{requestedLoanAmount}', 'store')->name('applicant.vehicle.store');
        Route::get('/applicant/{borrower}/vehicles/{vehicle}/edit', 'edit')->name('applicant.vehicles.edit');
        Route::put('/borrower/{borrower}/vehicles/{vehicle}', 'update')->name('applicant.vehicles.update');
        Route::delete('/applicant/{borrower}/vehicles/{vehicle}/destroy', 'destroy')->name('applicant.vehicles.destroy');
    });




    // Applicant Business Information
    Route::controller(ChecklistController::class)->group(function () {
        Route::get('/borrower/{borrower}/checklist', 'show')->name('applicant.checklist.show');;
    });




    Route::get('/borrower/make-template', [BorrowerController::class, 'make_template'])->name('applicant.make-template');
    Route::get('administration', [AdministrationController::class, 'index'])->name('administration.index');

});
