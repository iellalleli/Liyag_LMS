@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🎯 Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($unassignedQuotations->count())
        <div class="alert alert-warning">
            ⚠️ <strong>{{ $unassignedQuotations->count() }}</strong> new quotation{{ $unassignedQuotations->count() > 1 ? 's' : '' }} have not yet been assigned as leads. 
            <a href="{{ route('leads.create') }}" class="btn btn-sm btn-outline-dark ms-2">Assign Now</a>
        </div>
    @endif


    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-success">
            ➕ Create Admin or Sales Rep
        </a>
    </div>

    <div class="row">
        {{-- Sales Reps --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Sales Representatives</h5>
                    <p class="card-text">View and manage your sales rep accounts.</p>
                    <a href="{{ route('sales-reps.index') }}" class="btn btn-primary">Manage Sales Reps</a>
                </div>
            </div>
        </div>

        {{-- Leads --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Leads</h5>
                    <p class="card-text">Track, assign, and manage client leads.</p>
                    <a href="{{ route('leads.index') }}" class="btn btn-primary">View Leads</a>
                </div>
            </div>
        </div>

        {{-- Quotations --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Quotations</h5>
                    <p class="card-text">Review all submitted quotations.</p>
                    <a href="{{ route('quotations.index') }}" class="btn btn-primary">View Quotations</a>
                </div>
            </div>
        </div>

        {{-- Announcements --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Announcements</h5>
                    <p class="card-text">Post updates for clients and sales reps.</p>
                    <a href="{{ route('announcements.index') }}" class="btn btn-primary">Manage Announcements</a>
                </div>
            </div>
        </div>

        {{-- Checklists --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Checklists</h5>
                    <p class="card-text">Assign and monitor task checklists.</p>
                    <a href="{{ route('checklists.index') }}" class="btn btn-primary">View Checklists</a>
                </div>
            </div>
        </div>

        {{-- Inquiries --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Inquiries</h5>
                    <p class="card-text">Review messages sent by clients.</p>
                    <a href="{{ route('inquiries.index') }}" class="btn btn-primary">View Inquiries</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
