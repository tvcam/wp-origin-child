<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$index_postinfo = et_get_option( 'origin_postinfo1' );

		$thumb = '';
		$width = (int) apply_filters( 'et_entry_image_width', 640 );
		$height = (int) apply_filters( 'et_entry_image_height', 480 );
		$classtext = '';
		$titletext = get_the_title();
		$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Entryimage' );
		$thumb = $thumbnail["thumb"];
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-image masonry-item' ); ?>>
			<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext ); ?>
			<div class="image-info" style="background: <?php echo esc_html( et_get_option( 'box_bg_hover_color', 'rgba( 255,150,0,0.65 )' ) ); ?>">
				<a href="<?php the_permalink(); ?>" class="image-link"><?php _e( 'Read more', 'Origin' ); ?></a>
			</div> <!-- .image-info -->
		</article> <!-- .entry-image -->
	<?php endwhile; ?>

	<?php get_template_part( 'includes/navigation', 'index' ); ?>
<?php else : ?>
	<?php get_template_part( 'includes/no-results', 'index' ); ?>
<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
