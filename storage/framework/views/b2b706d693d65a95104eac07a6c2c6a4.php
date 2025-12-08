<?php $__env->startSection('title', 'Détails du Contenu'); ?>


<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($contenu->titre); ?></h3>
    </div>
    <div class="card-body">
        <p><strong>Texte :</strong> <?php echo e($contenu->texte); ?></p>
        <p><strong>Statut :</strong> <?php echo e($contenu->statut); ?></p>
        <p><strong>Auteur :</strong> <?php echo e($contenu->auteur->nom); ?> <?php echo e($contenu->auteur->prenom); ?></p>
        <p><strong>Modérateur :</strong> <?php echo e($contenu->moderateur->nom ?? 'N/A'); ?> <?php echo e($contenu->moderateur->prenom ?? ''); ?></p>
    </div>
    <div class="card-body">
        <h4>Commentaires</h4>
        <?php if($contenu->commentaires->isEmpty()): ?>
            <p>Aucun commentaire pour ce contenu.</p>
        <?php else: ?>
            <ul class="list-group">
                <?php $__currentLoopData = $contenu->commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <strong><?php echo e($commentaire->utilisateur->nom); ?> <?php echo e($commentaire->utilisateur->prenom); ?> :</strong>
                        <?php echo e($commentaire->texte); ?>

                        <br>
                        <small class="text-muted">Posté le <?php echo e($commentaire->created_at->format('d/m/Y H:i')); ?></small>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="card-footer">
        <a href="<?php echo e(route('contenu.index')); ?>" class="btn btn-secondary">Retour</a>
        <form action="<?php echo e(route('contenu.destroy', $contenu->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/contenus/show.blade.php ENDPATH**/ ?>