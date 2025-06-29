@extends('layouts.app')

@include('components.dashboard-style')

@section('content')
<div class="container">
    <h2 class="section-heading">Create New Account</h2>

    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn custom-btn">Create New Admin or Sales Representative Account</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="section-heading">Sales Representatives</h2>

    <div class="table-responsive card-custom p-3">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesReps as $rep)
                <tr>
                    <td>{{ $rep->user->name }}</td>
                    <td>{{ $rep->user->email }}</td>
                    <td>
                        @role('admin')
                        <a href="{{ route('sales-reps.edit', $rep->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('sales-reps.destroy', $rep->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this sales rep?')">Delete</button>
                        </form>
                        @endrole
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">← Return to Dashboard</a>
    </div>
</div>
@endsection
