<?php $__env->startSection('content'); ?>
<section id="homeBanner" style="background-image:url('<?php echo wp_get_attachment_image_src(get_field('homepageImg'), '2048x2048')[0]; ?>');">
    <?php $blog_title = "Association ".get_bloginfo('name'); ?>
    <div class="wrap">
      <h1><?php echo($blog_title) ?></h1>

      <img class="homeBannerLogo" src="<?= App\asset_path('images/logo.png'); ?>" alt="Logo de l'association les Vauriens">

      <div class="homeBannerText wrap--small">
        <p class="homeBannerSlogan">Une âme, un état d'esprit, de la convivialité !</p>
        <?php echo get_field('homepageText'); ?>
      </div>

      <a href="#actualites">
        <img class="homeBannerScrolldown" src="<?= App\asset_path('images/scrolldown.svg'); ?>">
      </a>
    </div>
</section>

<section id="actualites">
  <div class="wrap">
    <h2>Nos dernières actualités</h2>

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
  </div>
</section>

<section id="call-to-action-archive">
  <div class="wrap">
    <h2><a href="https://lesvauriens.blogspot.com/">Consulter l'ancien blog</a></h2>
  </div>
</section>

<section id="evenements">
  <div class="wrap">
    <h2>Nos événements à venir</h2>

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
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>