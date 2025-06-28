@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">🗂️ Lead Information</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="GET" action="{{ route('leads.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by customer or rep...">
                <button class="btn btn-outline-secondary">Search</button>
            </form>
            {{-- <a href="{{ route('leads.create') }}" class="btn btn-success">➕ Add New Lead</a> --}}
        </div>

        <div class="row">
            @forelse($leads as $lead)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lead->cust_name }}</h5>
                            <p class="mb-1"><strong>Stage:</strong> {{ $lead->stage }}</p>
                            <p class="mb-1"><strong>Rep:</strong> {{ $lead->assignedRep->name ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>Wedding:</strong>
                                {{ \Carbon\Carbon::parse($lead->wedding_date)->format('M d, Y') }}</p>
                            <p class="mb-2"><strong>Source:</strong> {{ $lead->lead_source }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('leads.destroy', $lead->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this lead?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Del</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">No leads found.</div>
            @endforelse
        </div>
    </div>
@endsection