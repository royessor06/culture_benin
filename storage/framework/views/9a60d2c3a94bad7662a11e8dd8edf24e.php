<?php $__env->startSection('title', 'Gestion des contenus'); ?>
<?php $__env->startSection('page-title', 'Contenus'); ?>
<?php $__env->startSection('page-subtitle', 'Gestion de tous les contenus'); ?>

<?php $__env->startSection('header-actions'); ?>
<div class="d-flex gap-2">
    <a href="<?php echo e(route('contenu.create')); ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        <span>Nouveau contenu</span>
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card mb-4 shadow-sm animate-fade">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Liste des contenus</h5>

        <div class="card-tools d-flex align-items-center">
            
            <form action="<?php echo e(route('contenu.index')); ?>" method="GET" class="me-2">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher..."
                        value="<?php echo e(request('search')); ?>">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>

        <div class="table-responsive card-body p-0">
            <table class="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Texte</th>
                        <th>Statut</th>
                        <th>Auteur</th>
                        <th>Modérateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $contenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($contenu->titre); ?></td>
                            <td><?php echo e(Str::limit($contenu->texte, 60)); ?></td>

                            <td>
                                <span class="badge
                                    <?php echo e($contenu->statut === 'Publié' ? 'bg-success' :
                                        ($contenu->statut === 'Brouillon' ? 'bg-warning' : 'bg-danger')); ?>">
                                    <?php echo e($contenu->statut); ?>

                                </span>
                            </td>

                            <td><?php echo e($contenu->auteur->nom); ?> <?php echo e($contenu->auteur->prenom); ?></td>
                            <td><?php echo e($contenu->moderateur->nom ?? '—'); ?> <?php echo e($contenu->moderateur->prenom ?? ''); ?></td>

                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('contenu.show', $contenu->id)); ?>"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="<?php echo e(route('contenu.destroy', $contenu->id)); ?>"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Supprimer ce contenu ?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="table-btn table-btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    <div class="table-pagination">
        <div class="pagination-info">
                Affichage de <?php echo e($contenus->firstItem()); ?> à <?php echo e($contenus->lastItem()); ?>

                sur <?php echo e($contenus->total()); ?> résultats
        </div>
        <div class="card-footer">
                <?php echo e($contenus->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/contenus/index.blade.php ENDPATH**/ ?>