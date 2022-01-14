<?php get_header(); ?>

<main id="main" role="main">

	<div class="archive-evenements wrap">

		<h1>Nos événements</h1>

		<h2>À venir</h2>

		<?php
		$posts_query = new WP_Query( array(
			'posts_per_page'      => '-1',
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
		?>

		<?php if ( $posts_query->have_posts() ): ?>
			<div class="postList">
				<?php while ( $posts_query->have_posts() ): $posts_query->the_post();
					$args = [
						'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
					];
					get_template_part( 'partials/loop/post', '', $args );
				endwhile; ?>
			</div>

			<?php wp_reset_query(); ?>

		<?php endif; ?>

		<h2>Passés</h2>

		<?php
		$posts_query = new WP_Query( array(
			'posts_per_page'      => '-1',
			'post_type'           => array(
				'evenement',
			),
			'order'               => 'ASC',
			'orderby'             => 'evenementDebut',
			'meta_query' => array(
				array(
					'key'     => 'evenementFin',
					'compare' => '<',
					'value'   => date('Ymd'),
				),
			),
		));
		?>

		<?php if ( $posts_query->have_posts() ): ?>
			<div class="postList">
				<?php while ( $posts_query->have_posts() ): $posts_query->the_post();
					$args = [
						'thumbnail' => getThumbnail( get_the_ID(), [400,200]),
					];
					get_template_part( 'partials/loop/post', '', $args );
				endwhile; ?>
			</div>

			<?php wp_reset_query(); ?>

		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>
