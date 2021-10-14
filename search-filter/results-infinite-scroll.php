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
	<div class='search-filter-results-list'>
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
							<dt><p><strong class="resource--info--label">Contact:</strong></p></dt>
							<dd><p class="resource--info--entry"><?php the_field ('contact_name'); ?>, <?php the_field ('contact_email'); ?></p></dd>
						</div>
					</dl>
					<p><br /><?php the_excerpt(); ?></p>
					
					<div class="resource--register">
						<a href="<?php the_field ('website'); ?>">Register Now</a>
					</div>
				</div>
				<hr />
			</div>
			
			<?php
		}
	?>
	</div>
<?php
}
else
{
	?>
	<div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
		<span>End of Results</span>
	</div>
	<?php
}
?>