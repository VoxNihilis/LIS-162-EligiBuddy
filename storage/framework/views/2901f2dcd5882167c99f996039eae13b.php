<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex flex-col">
            <div class="p-6 text-center border-b border-slate-700">
                <h1 class="text-2xl font-bold text-blue-400">Eligi<span class="text-white">Buddy</span></h1>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2">
    <a href="<?php echo e(route('scholarships.index')); ?>" class="flex items-center px-4 py-3 rounded hover:bg-slate-800 <?php echo e(request()->routeIs('scholarships.index') ? 'bg-slate-800 text-blue-400' : ''); ?>">
        <i class="fas fa-home w-6"></i> Dashboard
    </a>
    
    <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('scholarships.create')); ?>" class="flex items-center px-4 py-3 rounded hover:bg-slate-800 <?php echo e(request()->routeIs('scholarships.create') ? 'bg-slate-800 text-blue-400' : ''); ?>">
            <i class="fas fa-plus-circle w-6"></i> Add Scholarship
        </a>
        <a href="<?php echo e(route('scholarships.trash')); ?>" class="flex items-center px-4 py-3 rounded hover:bg-slate-800 <?php echo e(request()->routeIs('scholarships.trash') ? 'bg-slate-800 text-blue-400' : ''); ?>">
            <i class="fas fa-trash-alt w-6"></i> Trash Bin
        </a>
    <?php endif; ?>
</nav>
            
            <div class="p-4 border-t border-slate-700 text-center text-xs text-gray-500">
                &copy; <?php echo e(date('Y')); ?> Scholarship App
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-white shadow p-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold text-gray-800">
        <?php echo $__env->yieldContent('title', 'Dashboard'); ?>
    </h2>
    <div class="flex items-center space-x-4">
        <?php if(auth()->guard()->check()): ?>
            <span class="text-gray-600 text-sm hidden md:block">Hi, <?php echo e(Auth::user()->name); ?></span>
            
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-sm text-red-500 border border-red-500 px-3 py-1 rounded hover:bg-red-50 transition">
                    Logout
                </button>
            </form>
            
            <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

            </div>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="text-gray-600 hover:text-blue-600 font-medium">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition shadow-sm">
                Register
            </a>
        <?php endif; ?>
    </div>
</header>

            <main class="p-6 flex-1">
                <?php if($message = Session::get('success')): ?>
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center">
                        <p><?php echo e($message); ?></p>
                        <button onclick="this.parentElement.remove()" class="text-green-700 font-bold">&times;</button>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

</body>
</html><?php /**PATH C:\Users\James\eligibuddy\resources\views/layout.blade.php ENDPATH**/ ?>