@php
    $isEdit = isset($quotation);
@endphp

<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="cust_name" class="form-control"
        value="{{ old('cust_name', $isEdit ? $quotation->cust_name : '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="cust_phone" class="form-control"
        value="{{ old('cust_phone', $isEdit ? $quotation->cust_phone : '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="cust_email" class="form-control"
        value="{{ old('cust_email', $isEdit ? $quotation->cust_email : '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Communication Method</label>
    <select name="communication_method" class="form-control" required>
        <option value="">-- Select --</option>
        @foreach (['Email', 'Phone', 'Messenger'] as $method)
            <option value="{{ $method }}" {{ old('communication_method', $isEdit ? $quotation->communication_method : '') == $method ? 'selected' : '' }}>
                {{ $method }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Target Wedding Date</label>
    <input type="date" name="target_wedding_date" class="form-control"
        value="{{ old('target_wedding_date', $isEdit ? $quotation->target_wedding_date : '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Budget Range</label>
    <select name="budget_range" class="form-control" required>
        <option value="">-- Select Range --</option>
        <option value="under_50k" {{ old('budget_range', $isEdit ? $quotation->budget_range : '') == 'under_50k' ? 'selected' : '' }}>
            Under ₱50,000</option>
        <option value="50k_100k" {{ old('budget_range', $isEdit ? $quotation->budget_range : '') == '50k_100k' ? 'selected' : '' }}>
            ₱50,000 - ₱100,000</option>
        <option value="100k_200k" {{ old('budget_range', $isEdit ? $quotation->budget_range : '') == '100k_200k' ? 'selected' : '' }}>
            ₱100,000 - ₱200,000</option>
        <option value="200k_plus" {{ old('budget_range', $isEdit ? $quotation->budget_range : '') == '200k_plus' ? 'selected' : '' }}>
            Above ₱200,000</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Guest Count</label>
    <input type="number" name="guest_count" class="form-control"
        value="{{ old('guest_count', $isEdit ? $quotation->guest_count : '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label d-block">Services</label>

    <div class="form-check">
        <input type="checkbox" name="package_deal" value="1" class="form-check-input" {{ old('package_deal', $isEdit ? $quotation->package_deal : false) ? 'checked' : '' }}>
        <label class="form-check-label">Package Deal (includes photography and videography, customized giveaways, and
            more!)</label>
    </div>

    <div class="form-check">
        <input type="checkbox" name="catering" value="1" class="form-check-input" {{ old('catering', $isEdit ? $quotation->catering : false) ? 'checked' : '' }}>
        <label class="form-check-label">Catering</label>
    </div>

    <div class="form-check">
        <input type="checkbox" name="hair_makeup" value="1" class="form-check-input" {{ old('hair_makeup', $isEdit ? $quotation->hair_makeup : false) ? 'checked' : '' }}>
        <label class="form-check-label">Hair & Makeup</label>
    </div>

    <div class="form-check">
        <input type="checkbox" name="live_band" value="1" class="form-check-input" {{ old('live_band', $isEdit ? $quotation->live_band : false) ? 'checked' : '' }}>
        <label class="form-check-label">Live Band</label>
    </div>
</div>