@include('components.dashboard-style')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <div class="card-body">
                <div class="mb-4">
                    <label for="user_name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="user_name" id="user_name"
                           class="form-control"
                           placeholder="Enter full name"
                           value="{{ old('user_name', $salesRep->user->name ?? '') }}" required>
                </div>

                <div class="mb-4">
                    <label for="user_email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="user_email" id="user_email"
                           class="form-control"
                           placeholder="Enter email address"
                           value="{{ old('user_email', $salesRep->user->email ?? '') }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="custom-btn">Submit</button>
                    <a href="{{ route('sales-reps.index') }}" class="btn btn-link text-muted">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
