<?php $__env->startSection('content'); ?>

<!-- HERO SECTION -->
<div class="relative w-full h-[60vh] flex items-center justify-center bg-cover bg-center" style="background-image:url('/assets/benin-background.jpg');">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <h1 class="relative text-4xl md:text-6xl font-bold text-white drop-shadow-lg animate-fadeIn">Culture Bénin</h1>
</div>

<!-- CONTENUS LIST -->
<div class="max-w-6xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold mb-6">Tous les contenus</h2>

    <div class="grid md:grid-cols-3 gap-8">
        <?php $__currentLoopData = $contenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl animate-cardFade">
            <img src="<?php echo e($contenu->image); ?>" class="w-full h-48 object-cover" alt="Image contenu" />

            <div class="p-5">
                <h3 class="text-xl font-bold mb-2"><?php echo e($contenu->titre); ?></h3>
                <p class="text-gray-700 line-clamp-3"><?php echo e(Str::limit($contenu->description, 120)); ?></p>

                <div class="flex justify-between items-center mt-4">
                    <a href="<?php echo e(route('contenu.show', $contenu->id)); ?>" class="text-blue-600 hover:underline font-semibold">Voir plus</a>

                    <button class="p-2 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white transition" onclick="window.location='<?php echo e(route('contenu.show', $contenu->id)); ?>#comments'">
                        <i class="fa fa-comment"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- ANIMATIONS -->
<style>
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }
    .animate-fadeIn { animation: fadeIn 1s ease; }

    @keyframes cardFade {
        from {opacity: 0; transform: translateY(30px);}
        to {opacity: 1; transform: translateY(0);}
    }
    .animate-cardFade { animation: cardFade 0.9s ease; }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/home.blade.php ENDPATH**/ ?>