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
		<div class="feature-grants">
			<div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_field ('name_of_organization'); ?></a></h4>
			<p class="grant--title"><strong><?php the_title(); ?></strong></p>
			<ul class="grant--info mt1">
				<li>
					<strong>City/State:</strong>
					<br />
					<?php the_field ('city_state_country'); ?>
				</li>
				<li>
					<strong>Amount:</strong>
					<br />
					$ <?php the_field ('grant_amount'); ?> 
				</li>
				<li>
					<strong>Year:</strong>
					<br />
					<?php the_field ('year_grant_made'); ?> 
				</li>
			</ul>
			<?php the_excerpt(); ?>
			
			</div>
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