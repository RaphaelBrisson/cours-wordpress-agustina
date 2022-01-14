<?php get_header(); ?>

	<main id="main" role="main">

        <div class="wrap">

            <?php global $wp_query ?>
            <h1><?php echo sprintf("%d résultat(s) pour : <b>\"%s\"</b>", $wp_query->found_posts, get_search_query() ); ?></h1>

			<?php if ( have_posts() ): ?>

                <article class="postList">
	                <?php
	                while ( have_posts() ) : the_post();
		                $args = [
			                'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
		                ];
		                get_template_part( 'partials/loop/post', '', $args );
	                endwhile; ?>
                </article>

                <?php
				echo get_the_posts_pagination();

				wp_reset_postdata();
                ?>

			<?php endif; ?>

        </div>

	</main>

<?php get_footer(); ?>
