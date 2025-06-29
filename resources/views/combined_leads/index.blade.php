@extends('layouts.app')

@push('styles')
<style>
    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #6F4E37;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(111, 78, 55, 0.15);
    }

    .custom-btn {
        background-color: #d8c0aa;
        color: #fff;
        border-radius: 20px;
        border: none;
        padding: 0.5rem 1.2rem;
        font-weight: 600;
    }

    .custom-btn:hover {
        background-color: #c8ae97;
        color: #fff;
    }

    .btn-outline-secondary {
        border-radius: 20px;
        font-weight: 500;
        padding: 0.45rem 1.2rem;
        border-color: #c7b8ae;
        color: #6F4E37;
    }

    .btn-outline-secondary:hover {
        background-color: #ece4dc;
        color: #4b2e2e;
    }

    .card-custom {
        border: 1px solid #f3e8e1;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
    }

    .card-header {
        background-color: #f9f4f1 !important;
        font-weight: 600;
        color: #6F4E37;
    }

    .lead-card {
        border: 1px solid #e8ded7;
        border-radius: 12px;
        background-color: #fffdfc;
    }

    .lead-card h6 {
        font-weight: 600;
        color: #4b2e2e;
    }

    .lead-card p {
        margin-bottom: 4px;
        font-size: 0.9rem;
        color: #5e463c;
    }

    .btn-sm {
        border-radius: 12px;
    }

    .text-muted.small {
        font-size: 0.85rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <h2 class="section-heading">Leads Kanban Board</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">← Return to Dashboard</a>
        <a href="{{ route('combined_leads.create') }}" class="custom-btn">Create Lead</a>
    </div>

    <div class="row">
        @foreach(['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'] as $stage)
            <div class="col">
                <div class="card card-custom mb-4">
                    <div class="card-header text-center">
                        {{ $stage }}
                    </div>
                    <div class="card-body p-2">
                        @php
                            $stageLeads = $leads->where('stage', $stage);
                        @endphp

                        @forelse($stageLeads as $lead)
                            <div class="card lead-card mb-3 shadow-sm">
                                <div class="card-body p-2">
                                    <h6>{{ $lead->cust_name }}</h6>
                                    <p><strong>Rep:</strong> {{ $lead->assignedRep->name ?? 'N/A' }}</p>
                                    <p><strong>Stage:</strong> {{ $lead->stage }}</p>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <a href="{{ route('combined_leads.show', $lead->id) }}"
                                            class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('combined_leads.edit', $lead->id) }}"
                                            class="btn btn-sm btn-outline-warning">Edit</a>
                                        <form action="{{ route('combined_leads.destroy', $lead->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this lead?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small text-center mt-2">No leads</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
