<?php $__env->startSection('title', 'Aide & Support - Culture Bénin'); ?>
<?php $__env->startSection('page-title', 'Aide & Support'); ?>
<?php $__env->startSection('page-subtitle', 'Trouvez des réponses à vos questions'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <i class="fas fa-question-circle text-primary mb-3" style="font-size: 4rem;"></i>
                <h4>Besoin d'aide ?</h4>
                <p class="text-muted">Nous sommes là pour vous accompagner</p>
                <a href="<?php echo e(route('help.faq')); ?>" class="btn btn-primary me-2">
                    <i class="fas fa-book me-1"></i> FAQ
                </a>
                <a href="<?php echo e(route('help.contact')); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-envelope me-1"></i> Nous contacter
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Ressources utiles</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-file-alt text-primary me-2"></i>
                                    Documentation
                                </h6>
                                <p class="card-text">Guide complet d'utilisation de la plateforme</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Consulter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-video text-primary me-2"></i>
                                    Tutoriels vidéo
                                </h6>
                                <p class="card-text">Vidéos explicatives pour chaque fonctionnalité</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Visionner</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views/help/index.blade.php ENDPATH**/ ?>