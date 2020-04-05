<?php $__env->startSection('content'); ?>
 <!-- <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
 <style>
 	h1
 	{
 		padding-top: 200px;
 	}
 </style>

  <div>
    <h1><?php the_field('titre_article'); ?></h1>
    <h2><?php the_field('date_sujet_article'); ?></h2>
    <p><?php the_field('description_article'); ?></p>
    <img src="<?php the_field('photo_1_article'); ?>" 
    alt="">
    <?php echo(the_field('video_article')); ?>
    
    
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>