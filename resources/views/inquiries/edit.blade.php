@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Inquiry Status</h2>

    @role(['admin', 'vendor'])
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('inquiries.update', $inquiry->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" {{ $inquiry->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Reviewed" {{ $inquiry->status == 'Reviewed' ? 'selected' : '' }}>Reviewed</option>
                    <option value="Replied" {{ $inquiry->status == 'Replied' ? 'selected' : '' }}>Replied</option>
                    <option value="Resolved" {{ $inquiry->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @else
        <div class="alert alert-warning">Only vendors or admins can edit inquiries.</div>
    @endrole
</div>
@endsection
