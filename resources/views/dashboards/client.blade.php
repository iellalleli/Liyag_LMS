@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome, Client</h2>
        <p>Check your quotations, send inquiries, and follow your wedding journey.</p>

        <a href="{{ route('client.quotations.create') }}" class="btn btn-primary mt-3">
            Create Quotation
        </a>
    </div>
@endsection