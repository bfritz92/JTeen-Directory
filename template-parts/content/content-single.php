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

	<header class="entry-header alignfull">
		
	</header><!-- .entry-header -->

	<div class="entry-content search-filter-result-item">
		
		<img class="resource--img aligncenter" src="<?php the_field ('logo'); ?>">
		<div class="resource--info">
		<h2><?php the_title(); ?></h2>
		
		<dl class="resource--info--list">
			<div class="resource--info--org">
				<dd><h4><?php the_field ('presenting_org'); ?></h4></dd>
			</div>
			<div class="resource--info--genders">
				<dt><p><strong>Grades Served:</strong> </p></dt>
				<dd><p><?php the_field ('grades_served'); ?></p></dd>
			</div>
			<div class="resource--info--contact">
				<dt><p><strong>Contact:</strong></p></dt>
				<dd><p><?php the_field ('contact_name'); ?>, <?php the_field ('contact_email'); ?></p></dd>
			</div>
			<div class="resource--info--website">
				<dt><p><strong>Website:</strong></p></dt>
				<dd><p><?php the_field ('website'); ?>, <?php the_field ('contact_email'); ?></p></dd>
			</div>
		</dl>
		<div class="tags">
			<h4 class="tags--title"><?php the_field ('category'); ?></h4>
			<h4 class="tags--title"><?php the_field ('time_of_year'); ?></h4>
			<h4 class="tags--title"><?php the_field ('genders_served'); ?></h4>
		</div>
		<br />
		<?php the_field ('content'); ?>
		<?php the_content(); ?>
		<div class="resource--register">
			<a href="<?php the_field ('website'); ?>">Register Now</a>
		</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
