<?php $__env->startSection('title', 'Gestion des lecteurs'); ?>
<?php $__env->startSection('page-title', 'Lecteurs'); ?>
<?php $__env->startSection('page-subtitle', 'Gestion de tous les lecteurs'); ?>


<?php $__env->startSection('content'); ?>
    <div class="table-container card mb-4">
        <div class="table-header-actions d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0 fw-bold">Liste des lecteurs</h5>

            <div class="d-flex gap-2 align-items-center">
                
                <form action="<?php echo e(route('lecteur.index')); ?>" method="GET" class="me-2">
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
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $utilisateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilisateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($utilisateur->nom); ?></td>
                            <td><?php echo e($utilisateur->prenom); ?></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-envelope text-primary"></i>
                                    <span class="truncate-text" data-full-text="<?php echo e($utilisateur->email); ?>">
                                        <?php echo e($utilisateur->email); ?>

                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">
                                    <i class="fas fa-calendar me-1"></i>
                                    <?php echo e($utilisateur->date_inscription); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($utilisateur->statut === 'actif'): ?>
                                <span class="table-badge published">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Actif
                                </span>
                                <?php elseif($utilisateur->statut === 'inactif'): ?>
                                <span class="table-badge draft">
                                    <i class="fas fa-pause-circle me-1"></i>
                                    Inactif
                                </span>
                                <?php else: ?>
                                <span class="table-badge pending">
                                    <i class="fas fa-clock me-1"></i>
                                    En attente
                                </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('lecteur.show', $utilisateur->id)); ?>"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="<?php echo e(route('lecteur.destroy', $utilisateur->id)); ?>"
                                        method="POST"
                                        class="inline-form"
                                        onsubmit="return confirm('Supprimer ce lecteur ?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="table-btn table-btn-delete" title="Supprimer">
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
                Affichage de <?php echo e($lecteurs->firstItem()); ?> à <?php echo e($lecteurs->lastItem()); ?>

                sur <?php echo e($lecteurs->total()); ?> résultats
            </div>
            <div class="pagination-links">
                <?php echo e($lecteurs->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\utilisateurs\lecteurs\index.blade.php ENDPATH**/ ?>