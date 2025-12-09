<?php $__env->startSection('content'); ?>
    <div class="card card-warning card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Ajouter une langue</div>
        </div>
        <form method="POST" action="<?php echo e(route('langue.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="nom"
                               name="nom"
                               value="<?php echo e(old('nom')); ?>"
                               required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="code" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="code"
                               name="code"
                               value="<?php echo e(old('code')); ?>"
                               required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"
                                  id="description"
                                  name="description"
                                  rows="3"><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button"
                        class="btn btn-danger"
                        onclick="window.location='<?php echo e(route('langue.index')); ?>'">
                    Annuler
                </button>

                <button type="submit" class="btn float-end btn-success">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\langues\create.blade.php ENDPATH**/ ?>