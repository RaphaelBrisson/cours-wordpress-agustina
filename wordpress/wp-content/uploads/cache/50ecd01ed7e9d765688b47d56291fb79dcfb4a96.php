<?php $__env->startSection('content'); ?>
<!--   <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Aucun résultat trouvé :(', 'sage')); ?>

    </div>
  <?php endif; ?>
  
  <section id="all-posts" class="wrap">
    
    <div class="h2">
      <h1>Résultats pour : <?= $_GET["s"] ?></h1>
    </div>
  
    <?= get_search_form() ?>

    <div class="articles-container">
      <?php while(have_posts()): ?> <?php the_post() ?>
      <article>
        <div>
          <h3 class="entry-title"><a href="<?php echo e(get_permalink($post->ID)); ?>"><?php echo e(get_field('titre_article', $post->ID)); ?></a></h3>
          <div class="entry-summary">
            <?php echo e(get_the_excerpt($post->ID)); ?>

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


    <div>
      <p class="display-more"><a href="<?= get_post_type_archive_link('post') ?>">TOUS LES ARTICLES</a></p>
    </div>

  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>