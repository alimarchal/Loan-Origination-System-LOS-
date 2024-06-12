<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\BorrowerBusinessController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BorrowerEmploymentInformationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanSubCategoryController;
use App\Http\Controllers\UserController;
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
        Route::get('/borrower', 'index')->name('borrower.index');;
        Route::get('/borrower/create', 'create')->name('borrower.create');;
        Route::post('/borrower', 'store')->name('borrower.store');;
        Route::get('/borrower/{borrower}/edit', 'edit')->name('borrower.edit');;
        Route::put('/borrower/{borrower}', 'update')->name('borrower.update');;
    });

    // Applicant Employment Information
    Route::controller(BorrowerEmploymentInformationController::class)->group(function () {
        Route::get('/borrower/{borrower}/employment-information', 'edit')->name('borrower.employment-information.edit');;
        Route::post('/borrower/{borrower}/employment-information', 'store')->name('borrower.employment-information.store');;
        Route::put('/borrower/{borrower}/employment-information/{borrowerEmploymentInformation}', 'update')->name('borrower.employment-information.update');;
    });


    // Applicant Business Information
    Route::controller(BorrowerBusinessController::class)->group(function () {
        Route::get('/borrower/{borrower}/applicant-business', 'edit')->name('borrower.applicant-business.edit');;
        Route::post('/borrower/{borrower}/applicant-business', 'store')->name('borrower.applicant-business.store');;
        Route::put('/borrower/{borrower}/applicant-business/{borrowerBusiness}', 'update')->name('borrower.applicant-business.update');;
    });



    // Applicant Business Information
    Route::controller(ChecklistController::class)->group(function () {
        Route::get('/borrower/{borrower}/checklist', 'show')->name('borrower.checklist.show');;
    });




    Route::get('/borrower/make-template', [BorrowerController::class, 'make_template'])->name('borrower.make-template');

    Route::get('administration', [AdministrationController::class, 'index'])->name('administration.index');

});
