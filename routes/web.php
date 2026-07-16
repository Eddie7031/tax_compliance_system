<?php

use Illuminate\Support\Facades\Route;
use App\Models\Client;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDocumentController;
use App\Http\Controllers\TaxObligationController;
use App\Http\Controllers\VatAnalysisController;
use App\Http\Controllers\VatPurchaseController;
use App\Http\Controllers\VatTransactionController;
use App\Http\Controllers\SalesVatController;
use App\Http\Controllers\VatReconciliationController;
use App\Http\Controllers\PurchaseVatController;
use App\Http\Controllers\DuplicateInvoiceController;
use App\Http\Controllers\VatExportController;
use App\Http\Controllers\VatPdfController;
Route::get(
    '/vat-analyses/{vatAnalysis}/export/pdf',
    [VatPdfController::class,'generate']
)->name('vat.export.pdf');
Route::get(
    '/vat-analyses/{vatAnalysis}/export/excel',
    [VatExportController::class,'excel']
)->name('vat.export.excel');
Route::get(
    '/vat-analyses/{vatAnalysis}/duplicate-invoices',
    [DuplicateInvoiceController::class,'index']
)->name('duplicate-invoices.index');
Route::get(
    '/vat-analyses/{vatAnalysis}/purchases',
    [PurchaseVatController::class, 'index']
)->name('purchase-vat.index');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'clients' => Client::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Clients
    |--------------------------------------------------------------------------
    */

    Route::resource('clients', ClientController::class);

    /*
    |--------------------------------------------------------------------------
    | Client Documents
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/clients/{client}/documents',
        [ClientDocumentController::class, 'store']
    )->name('documents.store');

    Route::get(
        '/documents/{document}/download',
        [ClientDocumentController::class, 'download']
    )->name('documents.download');

    Route::delete(
        '/documents/{document}',
        [ClientDocumentController::class, 'destroy']
    )->name('documents.destroy');

    /*
    |--------------------------------------------------------------------------
    | Tax Obligations
    |--------------------------------------------------------------------------
    */

    Route::get(
        'clients/{client}/tax-obligations/create',
        [TaxObligationController::class, 'create']
    )->name('tax-obligations.create');

    Route::post(
        'clients/{client}/tax-obligations',
        [TaxObligationController::class, 'store']
    )->name('tax-obligations.store');

    Route::get(
        'tax-obligations/{taxObligation}/edit',
        [TaxObligationController::class, 'edit']
    )->name('tax-obligations.edit');

    Route::put(
        'tax-obligations/{taxObligation}',
        [TaxObligationController::class, 'update']
    )->name('tax-obligations.update');

    Route::delete(
        'tax-obligations/{taxObligation}',
        [TaxObligationController::class, 'destroy']
    )->name('tax-obligations.destroy');

    /*
    |--------------------------------------------------------------------------
    | VAT Analyses
    |--------------------------------------------------------------------------
    */

    Route::resource('vat-analyses', VatAnalysisController::class);

    /*
    |--------------------------------------------------------------------------
    | VAT Purchases
    |--------------------------------------------------------------------------
    */

    Route::resource('vat-purchases', VatPurchaseController::class);

    /*
    |--------------------------------------------------------------------------
    | VAT Transaction Import
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/vat-transactions/create/{vatAnalysis}',
        [VatTransactionController::class, 'create']
    )->name('vat-transactions.create');

    Route::post(
        '/vat-transactions',
        [VatTransactionController::class, 'store']
    )->name('vat-transactions.store');

    /*
    |--------------------------------------------------------------------------
    | Sales VAT Register
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/vat-analyses/{vatAnalysis}/sales',
        [SalesVatController::class, 'index']
    )->name('sales-vat.index');

    /*
    |--------------------------------------------------------------------------
    | VAT Reconciliation
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/vat-analyses/{vatAnalysis}/reconcile',
        [VatReconciliationController::class, 'reconcile']
    )->name('vat-analyses.reconcile');

    /*
    |--------------------------------------------------------------------------
    | User Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

require __DIR__.'/auth.php';