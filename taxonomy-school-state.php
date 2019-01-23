<?php
/**
 * The Template for displaying School archive pages.
 *
 * @license For the full license information, please view the Licensing folder
 * that was distributed with this source code.
 *
 * @package Bimber_Theme 4.10
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

get_header();
?>



	<div id="primary" class="g1-column g1-column-2of3">
		<div id="content" role="main kk ">

			<header class="g1-row archive-header">
				<div class="g1-row-inner">

					<h1 class="g1-alpha g1-alpha-2nd archive-title">Schools</h1>

				</div>
			</header>

			<div class="custom_row">
				<div class="column column-8">
					
					<?php $tax = single_cat_title('',false); ?>
		            <?php
		               $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		               $args = array('post_type' => 'schools', 'posts_per_page' => -1, 'school-state' => $tax,'paged' => $paged);
		               $category_posts = new WP_Query($args);
		               if($category_posts->have_posts()) : while($category_posts->have_posts()) : $category_posts->the_post();
		            ?>

		                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                <!--<p class="state"><?php echo $tax; ?></p>-->

		            <?php endwhile; endif; ?>
		            <?php //echo kriesi_pagination();?>
		            <?php wp_reset_query();  ?>

				</div>


				<div class="column column-4">


<div class="cssmenu">
	<ul>


	<li class='has-sub'><a href='#'><span>States</span></a>
		<ul>
			<?php
				$state_terms = array();
				$states = get_terms( 'school-state', array(
					'hide_empty' => false,
				));
				//print_r($states);
				
				foreach($states as $state){
					//$state_terms[] = $state -> name;
					$state_id = $state->term_taxonomy_id; ?>
					<li><a href="<?php echo get_term_link($state_id); ?>"><?php echo $state->name; ?></a></li>

				<?php }
				//print_r($term_names);
			?>
		</ul>
	</li>

	<li class='has-sub'><a href='#'><span>Division</span></a>
		<ul>
			<?php
				$state_terms = array();
				$states = get_terms( 'school-division', array(
					'hide_empty' => false,
				));
				//print_r($states);
				
				foreach($states as $state){
					//$state_terms[] = $state -> name;
					$state_id = $state->term_taxonomy_id; ?>
					<li><a href="<?php echo get_term_link($state_id); ?>"><?php echo $state->name; ?></a></li>

				<?php }
				//print_r($term_names);
			?>
		</ul>
	</li>

	<li class='has-sub'><a href='#'><span>Conference Center</span></a>
		<ul>
			<?php
				$state_terms = array();
				$states = get_terms( 'school-conference', array(
					'hide_empty' => false,
				));
				//print_r($states);
				
				foreach($states as $state){
					//$state_terms[] = $state -> name;
					$state_id = $state->term_taxonomy_id; ?>
					<li><a href="<?php echo get_term_link($state_id); ?>"><?php echo $state->name; ?></a></li>

				<?php }
				//print_r($term_names);
			?>
		</ul>
	</li>


	<li class='has-sub'><a href='#'><span>Sports</span></a>
		<ul>
			<?php
				$state_terms = array();
				$sports = get_terms( 'school-sports', array(
					'hide_empty' => false,
				));
				//print_r($states);
				
				foreach($sports as $sport){
					//$state_terms[] = $state -> name;
					$sport_id = $sport->term_taxonomy_id; ?>
					<li><a href="<?php echo get_term_link($sport_id); ?>"><?php echo $sport->name; ?></a></li>

				<?php }
				//print_r($term_names);
			?>
		</ul>
	</li>



</ul>
</div>

				</div>


			</div>

		</div><!-- #content -->
	</div><!-- #primary -->





<?php get_footer();?>
