@extends('layouts.app')

@include('components.dashboard-style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="section-heading">Create User</h2>
            <p class="mb-4 text-muted">Add a new Admin or Sales Representative account.</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="card card-custom p-4">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input type="text" id="name" name="name" class="form-control rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" id="password" name="password" class="form-control rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">Role</label>
                        <select id="role" name="role" class="form-select rounded" required>
                            <option value="admin">Admin</option>
                            <option value="sales_rep">Sales Rep</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('sales-reps.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn custom-btn">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
