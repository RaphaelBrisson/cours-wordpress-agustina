<?php get_header(); ?>

<main id="main" role="main">
    <section id="homeBanner" style="background-image:url('<?php echo fly_get_attachment_image_src( get_field('homepageImg'), [ 1600, 900 ], true )['src'] ?>');">
		<?php $blog_title = "Association ".get_bloginfo('name'); ?>
        <div class="wrap">
            <h1><?php echo($blog_title) ?></h1>

            <img class="homeBannerLogo" src="<?php echo get_theme_file_uri('/assets/dist/img/logo.png') ?>" alt="Logo de l'association les Vauriens">

            <div class="homeBannerText homeBannerText--desktop wrap--small">
                <p class="homeBannerSlogan">Une âme, un état d'esprit, de la convivialité !</p>
				<?php echo get_field('homepageText'); ?>
            </div>

            <a href="#actualites" data-trigger="smooth-scroll">
                <span class="homeBannerScrolldown"><?php echo file_get_contents(get_theme_file_uri('/assets/dist/img/scrolldown.svg')) ?></span>
            </a>
        </div>
    </section>

    <div class="wrap">
        <div class="homeBannerText homeBannerText--mobile wrap--small">
            <p class="homeBannerSlogan">Une âme, un état d'esprit, de la convivialité !</p>
		    <?php echo get_field('homepageText'); ?>
        </div>
    </div>

    <section id="actualites">
        <div class="wrap">
            <h2>Nos dernières actualités</h2>

			<?php $posts_query = new WP_Query( array(
				'posts_per_page'      => '4',
				'post_type'           => array(
					'post',
				),
				'order'               => 'DESC',
				'orderby'             => 'date',
			));

			if ( $posts_query->have_posts() ) : ?>
                <div class="postList">
					<?php while ( $posts_query->have_posts() ) : $posts_query->the_post();
						$args = [
							'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
						];
						get_template_part( 'partials/loop/post', '', $args );
					endwhile; ?>
                </div>
			<?php endif; ?>

            <div class="strateButton">
                <a href="<?php echo get_permalink(get_field('pageActualites', 'option')) ?>" class="button">Tous les articles</a>
            </div>
        </div>
    </section>

    <section id="call-to-action-archive">
        <div class="wrap">
            <h2><a href="<?php echo get_permalink(get_field('pageArchives', 'option')) ?>">Consulter les archives</a></h2>
        </div>
    </section>

    <section id="evenements">
        <div class="wrap">
            <h2>Nos événements à venir</h2>

			<?php $posts_query = new WP_Query( array(
				'posts_per_page'      => '4',
				'post_type'           => array(
					'evenement',
				),
				'order'               => 'ASC',
				'orderby'             => 'evenementDebut',
				'meta_query' => array(
					array(
						'key'     => 'evenementFin',
						'compare' => '>=',
						'value'   => date('Ymd'),
					),
				),
			));

			if ( $posts_query->have_posts() ) : ?>
                <div class="postList">
					<?php while ( $posts_query->have_posts() ) : $posts_query->the_post();
						$args = [
							'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
						];
						get_template_part( 'partials/loop/post', '', $args );
					endwhile; ?>
                </div>
			<?php endif; ?>

            <div class="strateButton">
                <a href="<?php echo get_permalink(get_field('pageEvenements', 'option')) ?>" class="button">Tous les événements</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
