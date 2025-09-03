<?php if (Helpers::hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Helpers::getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Helpers::hasFlash('error')): ?>
    <div class="alert alert-error">
        <?= Helpers::getFlash('error') ?>
    </div>
<?php endif; ?>

<?php if (Helpers::hasFlash('warning')): ?>
    <div class="alert alert-warning">
        <?= Helpers::getFlash('warning') ?>
    </div>
<?php endif; ?>

<?php if (Helpers::hasFlash('info')): ?>
    <div class="alert alert-info">
        <?= Helpers::getFlash('info') ?>
    </div>
<?php endif; ?>
