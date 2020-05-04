<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
  <div class="error-page wrap">
    <h1>
      <?php echo e(__('La page n’existe pas :/', 'sage')); ?>

    </h1>
    <a href="<?= get_home_url() ?>">Revenir à l'accueil</a>
  </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>