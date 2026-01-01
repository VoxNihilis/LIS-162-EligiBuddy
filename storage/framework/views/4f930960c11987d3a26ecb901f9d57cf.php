<div class="grid grid-cols-1 gap-4">
    <div>
        <label class="block text-gray-700">Scholarship Name</label>
        <input type="text" name="name" value="<?php echo e(old('name', $scholarship->name ?? '')); ?>" class="w-full border p-2 rounded" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700">Provider</label>
            <input type="text" name="provider" value="<?php echo e(old('provider', $scholarship->provider ?? '')); ?>" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" value="<?php echo e(old('amount', $scholarship->amount ?? '')); ?>" class="w-full border p-2 rounded" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700">Location</label>
            <input type="text" name="location" value="<?php echo e(old('location', $scholarship->location ?? '')); ?>" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Deadline</label>
            <input type="date" name="deadline" value="<?php echo e(old('deadline', isset($scholarship) ? $scholarship->deadline->format('Y-m-d') : '')); ?>" class="w-full border p-2 rounded" required>
        </div>
    </div>

    <div>
        <label class="block text-gray-700">Requirements</label>
        <textarea name="requirements" class="w-full border p-2 rounded" required><?php echo e(old('requirements', $scholarship->requirements ?? '')); ?></textarea>
    </div>

    <div>
        <label class="block text-gray-700">Contact Details</label>
        <input type="text" name="contact_details" value="<?php echo e(old('contact_details', $scholarship->contact_details ?? '')); ?>" class="w-full border p-2 rounded" required>
    </div>
</div><?php /**PATH C:\Users\James\eligibuddy\resources\views/scholarships/form.blade.php ENDPATH**/ ?>