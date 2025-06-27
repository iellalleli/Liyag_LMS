@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>

    @role(['admin', 'sales_rep'])
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
        @endif

        <form action="{{ route('checklists.update', $checklist->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">Assign to User</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $checklist->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" name="task" class="form-control" value="{{ $checklist->task }}" required>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="is_completed" class="form-check-input" id="is_completed"
                    {{ $checklist->is_completed ? 'checked' : '' }}>
                <label class="form-check-label" for="is_completed">Mark as Completed</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('checklists.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @else
        <div class="alert alert-warning">Only admins or sales representatives can edit tasks.</div>
    @endrole
</div>
@endsection
