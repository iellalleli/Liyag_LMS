<div class="mb-3">
    <label for="user_name" class="form-label">Name</label>
    <input type="text" name="user_name" class="form-control" value="{{ old('user_name', $salesRep->user->name ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="user_email" class="form-label">Email</label>
    <input type="email" name="user_email" class="form-control"
        value="{{ old('user_email', $salesRep->user->email ?? '') }}" required>
</div>