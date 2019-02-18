<?php
/**
Template Name: Categories
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

get_header();
?>

	<div class="g1-primary-max">
		<div id="content" role="main">
			<div class="g1-row g1-row-layout-page g1-row-padding-m entry-body-row">
			<div class="g1-row-inner">
			<div class="g1-column">
			<h2>All Categories</h2>
			<?php

	$categories = get_categories( array(
		'orderby' => 'name',
		'order'   => 'ASC',
		'exclude' => array (2837,1)
	) );
	//print_r($categories);
	foreach($categories as $category){
		$icon = get_field('icon', 'category_'.$category->term_id);?>
		
		<a class='single_cat_name' href="<?php echo get_category_link( $category->term_id ) ;?>">
			<img src="<?php echo $icon; ?>" alt="">
			<p class="name"><?php echo $category->name ?></p>
		</a>
	<?php }	
		?>
			</div>
			</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer();
