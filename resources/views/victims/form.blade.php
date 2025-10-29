<div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $victim->name ?? '') }}" required>
</div>

<div class="mt-4">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="{{ old('address', $victim->address ?? '') }}" required>
</div>

<div class="mt-4">
    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $victim->phone_number ?? '') }}" required>
</div>

<div class="mt-4">
    <label for="date_of_birth">Date of Birth</label>
    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $victim->date_of_birth ?? '') }}" required>
</div>

<div class="mt-4">
    <label for="statement">Statement</label>
    <textarea name="statement" id="statement" required>{{ old('statement', $victim->statement ?? '') }}</textarea>
</div>
