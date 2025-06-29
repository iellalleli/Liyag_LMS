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
</style>

<div class="container py-4">
    <h2 class="dashboard-heading">Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h5 class="card-title">Handle Accounts</h5>
                <p class="card-text">Create, view, and manage different accounts.</p>
                <a href="{{ route('sales-reps.index') }}" class="btn btn-soft">Manage Accounts</a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h5 class="card-title">Leads</h5>
                <p class="card-text">Track, assign, and manage client leads.</p>
                <a href="{{ route('combined_leads.index') }}" class="btn btn-soft">View Leads</a>
            </div>
        </div>
    </div>
</div>
@endsection
