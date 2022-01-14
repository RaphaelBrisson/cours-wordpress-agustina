<div class="postItem">
	<div class="postItemThumbnail">
        <img data-src="<?php echo $args['thumbnail']; ?>" height="240" alt="<?php echo esc_attr( get_the_title() ); ?>">
    </div>
	<div class="postItemContent">
		<h3 class="postItemTitle">
			<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
		</h3>
        <?php if ( get_post_type() === 'post' ): ?>
            <div class="postItemDate">Publié le <?php echo get_the_date(); ?></div>
        <?php elseif ( get_post_type() === 'evenement' ): ?>
            <?php get_template_part('partials/evenement/dates'); ?>
        <?php endif; ?>
		<?php if ( get_the_excerpt() ) { ?>
			<div class="postItemExcerpt">
				<?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
            </div>
		<?php } ?>
	</div>
</div>
