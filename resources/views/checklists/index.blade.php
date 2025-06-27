@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checklist Tasks</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @role(['admin', 'sales_rep'])
        <a href="{{ route('checklists.create') }}" class="btn btn-success mb-3">Add Task</a>
    @endrole

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Task</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checklists as $checklist)
                <tr>
                    <td>{{ $checklist->user->name }}</td>
                    <td>{{ $checklist->task }}</td>
                    <td>{{ $checklist->is_completed ? 'Completed' : 'Pending' }}</td>
                    <td>
                        <a href="{{ route('checklists.show', $checklist->id) }}" class="btn btn-info btn-sm">View</a>

                        @role(['admin', 'sales_rep'])
                            <a href="{{ route('checklists.edit', $checklist->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('checklists.destroy', $checklist->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?')">Delete</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
