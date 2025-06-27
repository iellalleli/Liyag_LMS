@csrf
<div class="mb-3">
    <label for="quotation_id" class="form-label">Related Quotation</label>
    <select class="form-control" name="quotation_id" required>
        <option value="">-- Select Quotation --</option>
        @foreach ($quotations as $quotation)
            <option value="{{ $quotation->id }}"
                {{ old('quotation_id', $lead->quotation_id ?? '') == $quotation->id ? 'selected' : '' }}>
                {{ $quotation->quotation_id }} - {{ $quotation->cust_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="stage" class="form-label">Stage</label>
    <select class="form-control" name="stage" required>
        @foreach(['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'] as $stage)
            <option value="{{ $stage }}"
                {{ old('stage', $lead->stage ?? '') == $stage ? 'selected' : '' }}>
                {{ $stage }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="assigned_rep" class="form-label">Assigned Sales Rep</label>
    <select class="form-control" name="assigned_rep" required>
        <option value="">-- Select Sales Rep --</option>
        @foreach ($salesReps as $rep)
            <option value="{{ $rep->id }}"
                {{ old('assigned_rep', $lead->assigned_rep ?? '') == $rep->id ? 'selected' : '' }}>
                {{ $rep->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="wedding_date" class="form-label">Wedding Date</label>
    <input type="date" name="wedding_date" class="form-control"
        value="{{ old('wedding_date', $lead->wedding_date ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="lead_source" class="form-label">Lead Source</label>
    <select class="form-control" name="lead_source" required>
        @foreach(['Website', 'Personal Contact', 'Facebook', 'Instagram'] as $source)
            <option value="{{ $source }}"
                {{ old('lead_source', $lead->lead_source ?? '') == $source ? 'selected' : '' }}>
                {{ $source }}
            </option>
        @endforeach
    </select>
</div>
