<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SalesRepController,
    QuotationController,
    LeadController,
    AnnouncementController,
    ChecklistController,
    InquiryController,
    UserManagementController,
    CombinedLeadController
};

Route::get('/', fn() => view('welcome'));
Auth::routes();

// ------------------ Dashboards ------------------
Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', fn() => view('dashboards.admin'))->name('admin.dashboard');
Route::middleware(['auth', 'role:sales_rep'])->get('/sales-dashboard', fn() => view('dashboards.sales_rep'))->name('sales.dashboard');
Route::middleware(['auth', 'role:client'])->get('/client-dashboard', fn() => view('dashboards.client'))->name('client.dashboard');
// Route::middleware(['auth', 'role:client'])->get('/client-dashboard', fn () => view('dashboards.client'))->name('client.dashboard');

// ------------------ Admin Routes ------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('sales-reps', SalesRepController::class);
    // Route::resource('announcements', AnnouncementController::class);
    // Route::resource('checklists', ChecklistController::class);
    // Route::resource('inquiries', InquiryController::class);
    // Route::resource('quotations', QuotationController::class);
    Route::resource('combined_leads', CombinedLeadController::class);
    // Route::get('/combined-leads/{combinedLead}/edit', [CombinedLeadController::class, 'edit'])->name('combined_leads.edit');


    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
});

// ------------------ Sales Rep Routes ------------------
Route::middleware(['auth', 'role:sales_rep'])->prefix('rep')->name('rep.')->group(function () {
    Route::get('checklists', [ChecklistController::class, 'index'])->name('checklists.index');
    Route::get('checklists/create', [ChecklistController::class, 'create'])->name('checklists.create');
    Route::post('checklists', [ChecklistController::class, 'store'])->name('checklists.store');
    Route::get('checklists/{checklist}', [ChecklistController::class, 'show'])->name('checklists.show');
    Route::get('checklists/{checklist}/edit', [ChecklistController::class, 'edit'])->name('checklists.edit');
    Route::put('checklists/{checklist}', [ChecklistController::class, 'update'])->name('checklists.update');

    // Route::get('leads', [LeadController::class, 'index'])->name('leads.index');
    // Route::get('leads/create', [LeadController::class, 'create'])->name('leads.create');
    // Route::post('leads', [LeadController::class, 'store'])->name('leads.store');
    // Route::get('leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
    // Route::get('leads/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    // Route::put('leads/{lead}', [LeadController::class, 'update'])->name('leads.update');

    Route::get('quotations', [QuotationController::class, 'index'])->name('quotations.index');
});

// ------------------ Client Routes ------------------
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('quotations/create', [QuotationController::class, 'create'])->name('quotations.create');
    Route::post('quotations', [QuotationController::class, 'store'])->name('quotations.store');
    Route::get('quotations', [QuotationController::class, 'index'])->name('quotations.index');
    Route::get('quotations/{quotation}', [QuotationController::class, 'show'])->name('quotations.show');

    Route::get('combined-leads/create', [CombinedLeadController::class, 'create'])->name('leads.create');
    Route::post('combined-leads', [CombinedLeadController::class, 'store'])->name('leads.store');
    Route::get('combined-leads', [CombinedLeadController::class, 'index'])->name('leads.index');
    Route::get('combined-leads/{combinedLead}', [CombinedLeadController::class, 'show'])->name('leads.show');

    // Route::get('inquiries/create', [InquiryController::class, 'create'])->name('inquiries.create');
    // Route::post('inquiries', [InquiryController::class, 'store'])->name('inquiries.store');
    // Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    // Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
});

Route::get('/admin-dashboard', function () {
    $unassignedQuotations = \App\Models\Quotation::whereNotIn('id', \App\Models\Lead::pluck('quotation_id'))->get();
    return view('dashboards.admin', compact('unassignedQuotations'));
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');
