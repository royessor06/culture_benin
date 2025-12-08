<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <p><strong>Code :</strong> <?php echo e($langue->code); ?></p>
        <p><strong>Langue :</strong> <?php echo e($langue->nom); ?></p>
        <p><strong>Description :</strong> <?php echo e($langue->description); ?></p>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('langue.index')); ?>" class="btn btn-secondary">Retour</a>

        <a href="<?php echo e(route('langue.edit', $langue->id)); ?>" class="btn btn-warning">Modifier</a>
    
        <form action="<?php echo e(route('langue.destroy', $langue->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/langues/show.blade.php ENDPATH**/ ?>