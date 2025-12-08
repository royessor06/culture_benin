<?php $__env->startSection('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Modifier un administrateur</h3>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('administrateur.update', $administrateur->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo e($administrateur->nom); ?>" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénoms</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo e($administrateur->prenom); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo e($administrateur->email); ?>" required>
            </div>

            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="<?php echo e(route('administrateur.index')); ?>" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/utilisateurs/administrateurs/edit.blade.php ENDPATH**/ ?>