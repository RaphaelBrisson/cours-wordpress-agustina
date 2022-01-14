<?php get_header(); ?>

<main id="main" role="main">

	<div class="wrap">

        <h1>Nos actualités</h1>

		<?php if ( have_posts() ): ?>
            <div class="postList">
				<?php while ( have_posts() ): the_post();
					$args = [
						'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
					];
					get_template_part( 'partials/loop/post', '', $args );
				endwhile; ?>
            </div>

			<?php echo get_the_posts_pagination(); ?>

			<?php wp_reset_query(); ?>

		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>
