<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BasicBorrowerFactSheetConsumerController;
use App\Http\Controllers\BorrowerBusinessController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BorrowerEmploymentInformationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\CreditReportingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FinanceFacilityController;
use App\Http\Controllers\GuarantorController;
use App\Http\Controllers\ListHouseHoldItemController;
use App\Http\Controllers\LoanSubCategoryController;
use App\Http\Controllers\ObligorScoreCardController;
use App\Http\Controllers\PersonalNetWorthStatController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\RequestedLoanAmountController;
use App\Http\Controllers\SalaryAutoFormController;
use App\Http\Controllers\SanctionAdviceController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('administration', [AdministrationController::class, 'index'])->name('administration.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::group(['middleware' => ['role:Admin|Super Admin']], function() {

    });


    Route::get('/loan-subcategories/{categoryId}', [LoanSubCategoryController::class, 'getLoanSubCategories'])->name('loan.subcategories');

    Route::get('/custom-loan-subcategories/{subCategoryId}', [LoanSubCategoryController::class, 'getOccupationTitles'])->name('loan.subcategories.custom');
    Route::get('/custom-borrower-types/{occupationTitle}/{subCategoryId}', [LoanSubCategoryController::class, 'getBorrowerTypes'])->name('borrower.types.custom');
    Route::get('/applicant-statuses/{subCategoryId}', [LoanSubCategoryController::class, 'getApplicantStatuses'])->name('applicant.statuses');


    // Applicant
    Route::controller(BorrowerController::class)->group(function () {
        Route::get('/borrower', 'index')->name('applicant.index');;
        Route::get('/borrower/create', 'create')->name('applicant.create');;
        Route::post('/borrower', 'store')->name('applicant.store');;
        Route::get('/borrower/{borrower}/edit', 'edit')->name('applicant.edit');
        Route::put('/borrower/{borrower}', 'update')->name('applicant.update');
        Route::put('/borrower/{borrower}/authorized', 'authorized')->name('applicant.authorized');
        Route::get('/applicant/{borrower}/show', 'show')->name('applicant.print');;
        Route::get('/applicant/{borrower}/download', 'download')->name('applicant.download');

        Route::get('/borrower/{borrower}/submit-for-approval', 'submit_for_approval_view')->name('borrower.submit_for_approval_view');
        Route::post('/applicant/{borrower}/submit', 'submit_consumer_salary')->name('borrower.submit_for_approval');
    });


    Route::controller(SanctionAdviceController::class)->group(function () {
        Route::get('/sanction-advice', 'index')->name('sanction-advice.index');
        Route::get('/sanction-advice/{borrower}/create', 'create')->name('sanction-advice.create');
    });


    // Applicant Employment Information
    Route::controller(BorrowerEmploymentInformationController::class)->group(function () {
        Route::get('/borrower/{borrower}/employment-information', 'edit')->name('applicant.employment-information.edit');;
        Route::post('/borrower/{borrower}/employment-information', 'store')->name('applicant.employment-information.store');;
        Route::put('/borrower/{borrower}/employment-information/{borrowerEmploymentInformation}', 'update')->name('applicant.employment-information.update');;
        Route::put('/borrower/{borrower}/employment-information/{borrowerEmploymentInformation}/authorized', 'authorized')->name('applicant.employment-information.authorized');;
    });

    // Applicant Business Information
    Route::controller(BorrowerBusinessController::class)->group(function () {
        Route::get('/borrower/{borrower}/applicant-business/index', 'index')->name('applicant.applicant-business.index');
        Route::get('/borrower/{borrower}/applicant-business/create', 'create')->name('applicant.applicant-business.create');
        Route::post('/borrower/{borrower}/applicant-business', 'store')->name('applicant.applicant-business.store');
        Route::get('/borrower/{borrower}/applicant-business/{businessID}/edit', 'edit')->name('applicant.applicant-business.edit');
        Route::put('/borrower/{borrower}/applicant-business/{borrowerBusiness}', 'update')->name('applicant.applicant-business.update');
        Route::put('/borrower/{borrower}/applicant-business/{borrowerBusiness}/authorized', 'authorized')->name('applicant.applicant-business.authorized');
        Route::delete('/applicant/{borrower}/applicant-business/{borrowerBusiness}/destroy', 'destroy')->name('applicant.applicant-business.destroy');
    });

    // Applicant Requested Loan Information
    Route::controller(RequestedLoanAmountController::class)->group(function () {
        Route::get('/applicant/{borrower}/requested-loan-information', 'edit')->name('applicant.requested-loan-information.edit');;
        Route::post('/applicant/{borrower}/requested-loan-information', 'store')->name('applicant.requested-loan-information.store');;
        Route::put('/applicant/{borrower}/requested-loan-information/{requestedLoanAmount}', 'update')->name('applicant.requested-loan-information.update');;
        Route::put('/applicant/{borrower}/requested-loan-information/{requestedLoanAmount}/authorized', 'authorized')->name('applicant.requested-loan-information.authorized');;
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



    // Applicant Guarantor Information
    Route::controller(GuarantorController::class)->group(function () {
        Route::get('/applicant/{borrower}/guarantor/index', 'index')->name('guarantor.index');
        Route::get('/applicant/{borrower}/guarantor/create', 'create')->name('guarantor.create');
        Route::post('/applicant/{borrower}/guarantor', 'store')->name('guarantor.store');
        Route::get('/applicant/{borrower}/guarantor/{guarantor}/edit', 'edit')->name('guarantor.edit');
        Route::put('/applicant/{borrower}/guarantor/{guarantor}', 'update')->name('guarantor.update');
        Route::put('/applicant/{borrower}/guarantor/{guarantor}/authorized', 'authorized')->name('guarantor.authorized');
        Route::delete('/applicant/{borrower}/guarantor/{guarantor}/destroy', 'destroy')->name('guarantor.destroy');
    });


    // Finance Facility Information
    Route::controller(FinanceFacilityController::class)->group(function () {
        Route::get('/applicant/{borrower}/finance-facility/index', 'index')->name('finance_facility.index');
        Route::get('/applicant/{borrower}/finance-facility/create', 'create')->name('finance_facility.create');
        Route::post('/applicant/{borrower}/finance-facility', 'store')->name('finance_facility.store');
        Route::get('/applicant/{borrower}/finance-facility/{financeFacility}/edit', 'edit')->name('finance_facility.edit');
        Route::put('/applicant/{borrower}/finance-facility/{financeFacility}', 'update')->name('finance_facility.update');
        Route::put('/applicant/{borrower}/finance-facility/{financeFacility}/authorized', 'authorized')->name('finance_facility.authorized');
        Route::delete('/applicant/{borrower}/finance-facility/{financeFacility}/destroy', 'destroy')->name('finance_facility.destroy');
    });


    // Security Information
    Route::controller(SecurityController::class)->group(function () {
        Route::get('/applicant/{borrower}/security/index', 'index')->name('security.index');
        Route::get('/applicant/{borrower}/security/create', 'create')->name('security.create');
        Route::post('/applicant/{borrower}/security', 'store')->name('security.store');
        Route::get('/applicant/{borrower}/security/{security}/edit', 'edit')->name('security.edit');
        Route::put('/applicant/{borrower}/security/{security}', 'update')->name('security.update');
        Route::put('/applicant/{borrower}/security/{security}/authorized', 'authorized')->name('security.authorized');
        Route::delete('/applicant/{borrower}/security/{security}/destroy', 'destroy')->name('security.destroy');
    });


    // Reference Information
    Route::controller(ReferenceController::class)->group(function () {
        Route::get('/applicant/{borrower}/reference/index', 'index')->name('reference.index');
        Route::get('/applicant/{borrower}/reference/create', 'create')->name('reference.create');
        Route::post('/applicant/{borrower}/reference', 'store')->name('reference.store');
        Route::get('/applicant/{borrower}/reference/{reference}/edit', 'edit')->name('reference.edit');
        Route::put('/applicant/{borrower}/reference/{reference}', 'update')->name('reference.update');
        Route::put('/applicant/{borrower}/reference/{reference}/authorized', 'authorized')->name('reference.authorized');
        Route::delete('/applicant/{borrower}/reference/{reference}/destroy', 'destroy')->name('reference.destroy');
    });


    // Document Information
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/applicant/{borrower}/document/index', 'index')->name('document.index');
        Route::get('/applicant/{borrower}/document/create', 'create')->name('document.create');
        Route::post('/applicant/{borrower}/document', 'store')->name('document.store');
        Route::get('/applicant/{borrower}/document/{document}/edit', 'edit')->name('document.edit');
        Route::put('/applicant/{borrower}/document/{document}', 'update')->name('document.update');
        Route::put('/applicant/{borrower}/document/{document}', 'authorized')->name('document.authorized');
        Route::delete('/applicant/{borrower}/document/{document}/destroy', 'destroy')->name('document.destroy');



    });


    // Fact Sheet Information
    Route::controller(BasicBorrowerFactSheetConsumerController::class)->group(function () {
        Route::get('/applicant/{borrower}/fact-sheet/index', 'index')->name('fact-sheet.index');
        Route::get('/applicant/{borrower}/fact-sheet/create', 'create')->name('fact-sheet.create');
        Route::post('/applicant/{borrower}/fact-sheet', 'store')->name('fact-sheet.store');
        Route::get('/applicant/{borrower}/fact-sheet', 'close')->name('fact-sheet.close');
        Route::delete('/applicant/{borrower}/fact-sheet/{factSheet}/destroy', 'destroy')->name('fact-sheet.destroy');
    });


    // Personal Net Worth Statement
    Route::controller(PersonalNetWorthStatController::class)->group(function () {
        Route::get('/applicant/{borrower}/personal-net-worth-statement-consumer/index', 'index')->name('pnws.index');
    });

// List House Hold Item Information
    Route::controller(ListHouseHoldItemController::class)->group(function () {
        Route::get('/applicant/{borrower}/list-house-hold-item/index', 'index')->name('list-house-hold-item.index');
        Route::get('/applicant/{borrower}/list-house-hold-item/create', 'create')->name('list-house-hold-item.create');
        Route::post('/applicant/{borrower}/list-house-hold-item', 'store')->name('list-house-hold-item.store');
        Route::get('/applicant/{borrower}/list-house-hold-item/{listHouseHoldItem}/edit', 'edit')->name('list-house-hold-item.edit');
        Route::put('/applicant/{borrower}/list-house-hold-item/{listHouseHoldItem}', 'update')->name('list-house-hold-item.update');
        Route::put('/applicant/{borrower}/list-house-hold-item/{listHouseHoldItem}/authorized', 'authorized')->name('list-house-hold-item.authorized');
        Route::delete('/applicant/{borrower}/list-house-hold-item/{listHouseHoldItem}/destroy', 'destroy')->name('list-house-hold-item.destroy');
    });

    // houNet Worth Statement
    Route::controller(ObligorScoreCardController::class)->group(function () {
        Route::get('/applicant/{borrower}/obligor-score-card/index', 'index')->name('obligor-score-card.index');
        Route::post('/applicant/{borrower}/obligor-score-card/store', 'store')->name('obligor-score-card.store');
        Route::delete('/applicant/{borrower}/obligor-score-card/destroy', 'destroy')->name('obligor-score-card.destroy');
    });


    Route::controller(AssetController::class)->group(function () {
        Route::get('/applicant/{borrower}/guarantor-undertaking-credit-report/index', 'index')->name('guarantor-undertaking-credit-report.index');
    });


    // Applicant Business Information
    Route::controller(ChecklistController::class)->group(function () {
        Route::get('/borrower/{borrower}/checklist', 'show')->name('applicant.checklist.show');;

    });



    // Auto Generated Reports
    Route::controller(SalaryAutoFormController::class)->group(function () {
        Route::get('/borrower/{borrower}/employer-undertaking', 'employer_undertaking')->name('employer.undertaking');;
    });



    Route::get('/borrower/make-template', [BorrowerController::class, 'make_template'])->name('applicant.make-template');



    // Applicant Requested Loan Information
    Route::controller(CreditReportingController::class)->group(function () {
        Route::get('/data-check-report', 'index')->name('credit-reporting.index');
        Route::get('/data-check-report/data-check-reporting-request', 'create')->name('credit-reporting.create');
        Route::post('/data-check-report/data-check-reporting-request', 'store')->name('credit-reporting.store');
        Route::get('/data-check-report/data-check-reporting-request/{creditReporting}/edit', 'edit')->name('credit-reporting.edit');
        Route::put('/data-check-report/data-check-reporting-request/{creditReporting}', 'update')->name('credit-reporting.update');
    });








});
