<?php $__env->startSection('title', 'Gestion des régions'); ?>
<?php $__env->startSection('page-title', 'Régions'); ?>
<?php $__env->startSection('page-subtitle', 'Gestion de toutes les régions'); ?>

<?php $__env->startSection('header-actions'); ?>
<div class="d-flex gap-2">
    <a href="<?php echo e(route('region.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>Nouvelle région</span>
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4 shadow-sm animate-fade">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Liste des régions</h5>

            <div class="card-tools d-flex align-items-center">
                
                <form action="<?php echo e(route('region.index')); ?>" method="GET" class="me-2">
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
                        <th>Localisation</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($region->nom); ?></td>
                            <td><?php echo e($region->localisation); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('region.show', $region->id)); ?>"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('region.edit', $region->id)); ?>"
                                        class="table-btn table-btn-edit"
                                        title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('region.destroy', $region->id)); ?>"
                                        method="POST"
                                        class="inline-form"
                                        onsubmit="return confirm('Supprimer cette région ?')">
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
                    Affichage de <?php echo e($regions->firstItem()); ?> à <?php echo e($regions->lastItem()); ?>

                    sur <?php echo e($regions->total()); ?> résultats
            </div>
            <div class="card-footer">
                <?php echo e($regions->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/regions/index.blade.php ENDPATH**/ ?>