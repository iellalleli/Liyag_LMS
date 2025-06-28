@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Lead</h2>

        {{-- Validation errors --}}
        @include('components.validation-errors')

        <form method="POST" action="{{ route('combined_leads.update', $combinedLead->id) }}">
            @csrf
            @method('PUT')

            {{-- Name, Phone, Email --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Name</label>
                    <input type="text" name="cust_name" class="form-control"
                        value="{{ old('cust_name', $combinedLead->cust_name) }}" required>
                </div>
                <div class="col-md-4">
                    <label>Phone</label>
                    <input type="text" name="cust_phone" class="form-control"
                        value="{{ old('cust_phone', $combinedLead->cust_phone) }}" required>
                </div>
                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="cust_email" class="form-control"
                        value="{{ old('cust_email', $combinedLead->cust_email) }}" required>
                </div>
            </div>

            {{-- Communication Method --}}
            <div class="mb-3">
                <label>Communication Method</label>
                <select name="communication_method" class="form-control" required>
                    <option value="">-- Select Communication Method --</option>
                    @foreach(['Email', 'Phone', 'Messenger'] as $method)
                        <option value="{{ $method }}" {{ old('communication_method', $combinedLead->communication_method) == $method ? 'selected' : '' }}>
                            {{ $method }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Target Wedding Date and Wedding Date --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Target Wedding Date</label>
                    <input type="date" name="target_wedding_date" class="form-control"
                        value="{{ old('target_wedding_date', $combinedLead->target_wedding_date) }}" required>
                </div>
                <div class="col-md-6">
                    <label>Wedding Date</label>
                    <input type="date" name="wedding_date" class="form-control"
                        value="{{ old('wedding_date', $combinedLead->wedding_date) }}">
                </div>
            </div>

            {{-- Budget Range --}}
            <div class="mb-3">
                <label for="budget_range" class="form-label">Budget Range</label>
                <select name="budget_range" class="form-control" required>
                    <option value="">-- Select Range --</option>
                    <option value="under_50k" {{ old('budget_range', $combinedLead->budget_range) == 'under_50k' ? 'selected' : '' }}>
                        Under ₱50,000
                    </option>
                    <option value="50k_100k" {{ old('budget_range', $combinedLead->budget_range) == '50k_100k' ? 'selected' : '' }}>
                        ₱50,000 - ₱100,000
                    </option>
                    <option value="100k_200k" {{ old('budget_range', $combinedLead->budget_range) == '100k_200k' ? 'selected' : '' }}>
                        ₱100,000 - ₱200,000
                    </option>
                    <option value="200k_plus" {{ old('budget_range', $combinedLead->budget_range) == '200k_plus' ? 'selected' : '' }}>
                        Above ₱200,000
                    </option>
                </select>
            </div>


            {{-- Guest Count --}}
            <div class="mb-3">
                <label>Guest Count</label>
                <input type="number" name="guest_count" class="form-control"
                    value="{{ old('guest_count', $combinedLead->guest_count) }}" min="0" required>
            </div>

            {{-- Services --}}
            <div class="mb-3">
                <label>Services</label><br>
                <label><input type="checkbox" name="package_deal" value="1" {{ old('package_deal', $combinedLead->package_deal) ? 'checked' : '' }}> Package Deal</label><br>
                <label><input type="checkbox" name="catering" value="1" {{ old('catering', $combinedLead->catering) ? 'checked' : '' }}> Catering</label><br>
                <label><input type="checkbox" name="hair_makeup" value="1" {{ old('hair_makeup', $combinedLead->hair_makeup) ? 'checked' : '' }}> Hair & Makeup</label><br>
                <label><input type="checkbox" name="live_band" value="1" {{ old('live_band', $combinedLead->live_band) ? 'checked' : '' }}> Live Band</label>
            </div>

            {{-- Stage --}}
            <div class="mb-3">
                <label>Stage</label>
                <select name="stage" class="form-control" required>
                    <option value="">-- Select Stage --</option>
                    @foreach(['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'] as $stage)
                        <option value="{{ $stage }}" {{ old('stage', $combinedLead->stage) == $stage ? 'selected' : '' }}>
                            {{ $stage }}
                        </option>
                    @endforeach
                </select>
            </div>


            @role('admin')
                {{-- Assigned Rep --}}
                <div class="mb-3">
                    <label>Assigned Sales Rep</label>
                    <select name="assigned_rep" class="form-control">
                        <option value="">-- Select Sales Rep --</option>
                        @foreach($salesReps as $rep)
                            <option value="{{ $rep->user_id }}"
                                {{ old('assigned_rep', $combinedLead->assigned_rep) == $rep->user_id ? 'selected' : '' }}>
                                {{ $rep->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endrole



            {{-- Lead Source --}}
            <div class="mb-3">
                <label for="lead_source" class="form-label">Lead Source</label>
                <select class="form-control" name="lead_source" required>
                    <option value="">-- Select Lead Source --</option>
                    @foreach(['Website', 'Personal Contact', 'Facebook', 'Instagram'] as $source)
                        <option value="{{ $source }}" {{ old('lead_source', $combinedLead->lead_source) == $source ? 'selected' : '' }}>
                            {{ $source }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Action Buttons --}}
            <div class="mb-3">
                <button class="btn btn-primary">Update Lead</button>
                <a href="{{ route('combined_leads.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection