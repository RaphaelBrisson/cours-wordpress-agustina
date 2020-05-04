<?php $__env->startSection('content'); ?>
  <!-- <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
<section id="home_presentation">
    <img class="red_triangle" src="<?= App\asset_path('images/red_triangle.png'); ?>" alt="">
    <?php $blog_title = "Association ".get_bloginfo('name'); ?>
    <div class="wrap2">
      <h1><?php echo($blog_title) ?></h1>
      <img src="<?= App\asset_path('images/logo.png'); ?>" alt="">
      <p class="slogan">Une âme, un état d'esprit, de la convivialité !</p>

      <!-- Description de l'association (formatage automatique avec ACF (pour <p> et <br>)) -->
      <?php echo e(the_field('description_accueil')); ?>



      <a href="#actualites"><svg xmlns="http://www.w3.org/2000/svg" width="36.132" height="17.006" viewBox="0 0 36.132 17.006">
        <path id="Tracé_2" data-name="Tracé 2" d="M0,0,17.658,13.895,34.241,0" transform="translate(0.928 1.179)" fill="none" stroke="#F72C3F" stroke-width="3"/>
      </svg></a>
    </div>
</section> 
  
<section id="actualites" class="wrap">
  <div class="h2">
    <h2>Nos dernières actualités</h2>
    <span></span>
  </div>

  <?php ($posts = $articles); ?>
  <div class="articles-container">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <article>
        <div>
          <h3 class="entry-title"><a href="<?php echo e(get_permalink($post->ID)); ?>"><?php echo e(get_field('titre_article', $post->ID)); ?></a></h3>
          <div class="entry-summary">
            <p><strong>Le <?php echo e(get_field('date_sujet_article', $post->ID)); ?></strong> - 
            <?php echo e(get_the_excerpt($post->ID)); ?></p>
          </div>
          <p class="see-more-big"><a href="<?php echo e(get_permalink($post->ID)); ?>">Voir l'article</a></p>
        </div>
        <div>
          <img src="<?php echo e(get_the_post_thumbnail_url($post->ID, 'medium')); ?>" alt="">
          <p class="see-more-small"><a href="<?php echo e(get_permalink($post->ID)); ?>">Voir l'article</a></p>
        </div>
      </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  
  <div>
    <p class="display-more"><a href="<?= get_post_type_archive_link('post') ?>">TOUS LES ARTICLES</a></p>
  </div>
</section>

<section id="evenements" class="wrap">
  <div class="h2">
    <h2>Nos événements à venir pour 2020</h2>
    <span></span>
  </div>

  <?php ($posts = $evenements); ?>
  <div>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="evenement">
        <p><?php echo e(get_field('date_evenement', $post->ID)); ?></p>
        <h3><?php echo e(get_field('titre_evenement', $post->ID)); ?></h3>
        <p><?php echo e(get_field('description_evenement', $post->ID)); ?></p>
        <?php if(get_field('lien_externe_evenement', $post->ID)): ?>
        <p>Plus d’infos sur : <a href="<?php echo e(get_field('lien_externe_evenement', $post->ID)); ?>" target="_blank"><?php echo e(get_field('lien_externe_evenement', $post->ID)); ?></a></p>
        <?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>