<?php
/**
 * Template part for header builder.
 *
 * @license For the full license information, please view the Licensing folder
 * that was distributed with this source code.
 *
 * @package Bimber_Theme 5.4
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}
if ( is_customize_preview() ) {
	$elements = bimber_hb_get_elements();
	?>

	<div id="g1-hb-preview-elements">
		<?php foreach ( $elements as $index => $element ) {?>
			<div class="g1-hb-preview-element-<?php echo esc_attr( $index ); ?>">
				<?php get_template_part( 'template-parts/header-builder/elements/' . $index );?>
			</div>
		<?php } ?>
	</div>
	<?php
}
$headers = array( 'normal', 'mobile' );
foreach ( $headers as $header ) :
	$layouts = bimber_get_theme_option( 'header_builder', '' );
	$layouts = apply_filters( 'bimber_header_builder_layouts', $layouts );
	$layout = $layouts[ $header ];
	if ( ! is_array( $layout ) ) {
		$layout = array();
	}
	$sticky_started = false;
	$sticky_closed = false;
	?>
	<?php foreach ( $layout as $row_index => $row ) :
		if ( 'on' === $row['sticky'] && ! $sticky_started ) {
			$sticky_started = true;
			?>
			<div class="g1-sticky-top-wrapper <?php echo sanitize_html_class( 'g1-hb-row-' . $row_index );?>">
		<?php }
		if ( 'off' === $row['sticky'] && $sticky_started && ! $sticky_closed ) {
			$sticky_closed = true;
			?>
			</div>
		<?php }
		$row_letter = $row['letter'];
		$row_class = array(
			'g1-hb-row',
			'g1-hb-row-' . $header,
			'g1-hb-row-' . $row_letter,
			'g1-hb-row-' . $row_index,
			'g1-hb-' . $row['style'],
		);
		$row_class[] = 'on' === $row['sticky'] ? 'g1-hb-sticky-on' : 'g1-hb-sticky-off';
		$row_class[] = 'on' === $row['shadow'] ? 'g1-hb-shadow-on' : 'g1-hb-shadow-off';
		?>
		<div class="g1-row g1-row-layout-page <?php echo implode( ' ', array_map( 'sanitize_html_class', $row_class ) ); ?>">
			<div class="g1-row-inner">
				<div class="g1-column g1-dropable gg">
					<?php foreach ( $row['cols'] as $col_index => $col ) :
						$col_class = array(
							'g1-bin-' . $col_index,
						);
						$align_clas = array(
							'g1-bin',
							'g1-bin-align-' . $col['align'],
						);
						$col_class[] = 'on' === $col['grow'] ? 'g1-bin-grow-on' : 'g1-bin-grow-off';
						?>
						<div class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $col_class ) ); ?>">
							<div class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $align_clas ) ); ?>">
								<?php foreach ( $col['elements'] as $element ) :?>
									<?php get_template_part( 'template-parts/header-builder/elements/' . $element , $header );?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>


<div class="header_category_links">


<ul class="cat_list">

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/baseball/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/3. baseball.png" alt=""></span>
		<span class="category_name">Baseball</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/basketball/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/basketball.png" alt=""></span>
		<span class="category_name">Basketball</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/football/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/11. football.png" alt=""></span>
		<span class="category_name">Football</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/golf/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/7. golf.png" alt=""></span>
		<span class="category_name">Golf</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/hockey/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/12. hockey.png" alt=""></span>
		<span class="category_name">Hockey</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/lacrosse/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/10. lacrosse.png" alt=""></span>
		<span class="category_name">Lacrosse</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/soccer/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/5. soccer.png" alt=""></span>
		<span class="category_name">Soccer</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/swimming/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/9. swimming.png" alt=""></span>
		<span class="category_name">Swimming</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/tennis/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/6. tennis.png" alt=""></span>
		<span class="category_name">Tennis</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/track-field/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/2. track & field.png" alt=""></span>
		<span class="category_name">Track & Field</span>
		</a>
	</li>

	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/volleyball/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/8. volleyball.png" alt=""></span>
		<span class="category_name">Volleyball</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/category/wrestling/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/13. wrestling.png" alt=""></span>
		<span class="category_name">Wrestling</span>
		</a>
	</li>
	<li class="single_category">
		<a href="<?php bloginfo('home'); ?>/categories/">
		<span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/14. more.png" alt=""></span>
		<span class="category_name">More</span>
		</a>
	</li>

</ul>


</div>



				</div>
			</div>
			<div class="g1-row-background"></div>
		</div>
	<?php endforeach;
	if ( $sticky_started && ! $sticky_closed ) {
		$sticky_closed = true;
		?>
		</div>
	<?php }
endforeach;?>