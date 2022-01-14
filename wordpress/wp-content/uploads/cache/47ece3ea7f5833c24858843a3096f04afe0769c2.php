<?php $__env->startSection('content'); ?>
<!--   <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Aucun résultat trouvé :(', 'sage')); ?>

    </div>
  <?php endif; ?>

  <section id="all-posts" class="wrap">

    <div class="h2">
      <h1>Tous nos articles</h1>
    </div>

    <?= get_search_form() ?>

    <div class="articles-container">
      <?php while(have_posts()): ?> <?php the_post() ?>
      <article>
        <div>
          <h3 class="entry-title"><a href="<?php echo e(get_permalink($post->ID)); ?>"><?php echo e(get_field('titre_article', $post->ID)); ?></a></h3>
          <div class="entry-summary">
            <p><strong>Le <?php echo e(get_field('date_sujet_article', $post->ID)); ?></strong> -
            <?php echo e(get_the_excerpt($post->ID)); ?></p>
          </div>
        </div>
        <div>
          <img src="<?php echo e(get_the_post_thumbnail_url($post->ID, 'medium')); ?>" alt="">
          <p class="see-more-small"><a href="<?php echo e(get_permalink($post->ID)); ?>">Voir l'article</a></p>
        </div>
      </article>
      <?php endwhile; ?>
    </div>

    <?php echo get_the_posts_pagination(); ?>


  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>