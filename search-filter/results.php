<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() )
{
	?>
	
	Found <?php echo $query->found_posts; ?> Results<br />
	Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />
	
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<div class='search-filter-result-item'>
				<img class="resource--img" src="<?php the_field ('logo'); ?>">
				<div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="tags">
						<h4 class="tags--title"><?php the_field ('category'); ?></h4>
						<h4 class="tags--title"><?php the_field ('time_of_year'); ?></h4>
						<h4 class="tags--title"><?php the_field ('genders_served'); ?></h4>
					</div>
					<dl class="resource--info">
						<div  class="resource--info--org">
							<dd><h4><?php the_field ('presenting_org'); ?></h4></dd>
						</div>
						<div  class="resource--info--genders">
						<div >
							<dt><p><strong>Ages/Grades Served:</strong> </p></dt>
							<dd><p><?php the_field ('grades_served'); ?></p></dd>
						</div>
						<div  class="resource--info--contact">
							<dt><p><strong >Contact:</strong></p></dt>
							<dd><p ><?php the_field ('contact_name'); ?>, <?php the_field ('contact_email'); ?></p></dd>
						</div>
						<div class="resource--info--website">
							<dt><p><strong>Website:</strong></p></dt>
							<dd><p><a href="<?php the_field ('website'); ?>"><?php the_field ('website'); ?></a></p></dd>
						</div>
					</dl>
					<p><br /><?php the_excerpt(); ?></p>
					
					<div class="resource--register">
						<a href="<?php the_field ('website'); ?>">Register Now</a>
					</div>
				</div>
				<hr />
			</div>
		
		<br />
		<?php
	}
	?>
	Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />
	
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>