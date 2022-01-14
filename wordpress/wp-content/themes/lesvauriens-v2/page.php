<?php get_header(); ?>

<main id="main" role="main">

	<div class="wrap">

		<h1><?php echo get_the_title(); ?></h1>

		<?php while ( have_posts() ) : the_post(); ?>

            <article class="article">

				<?php the_content(); ?>

			</article>

		<?php endwhile; ?>

	</div>

</main>

<?php get_footer(); ?>
