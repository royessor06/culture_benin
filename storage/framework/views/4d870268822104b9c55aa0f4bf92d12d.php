<?php $__env->startSection('content'); ?>
<div style="max-width: 600px; margin: 100px auto; text-align: center; padding: 40px;">
    <div style="width: 80px; height: 80px; background: #38a169; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; font-size: 2rem;">
        <i class="fas fa-check"></i>
    </div>

    <h1 style="color: #2d3748; margin-bottom: 20px;">Paiement Réussi !</h1>

    <p style="color: #4a5568; font-size: 1.1rem; margin-bottom: 30px;">
        Merci pour votre achat. Vous avez maintenant accès au contenu premium.
    </p>

    <div style="background: #f7fafc; border-radius: 15px; padding: 25px; margin: 30px 0;">
        <h3 style="color: #2d3748; margin-bottom: 15px;">Récapitulatif</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; text-align: left; max-width: 300px; margin: 0 auto;">
            <div style="color: #718096;">Montant:</div>
            <div style="font-weight: bold; color: #2d3748;"><?php echo e(number_format($payment->amount)); ?> FCFA</div>

            <div style="color: #718096;">Référence:</div>
            <div style="font-weight: bold; color: #2d3748;"><?php echo e($payment->transaction_id); ?></div>

            <div style="color: #718096;">Date:</div>
            <div style="font-weight: bold; color: #2d3748;"><?php echo e($payment->paid_at->format('d/m/Y H:i')); ?></div>
        </div>
    </div>

    <div style="display: flex; gap: 15px; justify-content: center; margin-top: 40px;">
        <a href="<?php echo e(route('detail-page', ['type' => $payment->contenu->type->slug ?? 'actualites'])); ?>"
           style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">
            Retour aux contenus
        </a>

        <a href="<?php echo e(route('contenu.show', $payment->contenu_id)); ?>"
           style="background: #38a169; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">
            Accéder au contenu
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('acceuil', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\payment\success.blade.php ENDPATH**/ ?>