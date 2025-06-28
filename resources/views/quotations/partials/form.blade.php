{{-- <div class="mb-3">
    <label>Name</label>
    <input type="text" name="cust_name" class="form-control" value="{{ old('cust_name', $quotation->cust_name ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="cust_phone" class="form-control"
        value="{{ old('cust_phone', $quotation->cust_phone ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="cust_email" class="form-control"
        value="{{ old('cust_email', $quotation->cust_email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Communication Method</label>
    <select name="communication_method" class="form-control" required>
        <option value="Email" {{ old('communication_method', $quotation->communication_method ?? '') == 'Email' ?
            'selected' : '' }}>Email</option>
        <option value="Phone" {{ old('communication_method', $quotation->communication_method ?? '') == 'Phone' ?
            'selected' : '' }}>Phone</option>
        <option value="Messenger" {{ old('communication_method', $quotation->communication_method ?? '') == 'Messenger'
            ? 'selected' : '' }}>Messenger</option>
    </select>
</div>
<div class="mb-3">
    <label>Target Wedding Date</label>
    <input type="date" name="target_wedding_date" class="form-control"
        value="{{ old('target_wedding_date', $quotation->target_wedding_date ?? '') }}">
</div>
<div class="mb-3">
    <label for="budget_range" class="form-label">Budget Range</label>
    <select name="budget_range" class="form-control" required>
        <option value="">-- Select Range --</option>
        <option value="under_50k" {{ old('budget_range', $quotation->budget_range ?? '') == 'under_50k' ? 'selected' :
            '' }}>Under ₱50,000</option>
        <option value="50k_100k" {{ old('budget_range', $quotation->budget_range ?? '') == '50k_100k' ? 'selected' : ''
            }}>₱50,000 - ₱100,000</option>
        <option value="100k_200k" {{ old('budget_range', $quotation->budget_range ?? '') == '100k_200k' ? 'selected' :
            '' }}>₱100,000 - ₱200,000</option>
        <option value="200k_plus" {{ old('budget_range', $quotation->budget_range ?? '') == '200k_plus' ? 'selected' :
            '' }}>Above ₱200,000</option>
    </select>
</div>
<div class="mb-3">
    <label>Guest Count</label>
    <input type="number" name="guest_count" class="form-control"
        value="{{ old('guest_count', $quotation->guest_count ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Services</label><br>
    <label><input type="checkbox" name="package_deal" value="1" {{ old('package_deal', $quotation->package_deal ??
        false) ? 'checked' : '' }}> Package Deal</label><br>
    <label><input type="checkbox" name="catering" value="1" {{ old('catering', $quotation->catering ?? false) ?
        'checked' : '' }}> Catering</label><br>
    <label><input type="checkbox" name="hair_makeup" value="1" {{ old('hair_makeup', $quotation->hair_makeup ?? false) ?
        'checked' : '' }}> Hair & Makeup</label><br>
    <label><input type="checkbox" name="live_band" value="1" {{ old('live_band', $quotation->live_band ?? false) ?
        'checked' : '' }}> Live Band</label>
</div> --}}

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="cust_name" class="form-control" value="{{ old('cust_name') }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="cust_phone" class="form-control" value="{{ old('cust_phone') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="cust_email" class="form-control" value="{{ old('cust_email') }}" required>
</div>

<div class="mb-3">
    <label>Communication Method</label>
    <select name="communication_method" class="form-control" required>
        <option value="">-- Select --</option>
        <option value="Email" {{ old('communication_method') == 'Email' ? 'selected' : '' }}>Email</option>
        <option value="Phone" {{ old('communication_method') == 'Phone' ? 'selected' : '' }}>Phone</option>
        <option value="Messenger" {{ old('communication_method') == 'Messenger' ? 'selected' : '' }}>Messenger</option>
    </select>
</div>

<div class="mb-3">
    <label>Target Wedding Date</label>
    <input type="date" name="target_wedding_date" class="form-control" value="{{ old('target_wedding_date') }}">
</div>

<div class="mb-3">
    <label for="budget_range" class="form-label">Budget Range</label>
    <select name="budget_range" class="form-control" required>
        <option value="">-- Select Range --</option>
        <option value="under_50k" {{ old('budget_range') == 'under_50k' ? 'selected' : '' }}>Under ₱50,000</option>
        <option value="50k_100k" {{ old('budget_range') == '50k_100k' ? 'selected' : '' }}>₱50,000 - ₱100,000</option>
        <option value="100k_200k" {{ old('budget_range') == '100k_200k' ? 'selected' : '' }}>₱100,000 - ₱200,000</option>
        <option value="200k_plus" {{ old('budget_range') == '200k_plus' ? 'selected' : '' }}>Above ₱200,000</option>
    </select>
</div>

<div class="mb-3">
    <label>Guest Count</label>
    <input type="number" name="guest_count" class="form-control" value="{{ old('guest_count') }}" required>
</div>

<div class="mb-3">
    <label>Services</label><br>
    <label><input type="checkbox" name="package_deal" value="1" {{ old('package_deal') ? 'checked' : '' }}> Package
        Deal</label><br>
    <label><input type="checkbox" name="catering" value="1" {{ old('catering') ? 'checked' : '' }}> Catering</label><br>
    <label><input type="checkbox" name="hair_makeup" value="1" {{ old('hair_makeup') ? 'checked' : '' }}> Hair &
        Makeup</label><br>
    <label><input type="checkbox" name="live_band" value="1" {{ old('live_band') ? 'checked' : '' }}> Live Band</label>
</div>