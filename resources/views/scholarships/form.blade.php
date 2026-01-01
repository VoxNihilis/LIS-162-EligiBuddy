<div class="grid grid-cols-1 gap-4">
    <div>
        <label class="block text-gray-700">Scholarship Name</label>
        <input type="text" name="name" value="{{ old('name', $scholarship->name ?? '') }}" class="w-full border p-2 rounded" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700">Provider</label>
            <input type="text" name="provider" value="{{ old('provider', $scholarship->provider ?? '') }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" value="{{ old('amount', $scholarship->amount ?? '') }}" class="w-full border p-2 rounded" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700">Location</label>
            <input type="text" name="location" value="{{ old('location', $scholarship->location ?? '') }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', isset($scholarship) ? $scholarship->deadline->format('Y-m-d') : '') }}" class="w-full border p-2 rounded" required>
        </div>
    </div>

    <div>
        <label class="block text-gray-700">Requirements</label>
        <textarea name="requirements" class="w-full border p-2 rounded" required>{{ old('requirements', $scholarship->requirements ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-gray-700">Contact Details</label>
        <input type="text" name="contact_details" value="{{ old('contact_details', $scholarship->contact_details ?? '') }}" class="w-full border p-2 rounded" required>
    </div>
</div>