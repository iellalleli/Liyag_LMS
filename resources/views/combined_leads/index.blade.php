@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">🗂️ Leads Kanban Board</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="d-flex justify-content-between mb-3">
            {{-- <form method="GET" action="{{ route('combined_leads.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by customer or rep...">
                <button class="btn btn-outline-secondary">Search</button>
            </form> --}}

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">⬅️ Return to Dashboard</a>

            <a href="{{ route('combined_leads.create') }}" class="btn btn-success">➕ Create Lead</a>
        </div>

        <div class="row">
            @foreach(['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'] as $stage)
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header bg-light fw-bold text-center">
                            {{ $stage }}
                        </div>
                        <div class="card-body p-2">
                            @php
                                $stageLeads = $leads->where('stage', $stage);
                            @endphp

                            @forelse($stageLeads as $lead)
                                <div class="card mb-2 shadow-sm">
                                    <div class="card-body p-2">
                                        <h6 class="mb-1">{{ $lead->cust_name }}</h6>
                                        <p class="mb-1">
                                            <strong>Rep:</strong> {{ $lead->assignedRep->name ?? 'N/A' }}
                                        </p>
                                        <p class="mb-0">
                                            <strong>Stage:</strong> {{ $lead->stage }}
                                        </p>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <a href="{{ route('combined_leads.show', $lead->id) }}"
                                                class="btn btn-sm btn-outline-info">View</a>
                                            <a href="{{ route('combined_leads.edit', $lead->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{ route('combined_leads.destroy', $lead->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this lead?')" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">Del</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted small">No leads</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection