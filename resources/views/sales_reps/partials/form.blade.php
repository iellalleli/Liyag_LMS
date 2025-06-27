<div class="mb-3">
    <label for="user_id" class="form-label">User</label>
    <select name="user_id" class="form-control" required>
        <option value="">-- Select Sales Rep User --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $salesRep->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
</div>
