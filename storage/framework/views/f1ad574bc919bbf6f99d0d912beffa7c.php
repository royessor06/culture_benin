<?php $__env->startSection('content'); ?>
<div style="max-width: 600px; margin: 100px auto; text-align: center; padding: 40px;">
    <div style="width: 80px; height: 80px; background: #e53e3e; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; font-size: 2rem;">
        <i class="fas fa-times"></i>
    </div>

    <h1 style="color: #2d3748; margin-bottom: 20px;">Paiement Annulé</h1>

    <p style="color: #4a5568; font-size: 1.1rem; margin-bottom: 30px;">
        Votre paiement a été annulé. Aucun montant n'a été débité.
    </p>

    <div style="display: flex; gap: 15px; justify-content: center; margin-top: 30px;">
        <a href="<?php echo e(url()->previous()); ?>"
           style="background: #4a5568; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">
            Réessayer
        </a>

        <a href="<?php echo e(route('home')); ?>"
           style="background: #cbd5e0; color: #2d3748; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">
            Retour à l'accueil
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('acceuil', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\payment\cancel.blade.php ENDPATH**/ ?>