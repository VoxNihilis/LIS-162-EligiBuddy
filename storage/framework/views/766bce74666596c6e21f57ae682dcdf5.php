

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Add New Scholarship</h2>
    
    <form action="<?php echo e(route('scholarships.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('scholarships.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <button type="submit" class="mt-6 w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Save Scholarship</button>
        <a href="<?php echo e(route('scholarships.index')); ?>" class="block text-center mt-4 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\James\eligibuddy\resources\views/scholarships/create.blade.php ENDPATH**/ ?>