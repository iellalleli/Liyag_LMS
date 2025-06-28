@extends('layouts.app')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">Welcome to the Wedding Lead Management System 💍</h1>
        <p class="lead mb-5">Plan. Manage. Celebrate. A centralized platform for admins, sales reps, and clients.</p>

        @auth
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg mx-2">Go to Dashboard</a>
            @elseif(auth()->user()->hasRole('sales_rep'))
                <a href="{{ route('sales.dashboard') }}" class="btn btn-primary btn-lg mx-2">Go to Dashboard</a>
            @elseif(auth()->user()->hasRole('client'))
                <a href="{{ route('client.dashboard') }}" class="btn btn-primary btn-lg mx-2">Get Quotation</a>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg mx-2">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg mx-2">Register as Client</a>
        @endauth

        <hr class="my-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="mb-3">What you can do here:</h5>
                <ul class="list-group text-start">
                    <li class="list-group-item">🛠️ Admins can manage sales reps, leads, and all data</li>
                    <li class="list-group-item">📋 Sales Reps can track tasks, view assigned leads, and follow up</li>
                    <li class="list-group-item">💌 Clients can request quotations and send inquiries</li>
                </ul>
            </div>
        </div>
    </div>
@endsection