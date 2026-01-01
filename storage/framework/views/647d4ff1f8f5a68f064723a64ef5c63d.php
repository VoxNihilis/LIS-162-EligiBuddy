

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Scholarship</h2>
    
    <form action="<?php echo e(route('scholarships.update', $scholarship->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('scholarships.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <button type="submit" class="mt-6 w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Update Scholarship</button>
        <a href="<?php echo e(route('scholarships.index')); ?>" class="block text-center mt-4 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\James\eligibuddy\resources\views/scholarships/edit.blade.php ENDPATH**/ ?>