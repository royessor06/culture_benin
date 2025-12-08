<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Information</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> <?php echo e($utilisateur->nom); ?></p>
        <p><strong>Prénom(s) :</strong> <?php echo e($utilisateur->prenom); ?></p>
        <p><strong>Email :</strong> <?php echo e($utilisateur->email); ?></p>
        <p><strong>Date de naissance :</strong> <?php echo e($utilisateur->date_naissance); ?></p>
        <p><strong>Statut :</strong> <?php echo e($utilisateur->statut); ?></p>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('administrateur.index')); ?>" class="btn btn-secondary">Retour</a>
        <a href="<?php echo e(route('administrateur.edit', $utilisateur->id)); ?>" class="btn btn-warning">Modifier</a>
        <form action="<?php echo e(route('administrateur.destroy', $utilisateur->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/utilisateurs/administrateurs/show.blade.php ENDPATH**/ ?>