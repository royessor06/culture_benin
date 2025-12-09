<?php $__env->startSection('title', 'Ajouter Contenu'); ?>


<?php $__env->startSection('content'); ?>
<div class="form-container">
    <h2>Ajouter un contenu</h2>

    <form action="<?php echo e(route('contenu.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label>Titre</label>
        <input type="text" name="titre" required>

        <label>Texte</label>
        <textarea name="texte" rows="5" required></textarea>

        <label>Type de Contenu</label>
        <select name="type_contenu_id" required>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>"><?php echo e($type->nom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label>Région</label>
        <select name="region_id" required>
            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($region->id); ?>"><?php echo e($region->nom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label>Langue</label>
        <select name="langue_id" required>
            <?php $__currentLoopData = $langues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($langue->id); ?>"><?php echo e($langue->nom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label>Images / Médias</label>
        <input type="file" name="medias[]" multiple>

        <button type="submit" class="submit-btn">Ajouter</button>
    </form>
</div>

<style>
.form-container {
    width: 55%;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}
form input, form textarea, form select {
    width: 100%;
    margin-top: 8px;
    margin-bottom: 20px;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
}
.submit-btn {
    padding: 12px 20px;
    background: #e8b600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
.submit-btn:hover {
    background: #ffcf33;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\contenus\create.blade.php ENDPATH**/ ?>