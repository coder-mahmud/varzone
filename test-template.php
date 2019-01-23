<?php
/**
 Template Name: Test Template
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

get_header();
?>



	<div id="primary" class="g1-primary-max">
		<div id="content" role="main">

			<header class="g1-row archive-header">
				<div class="g1-row-inner">

					<h1 class="g1-alpha g1-alpha-2nd archive-title">Test Page</h1>

				</div>
			</header>

			<?php
				$term_names = array();
				$terms = get_terms( 'school-state', array(
					'hide_empty' => false,
				));
				//print_r($terms);
				foreach($terms as $term){
					$term_names[] = $term -> name;
				}
				print_r($term_names);
			?>
			<h2>Term Test</h2>
			<?php
				//print_r( get_term_link(161));

			?>
			<a href="<?php echo get_term_link(2379); ?>">Go to!</a>			

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer();
