@extends('layouts.app')

@section('content')
<style>
    .dashboard-heading {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #6F4E37;
        margin-bottom: 2rem;
        text-shadow: 0 2px 12px rgba(111, 78, 55, 0.15);
    }

    .card {
        border: none;
        border-radius: 20px;
        background-color: #fdf6f0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(111, 78, 55, 0.1);
    }

    .card-title {
        font-weight: 600;
        color: #6F4E37;
        font-family: 'Georgia', serif;
    }

    .card-text {
        color: #4b2e2e;
        font-family: 'Inter', sans-serif;
    }

    .btn-soft {
        background-color: #d8c0aa;
        color: white;
        border: none;
        border-radius: 25px;
        padding: 0.5rem 1.2rem;
        font-weight: 600;
        font-size: 0.95rem;
        transition: background 0.3s ease;
    }

    .btn-soft:hover {
        background-color: #c8ae97;
        color: white;
    }

    .btn-outline-secondary {
        border-color: #c8ae97;
        color: #6F4E37;
        font-weight: 600;
        border-radius: 25px;
    }

    .btn-outline-secondary:hover {
        background-color: #e4d0c0;
        color: #4b2e2e;
    }
</style>

<div class="container py-4">
    <h2 class="dashboard-heading">Welcome, {{ auth()->user()->name }}</h2>

    @if($lead)
        <div class="card mt-3 p-4">
            <h5 class="card-title mb-3">Your Wedding Quotation</h5>
            <p class="card-text"><strong>Wedding Date:</strong> {{ $lead->wedding_date ?? 'TBD' }}</p>
            <p class="card-text"><strong>Package:</strong> {{ $lead->package_deal ? 'Yes' : 'None' }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $lead->stage ?? 'Not Started' }}</p>
            <p class="card-text"><strong>Sales Rep:</strong> {{ $lead->assignedRep->name ?? 'Unassigned' }}</p>

            <a href="{{ route('client.combined_leads.show', $lead->id) }}" class="btn btn-outline-secondary mt-3">View Details</a>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You don’t have a quotation yet. Please reach out to our support to get started.
        </div>
    @endif
</div>
@endsection
