<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <p><strong>Nom :</strong> <?php echo e($region->nom); ?></p>
        <p><strong>Description :</strong> <?php echo e($region->description); ?></p>
        <p><strong>Population :</strong> <?php echo e($region->population); ?></p>
        <p><strong>Superficie :</strong> <?php echo e($region->superficie); ?></p>
        <p><strong>Localisation :</strong> <?php echo e($region->localisation); ?></p>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('region.index')); ?>" class="btn btn-secondary">Retour</a>
        <a href="<?php echo e(route('region.edit', $region->id)); ?>" class="btn btn-warning">Modifier</a>
        <form action="<?php echo e(route('region.destroy', $region->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/regions/show.blade.php ENDPATH**/ ?>