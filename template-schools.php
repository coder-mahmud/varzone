<?php
/**
 Template Name: Schools
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

get_header();
?>


	<div class="search_holder">
	<div id="primary" class="g1-column g1-column-2of3 school_filter_page">
		<div id="content" role="main">

			<div class="custom_row">

				<div class="column column-4">
					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="scholl_filter">

<!-- 			            <div  class="single_filter">
			            	<span class="select_name">Conference Center</span>
			                <?php  
			                      if( $confs = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
			                            echo '<select name="conference_id" class="form_selector"> ';
			                            echo '<option value="select">No Preference</option>';
			                        foreach( $confs as $conf ) :
			                             echo  '<option value="'. $conf->term_id . '">'.$conf->name.'</option>';

			                        endforeach;
			                            echo '</select>';
			                    endif;

			                ?>
			            </div> -->

			            <div class="single_filter">
			            	<span class="select_name">State</span>
			                <?php  
			                      if( $states = get_terms( array( 'taxonomy' => 'school-state' ) ) ) :
			                            echo '<select name="state_id" class="form_selector">';
			                            echo '<option value="select">No Preference</option>';
			                        foreach( $states as $state ) :
			                             echo  '<option value="'. $state->term_id . '">'.$state->name.'</option>';

			                        endforeach;
			                            echo '</select>';
			                    endif;

			                ?>
			            </div>


			            <div class="single_filter">
			            	<span class="select_name">Sport</span>
			                <?php  
			                      if( $sports = get_terms( array( 'taxonomy' => 'school-sports' ) ) ) :
			                            echo '<select name="sport_id" class="form_selector">';
			                            echo '<option value="select">No Preference</option>';
			                        foreach( $sports as $sport ) :
			                             echo  '<option value="'. $sport->term_id . '">'.$sport->name.'</option>';
			                        endforeach;
			                            echo '</select>';
			                    endif;

			                ?>
			            </div>



				        <div class="single_filter">
				        	<span class="select_name">Division</span>
				                <?php  
				                      if( $divisions = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
				                            echo '<select name="division_id" id="" class="form_selector">';
				                            echo '<option value="select">No Preference</option>';
				                        foreach( $divisions as $division ) :

				                               echo  '<option value="'. $division->term_id . '">'.$division->name.'</option>';

				                        endforeach;
				                            //echo '</ul>';
				                            echo '</select>';
				                    endif;
				                ?>
				        </div>

				        <div  class="single_filter">
							<input type="text" name="city_id" placeholder="Write your city" class="city">
				        </div>
				        <div  class="single_filter">
							<button class="btn btn-primary">Search Schools</button>
				        </div>

				        
<!-- <input type="hidden" name="action" value="demo-pagination-load-posts">	 -->			        
				        <input type="hidden" name="action" value="myfilter">
				        <input type="hidden" name="page" value="1">
				    </form>

				</div><!-- End column-4 -->

				<div class="column column-8 result_div">
					<header class="g1-row archive-header">
						<div class="g1-row-inner">

							<h1 class="g1-alpha g1-alpha-2nd archive-title"><?php the_title(); ?></h1>
							<hr>

						</div>
					</header>



					<div id="response">
						<?php if(have_posts()):
							while(have_posts()) : the_post();?>
						<?php the_content(); ?>
						<?php endwhile; endif; ?>

					</div>

					<div class="test_div">

					</div>
				</div><!-- End column-8 -->



			</div><!-- End row -->

		</div><!-- #content -->
	</div><!-- #primary -->
	</div>
<?php get_footer();?>
