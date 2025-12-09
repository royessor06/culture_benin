<?php $__env->startSection('content'); ?>
    <div class="card card-warning card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Ajouter une région</div>
        </div>
        <form method="POST" action="<?php echo e(route('region.store')); ?>">
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
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"
                                  id="description"
                                  name="description"
                                  rows="3"><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="population" class="col-sm-2 col-form-label">Population</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="population"
                               name="population"
                               value="<?php echo e(old('population')); ?>"
                        />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="superficie" class="col-sm-2 col-form-label">Superficie</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="superficie"
                               name="superficie"
                               value="<?php echo e(old('superficie')); ?>"
                        />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="localisation" class="col-sm-2 col-form-label">Localisation</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="localisation"
                               name="localisation"
                               value="<?php echo e(old('localisation')); ?>"
                               required/>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button"
                        class="btn btn-danger"
                        onclick="window.location='<?php echo e(route('region.index')); ?>'">
                    Annuler
                </button>

                <button type="submit" class="btn float-end btn-success">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\regions\create.blade.php ENDPATH**/ ?>