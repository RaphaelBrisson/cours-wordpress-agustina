<?php $__env->startSection('content'); ?>

<section class="single-post wrap">
  <div class="titles">
    <div>
      <h1><?php the_field('titre_article'); ?></h1>
      <p><?php echo $__env->make('partials/entry-meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></p>
    </div>
  </div>

  <div class="post-content">
    <p><strong>Le <?php the_field('date_sujet_article'); ?></strong> - <?php the_field('description_article'); ?></p>
  </div>

  <div class="post-images"> 
    <?php for($i=1; $i < 13; $i++): ?> 
      <?php if(get_field('photo_'. $i .'_article')): ?>
        <img src="<?php the_field('photo_'. $i .'_article'); ?>">
      <?php endif; ?>
    <?php endfor; ?>
    <?php if(get_field('video_article')): ?>
        <?php echo(the_field('video_article')); ?>
    <?php endif; ?>
  </div>

  <div>
    <p><?php the_field('conclusion_article'); ?></p>
  </div>
  
  
  
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>