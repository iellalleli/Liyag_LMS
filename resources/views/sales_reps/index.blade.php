@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Sales Representatives</h2>

        <div class="mb-4">
            <a href="{{ route('users.create') }}" class="btn btn-success">
                ➕ Create Admin or Sales Rep
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesReps as $rep)
                    <tr>
                        <td>{{ $rep->user->name }}</td>
                        <td>{{ $rep->user->email }}</td>
                        {{-- <td>{{ $rep->no_of_leads_assigned }}</td> --}}
                        <td>
                            {{-- <a href="{{ route('sales-reps.show', $rep->id) }}" class="btn btn-info btn-sm">View</a> --}}

                            @role('admin')
                            <a href="{{ route('sales-reps.edit', $rep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sales-reps.destroy', $rep->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this rep?')">Delete</button>
                            </form>
                            @endrole
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">⬅️ Return to Dashboard</a>
        </div>

    </div>
@endsection