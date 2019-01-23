<?php
// Prevent direct script access
if ( !defined( 'ABSPATH' ) )
	die ( 'No direct script access allowed' );

/**
* Child Theme Setup
* 
* Always use child theme if you want to make some custom modifications. 
* This way theme updates will be a lot easier.
*/
function bimber_child_setup() {
	wp_enqueue_style('child_style', get_stylesheet_directory_uri(). '/css/styles.css');
	wp_enqueue_script('child_main_script', get_stylesheet_directory_uri().'/js/main.js', array('jquery'), '', true );
}

add_action( 'after_setup_theme', 'bimber_child_setup' );







function cwp_filter_function(){   

//brands checkboxes
if( $brands = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
$brands_terms = array();

foreach( $brands as $brand ) {
    if( isset( $_POST['brand_' . $brand->term_id ] ) && $_POST['brand_' . $brand->term_id] == 'on' )
         $brands_terms[] = $brand->slug;
}
endif;

//sizes checkboxes
if( $sizes = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
$sizes_terms = array();

foreach( $sizes as $size ) {
    if( isset( $_POST['size_' . $size->term_id ] ) && $_POST['size_' . $size->term_id] == 'on' )
         $sizes_terms[] = $size->slug;
}
endif;


$brand_data='';
if(!empty($brands_terms)){
	$brand_data['taxonomy'] = 'school-division';
	$brand_data['field'] = 'slug';
	$brand_data['terms'] =$brands_terms;
}

$sizes_data='';
if(!empty($sizes_terms)){
	
	$sizes_data['taxonomy'] = 'school-conference';
	$sizes_data['field'] = 'slug';
	$sizes_data['terms'] =$sizes_terms;
}

$args = array(
    'orderby' => 'date',
    'post_type' => 'schools',
    'posts_per_page' => -1,
    'tax_query' => array(
        'relation' => 'AND',
        array(
        	$brand_data
            // 'taxonomy' => 'school-division',
            // 'field' => 'slug',
            // 'terms' => $brands_terms
        ),
        
        array(
        	$sizes_data

	        //     'taxonomy' => 'school-conference',
	        //     'field' => 'slug',
	        //     'terms' =>$sizes_terms
        )

        
    )
);

$query = new WP_Query( $args );

if( $query->have_posts() ) :
    while( $query->have_posts() ): $query->the_post();
        echo '<h2>' . $query->post->post_title . '</h2>';
    endwhile;
    wp_reset_postdata();
else :
    echo 'No posts found';
endif;
die();
}


add_action('wp_ajax_myfilter', 'cwp_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'cwp_filter_function');