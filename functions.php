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
    wp_enqueue_style('auto_complete_style', get_stylesheet_directory_uri(). '/css/jquery.auto-complete.css');
	wp_enqueue_style('slicknav_style', get_stylesheet_directory_uri(). '/css/slicknav.min.css');
    wp_enqueue_script('auto_complete_script', get_stylesheet_directory_uri().'/js/jquery.auto-complete.js', array('jquery'), '', true );
    wp_enqueue_script('slicknav_script', get_stylesheet_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '', true );
	wp_enqueue_script('child_main_script', get_stylesheet_directory_uri().'/js/main.js', array('jquery'), '', true );

    wp_localize_script( 'child_main_script', 'frontend_ajax_object',
        array( 
            'url' => admin_url( 'admin-ajax.php' ),
        )
    );

}

add_action( 'after_setup_theme', 'bimber_child_setup' );


function cwp_filter_function(){   

// //Divisions checkboxes
// if( $divisions = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
// $division_terms = array();

// foreach( $divisions as $division ) {
//     if(  $_POST['division_id'] == $division->term_id)
//         $division_terms[] = $division->slug;
// }
// endif;

// //Conferences checkboxes
// if( $confs = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
// $conf_terms = array();

// foreach( $confs as $conf ) {
//     if( $_POST['conference_id'] == $conf->term_id )
//         $conf_terms[] = $conf->slug;
// }
// endif;

// $state_terms = array();
// //States checkboxes
// if( $states = get_terms( array( 'taxonomy' => 'school-state' ) ) ) :


// foreach( $states as $state ) {
//     if( $_POST['state_id'] == $state->term_id )
//         $state_terms[] = $state->slug;

// }
// endif;

// if( $sports = get_terms( array( 'taxonomy' => 'school-sports' ) ) ) :
// $sport_terms = array();

// foreach( $sports as $sport ) {
//     if( $_POST['sport_id'] == $sport->term_id )
//         $sport_terms[] = $sport->slug;
// }
// endif;


// $division_data='';
// if(!empty($division_terms)){
//     $division_data['taxonomy'] = 'school-division';
//     $division_data['field'] = 'slug';
//     $division_data['terms'] =$division_terms;
// }

// // $conf_data='';
// // if(!empty($conf_terms)){
    
// //     $conf_data['taxonomy'] = 'school-conference';
// //     $conf_data['field'] = 'slug';
// //     $conf_data['terms'] =$conf_terms;
// // }

// $state_data='';
// if(!empty($state_terms)){
    
//     $state_data['taxonomy'] = 'school-state';
//     $state_data['field'] = 'slug';
//     $state_data['terms'] =$state_terms;
// }

// $sport_data='';
// if(!empty($sport_terms)){
    
//     $sport_data['taxonomy'] = 'school-sports';
//     $sport_data['field'] = 'slug';
//     $sport_data['terms'] =$sport_terms;
// }

$state = '';
$division = '';
$sports = '';
$search_data = '';

if($_POST['state_id']){
    $state = $_POST['state_id'];
}

if($_POST['division_id']){
    $division = $_POST['division_id'];
}

if($_POST['sports_id']){
    $sports = $_POST['sports_id'];
}

if($_POST['search_data']){
    $search_data = $_POST['search_data'];
}



if( $division !== ''){
    $division_data = array(
        'key' => 'division',
        'value' => $division,
        'compare' => 'LIKE'
    );
}


if( $state !== ''){
    $state_data = array(
        'key' => 'state',
        'value' =>$state,
        'compare' => 'LIKE'

    );
}

if( $sports !== ''){
    $sports_data = array(
        'key' => 'sports',
        'value' =>$sports,
        'compare' => 'LIKE'
    );
}



$paged = $_POST['page'] ? $_POST['page'] : 1;
$args = array(
    'orderby' => 'date',
    'post_type' => 'schools',
    'posts_per_page' => 10,
    'paged' => $paged,
    'meta_query' => array( 
        'relation' => 'AND',
            $state_data,
            $division_data,
            $sports_data

        // array(
        //     'key' => 'division',
        //     'value' => array($division),
        //     'compare' => 'IN'
        // ),

        // array(
        //     'key' => 'state',
        //     'value' => array($state),
        //     'compare' => 'IN'
        // ),

        // array(
        //     'key' => 'sports',
        //     'value' => array($sports),
        //     'compare' => 'IN'
        // ),
    )



);

//print_r( $_POST);
//$data = $_POST;
 //print_r($division_data);
//echo $_POST['division_id'];

$query = new WP_Query($args);

if( $query->have_posts() ) :
    while( $query->have_posts() ): $query->the_post();
        echo '<h2>' . $query->post->post_title . '</h2>';
    endwhile;



    $total_pages = $query->max_num_pages;


    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo $link_primary =  paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('« prev'),
            'next_text'    => __('next »'),
            //'add_args' => array( 'project' => 1),
        ));


        //echo $total_pages;





        // $links = $link_primary;

        // $links = str_replace('<a ', '<a data-sport='.$sport_data , $links);
        // echo $links;
    }

        echo "<div class='data_div'>";
        echo "<div class='division_id'>".$_POST['division_id']."</div>";
        //echo "<div class='conference_id'>".$_POST['conference_id']."</div>";
        echo "<div class='state_id'>".$_POST['state_id']."</div>";
        echo "<div class='sport_id'>".$_POST['sport_id']."</div>";
        echo "<div class='total_page'>".$total_pages."</div>";
        //echo "<div class='city_id'>".$_POST['city_id']."</div>";
        echo "</div>";



    
    // 
    wp_reset_postdata();
    // echo "hola";
    // print_r($division_terms);
    //echo "<div class='division'>".$division_terms[0]."</div>";


else :
    echo 'No School found with this search fields. Please try again.';
endif;

die();


}









add_action('wp_ajax_myfilter', 'cwp_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'cwp_filter_function');

add_action('wp_ajax_myfilter_new', 'cwp_filter_function_new'); 
add_action('wp_ajax_nopriv_myfilter_new', 'cwp_filter_function_new');



function cwp_filter_function_new(){   

//Divisions checkboxes
if( $divisions = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
$division_terms = array();

foreach( $divisions as $division ) {
    if(  $_POST['division_id'] == $division->term_id)
        $division_terms[] = $division->slug;
}
endif;

//Conferences checkboxes
if( $confs = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
$conf_terms = array();

foreach( $confs as $conf ) {
    if( $_POST['conference_id'] == $conf->term_id )
        $conf_terms[] = $conf->slug;
}
endif;

$state_terms = array();
//States checkboxes
if( $states = get_terms( array( 'taxonomy' => 'school-state' ) ) ) :


foreach( $states as $state ) {
    if( $_POST['state_id'] == $state->term_id )
        $state_terms[] = $state->slug;

}
endif;

//Sports checkboxes
if( $sports = get_terms( array( 'taxonomy' => 'school-sports' ) ) ) :
$sport_terms = array();

foreach( $sports as $sport ) {
    if( $_POST['sport_id'] == $sport->term_id )
        $sport_terms[] = $sport->slug;
}
endif;


$division_data='';
if(!empty($division_terms)){
    $division_data['taxonomy'] = 'school-division';
    $division_data['field'] = 'slug';
    $division_data['terms'] =$division_terms;
}

// $conf_data='';
// if(!empty($conf_terms)){
    
//     $conf_data['taxonomy'] = 'school-conference';
//     $conf_data['field'] = 'slug';
//     $conf_data['terms'] =$conf_terms;
// }

$state_data='';
if(!empty($state_terms)){
    
    $state_data['taxonomy'] = 'school-state';
    $state_data['field'] = 'slug';
    $state_data['terms'] =$state_terms;
}

$sport_data='';
if(!empty($sport_terms)){
    
    $sport_data['taxonomy'] = 'school-sports';
    $sport_data['field'] = 'slug';
    $sport_data['terms'] =$sport_terms;
}


$paged = $_POST['page'];
$city_id = $_POST['city_id'];

$args = array(
    'orderby' => 'date',
    'post_type' => 'schools',
    'posts_per_page' => 10,
    'paged' => $paged,

    'tax_query' => array(
        'relation' => 'AND',

        array(
            $state_data
        ),        
        array(
            $division_data
        ),
        
        // array(
        //     $conf_data
        // ),
        array(
            $sport_data
        )        
    ),

    'meta_query' => array(
        array(
            'key'     => 'city',
            'value'   => $city_id,
            'compare' => 'LIKE',
        ),
    ),



);




$query = new WP_Query( $args );

if( $query->have_posts() ) :
    while( $query->have_posts() ): $query->the_post();
        echo '<h2>' . $query->post->post_title . '</h2>';
    endwhile;



    $total_pages = $query->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo $link_primary =  paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('« prev'),
            'next_text'    => __('next »'),
            'add_args' => array( 'project' => 1),
        ));

        // $links = $link_primary;

        // $links = str_replace('<a ', '<a data-sport='.$sport_data , $links);
        // echo $links;
    }

    // 
    wp_reset_postdata();
    // echo "hola";
    // print_r($division_terms);
    echo "<div class='data_div'>";
    echo "<div class='division_id'>".$_POST['division_id']."</div>";
    echo "<div class='conf_id'>".$_POST['conference_id']."</div>";
    echo "<div class='state_id'>".$_POST['state_id']."</div>";
    echo "<div class='sport_id'>".$_POST['sport_id']."</div>";
    echo "<div class='city_id'>".$city_id."</div>";
    echo "<div class='total_page'>".$total_pages."</div>";
    echo "</div>";


else :
    echo 'No School found with this search fields. Please try again.';
endif;
//print_r($_POST);
die();


}




add_action('wp_ajax_autofill', 'cwp_auto_fill_callback'); 
add_action('wp_ajax_nopriv_autofill', 'cwp_auto_fill_callback');


function cwp_auto_fill_callback(){
    //$search_text = 'dha';
    $search_text = $_POST['search_data'];
    $cities = array();
    $args = array(
        'orderby' => 'date',
        'post_type' => 'schools',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if($query -> have_posts()): while($query -> have_posts()):
        $query -> the_post();
        $division = get_field('division');
        $state = get_field('state');
        $sports = get_field('sports');
        $title = get_the_title();
        array_push($cities,$division,$state, $sports);

    endwhile; endif;

    function Even($array) 
    { 
        // returns if the input integer is even 
        return strpos(strtolower($array), strtolower($search_text)) !== false;   
    } 
      
    $cities = array_unique($cities);
    //$matched_data = array_filter($cities, "Even"); 



    class FindData {
            private $search_text;

            function __construct($search_text) {
                    $this->search_text = $search_text;
            }

            function isLower($array) {
                return strpos(strtolower($array), strtolower($this->search_text)) !== false;
            }
    }


    $matches = array_filter($cities, array(new FindData($search_text), 'isLower'));
    //print_r($matches);








    $cities = array_values ($matches);
    echo json_encode($cities);
    die();
}

