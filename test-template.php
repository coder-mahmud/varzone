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

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

        <div>
                <?php  
                      if( $divisions = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
                            echo '<select name="division_id" id="">';
                            echo '<option value="select One">Select One</option>';
                        foreach( $divisions as $division ) :

                               echo  '<option value="'. $division->term_id . '">'.$division->name.'</option>';

                        endforeach;
                            //echo '</ul>';
                            echo '</select>';
                    endif;
                ?>
            </div>

            <div>
                <?php  
                      if( $confs = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
                            echo '<select name="conference_id">';
                            echo '<option value="select One">Select One</option>';
                        foreach( $confs as $conf ) :
                             echo  '<option value="'. $conf->term_id . '">'.$conf->name.'</option>';

                        endforeach;
                            echo '</select>';
                    endif;

                ?>
            </div>
        <button class="btn btn-primary">Filter</button>
        <input type="hidden" name="action" value="myfilter">
        </form>	
		
        


        


		<div id="response">Result will be showed here...</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer();
