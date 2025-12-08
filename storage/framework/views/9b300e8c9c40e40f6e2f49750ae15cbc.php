<?php $__env->startSection('title', 'Mon Profil - Culture Bénin'); ?>
<?php $__env->startSection('page-title', 'Mon Profil'); ?>
<?php $__env->startSection('page-subtitle', 'Gérez vos informations personnelles'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="<?php echo e(asset('storage/' . auth()->user()->photo) ?? asset('adminLTE/img/roy_admin.jpg')); ?>"
                     alt="Photo de profil"
                     class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo e(auth()->user()->nom); ?> <?php echo e(auth()->user()->prenom); ?></h5>
                <p class="text-muted mb-1"><?php echo e(auth()->user()->email); ?></p>
                <p class="text-muted mb-4"><?php echo e(auth()->user()->role->nom ?? 'Utilisateur'); ?></p>
                <div class="d-flex justify-content-center mb-2">
                    <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informations personnelles</h5>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nom complet</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo e(auth()->user()->nom); ?> <?php echo e(auth()->user()->prenom); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Date d'inscription</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo e(auth()->user()->date_inscription); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Statut</p>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge bg-success"><?php echo e(auth()->user()->statut); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/profile/show.blade.php ENDPATH**/ ?>