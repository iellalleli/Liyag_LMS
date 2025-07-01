@extends('layouts.app')

@php
    $today = \Carbon\Carbon::today()->toDateString();
@endphp


@push('styles')
    <style>
        .lead-form label {
            font-weight: 600;
            color: #4b2e2e;
        }

        .lead-form .form-control,
        .lead-form .form-select {
            border-radius: 12px;
            border: 1px solid #e2d4c5;
            padding: 0.5rem 0.75rem;
        }

        .lead-form .form-check-label {
            font-weight: 500;
            margin-left: 0.5rem;
            color: #6F4E37;
        }

        .lead-form .section-title {
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
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border: none;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #c8ae97;
            color: #fff;
        }

        .btn-secondary {
            border-radius: 20px;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            background-color: #e0dbd4;
            color: #4b2e2e;
            border: none;
            margin-left: 0.5rem;
        }

        .btn-secondary:hover {
            background-color: #d3c8be;
            color: #4b2e2e;
        }
    </style>
@endpush

@section('content')
<div class="container lead-form">
    <h2 class="section-title">Create Lead</h2>

    @include('components.validation-errors')

    <form method="POST" action="{{ route('combined_leads.store') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Name</label>
                <input type="text" name="cust_name" class="form-control" value="{{ old('cust_name') }}" required>
            </div>
            <div class="col-md-4">
                <label>Phone</label>
                <input type="text" name="cust_phone" class="form-control" value="{{ old('cust_phone') }}" required>
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="email" name="cust_email" class="form-control" value="{{ old('cust_email') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Communication Method</label>
            <select name="communication_method" class="form-select" required>
                <option value="">-- Select Communication Method --</option>
                @foreach(['Email', 'Phone', 'Messenger'] as $method)
                    <option value="{{ $method }}" {{ old('communication_method') == $method ? 'selected' : '' }}>
                        {{ $method }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Target Wedding Date</label>
                <input 
                    type="date" 
                    name="target_wedding_date" 
                    class="form-control" 
                    value="{{ old('target_wedding_date') }}" 
                    min="{{ $today }}"
                    required>
            </div>
            <div class="col-md-6">
                <label>Wedding Date</label>
                <input 
                    type="date" 
                    name="wedding_date" 
                    class="form-control" 
                    value="{{ old('wedding_date') }}" 
                    min="{{ $today }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Budget Range</label>
            <select name="budget_range" class="form-select" required>
                <option value="">-- Select Range --</option>
                @foreach([
                    'under_50k' => 'Under ₱50,000',
                    '50k_100k' => '₱50,000 - ₱100,000',
                    '100k_200k' => '₱100,000 - ₱200,000',
                    '200k_plus' => 'Above ₱200,000'
                ] as $key => $label)
                    <option value="{{ $key }}" {{ old('budget_range') == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Guest Count</label>
            <input type="number" name="guest_count" class="form-control" value="{{ old('guest_count') }}" min="0" required>
        </div>

        <div class="mb-3">
            <label>Services</label><br>
            @foreach(['package_deal' => 'Package Deal', 'catering' => 'Catering', 'hair_makeup' => 'Hair & Makeup', 'live_band' => 'Live Band'] as $field => $label)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="{{ $field }}" value="1" {{ old($field) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $label }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label>Stage</label>
            <select name="stage" class="form-select" required>
                <option value="">-- Select Stage --</option>
                @foreach(['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'] as $stage)
                    <option value="{{ $stage }}" {{ old('stage') == $stage ? 'selected' : '' }}>
                        {{ $stage }}
                    </option>
                @endforeach
            </select>
        </div>

        @role('admin')
            <div class="mb-3">
                <label>Assigned Sales Rep</label>
                <select name="assigned_rep" class="form-select">
                    <option value="">-- Select Sales Rep --</option>
                    @foreach($salesReps as $rep)
                        <option value="{{ $rep->user_id }}" {{ old('assigned_rep') == $rep->user_id ? 'selected' : '' }}>
                            {{ $rep->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endrole

        <div class="mb-3">
            <label>Lead Source</label>
            <select class="form-select" name="lead_source" required>
                <option value="">-- Select Lead Source --</option>
                @foreach(['Website', 'Personal Contact', 'Facebook', 'Instagram'] as $source)
                    <option value="{{ $source }}" {{ old('lead_source') == $source ? 'selected' : '' }}>
                        {{ $source }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="custom-btn">Create Lead</button>
            <a href="{{ route('combined_leads.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
