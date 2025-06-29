<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SalesRepController,
    CombinedLeadController,
    UserManagementController,
    ClientDashboardController
};

Route::get('/', fn() => view('welcome'));
Auth::routes();

// ---------- DASHBOARDS ----------
Route::middleware(['auth', 'role:admin|sales_rep'])->get('/admin-dashboard', function () {
    $unassignedLeads = \App\Models\CombinedLead::whereNull('assigned_rep')->get();
    return view('dashboards.admin', compact('unassignedLeads'));
})->name('admin.dashboard');



Route::middleware(['auth', 'role:client'])->get('/client-dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');

// ---------- ADMIN ROUTES ----------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('sales-reps', SalesRepController::class);
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
});

// ---------- COMBINED LEADS ----------
Route::middleware(['auth', 'role:admin|sales_rep'])->group(function () {
    Route::resource('combined_leads', CombinedLeadController::class);
});

// ---------- CLIENT ROUTES ----------
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');

    // Quotation routes
    Route::resource('quotations', \App\Http\Controllers\QuotationController::class)->only([
        'create', 'store', 'index', 'show'
    ]);

    // Combined Lead routes (SHOW and STORE for client)
    Route::get('combined-leads/{combinedLead}', [CombinedLeadController::class, 'show'])->name('combined_leads.show');
    Route::post('combined-leads', [CombinedLeadController::class, 'store'])->name('combined_leads.store');
});


