<?php $__env->startSection('content'); ?>

<section class="single-post">
  <div class="wrap">
    <h1><?php echo get_the_title(); ?></h1>
    <?php echo $__env->make('partials/entry-meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="article wrap--small">
      <?php while(have_posts()): ?> <?php the_post() ?>
        <?php the_content() ?>
      <?php endwhile; ?>
    </div>

  </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>