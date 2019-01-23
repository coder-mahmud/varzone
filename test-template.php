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
                      if( $brands = get_terms( array( 'taxonomy' => 'school-division' ) ) ) :
                            echo '<ul class="brands-list division-list">';
                        foreach( $brands as $brand ) :
                            echo '<input type="checkbox" class="" id="brand_' . $brand->term_id . '" name="brand_' . $brand->term_id . '" /><label for="brand_' . $brand->term_id . '">' . $brand->name . '</label>';
                            if ($brand !== end($brands)) { echo '<li class="list-spacer">/</li>'; }
                        endforeach;
                            echo '</ul>';
                    endif;
                ?>
            </div>

            <div>
                <?php  
                      if( $sizes = get_terms( array( 'taxonomy' => 'school-conference' ) ) ) :
                            echo '<ul class="sizes-list conference-list">';
                        foreach( $sizes as $size ) :
                            echo '<input type="checkbox" class="" id="size_' . $size->term_id . '" name="size_' . $size->term_id . '" /><label for="size_' . $size->term_id . '">' . $size->name . '</label>';
                            if ($size !== end($sizes)) { echo '<li class="list-spacer">/</li>'; }
                        endforeach;
                            echo '</ul>';
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
