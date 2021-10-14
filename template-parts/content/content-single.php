<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<img class="resource--img aligncenter" src="<?php the_field ('logo'); ?>">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
		<div class="tags">
			<h4 class="tags--title"><?php the_field ('category'); ?></h4>
			<h4 class="tags--title"><?php the_field ('time_of_year'); ?></h4>
			<h4 class="tags--title"><?php the_field ('genders_served'); ?></h4>
		</div>
		<dl class="resource--info">
			<div>
				<dd><h4 class="resource--info--org"><?php the_field ('presenting_org'); ?></h4></dd>
			</div>
			<div>
				<dt><p><strong class="resource--info--label">Ages/Grades Served:</strong> </p></dt>
				<dd><p class="resource--info--entry"><?php the_field ('grades_served'); ?></p></dd>
			</div>
			<div>
				<dt><p><strong class="resource--info--label">Contact:</strong></p></dt>
				<dd><p class="resource--info--entry"><?php the_field ('contact_name'); ?>, <?php the_field ('contact_email'); ?></p></dd>
			</div>
			<div>
				<dt><p><strong class="resource--info--label">Website:</strong></p></dt>
				<dd><p class="resource--info--entry"><?php the_field ('website'); ?>, <?php the_field ('contact_email'); ?></p></dd>
			</div>
		</dl>
		<?php the_field ('content'); ?>
		<div class="resource--register">
			<a href="<?php the_field ('website'); ?>">Register Now</a>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
