<?php
/**
 * Template for the mode switcher (dark, light)
 *
 * @license For the full license information, please view the Licensing folder
 * that was distributed with this source code.
 *
 * @package Bimber_Theme
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$bimber_class = array(
	'g1-drop',
	'g1-drop-before',
	'g1-drop-the-nsfw',
	'g1-drop-the-nsfw-on',
);
$bimber_class = array_merge(
	$bimber_class,
	explode( ' ', bimber_hb_get_element_class_from_settings( 'nsfw_dropdown', false ) )
);
$bimber_class = array_filter( $bimber_class );
?>
<div class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $bimber_class ) ); ?>">
	<button class="g1-button-none g1-drop-toggle" title="<?php esc_attr_e( 'Toggle NSFW', 'bimber' )?>">
		<span class="g1-drop-toggle-icon"></span><span class="g1-drop-toggle-text"><?php esc_html_e( 'NSFW', 'bimber' ); ?></span>
		<span class="g1-drop-toggle-arrow"></span>
	</button>
	<div class="g1-drop-content">
		<p><?php esc_html_e( 'Disable the (N)ot (S)uitable (F)or (W)ork mode.', 'bimber' ); ?></p>
	</div>
</div>
