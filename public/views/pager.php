<?php
/**
 * Represents the view of pager for pagination plugin
 *
 * This typically includes any information, if any, that is rendered to the
 * frontend of the theme when the plugin is activated.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 */

$prev = '';
$next = '';

global $post, $numpages, $page, $wp_query;

if (is_singular() && $numpages > 1) {

	if ( $page == $numpages ) {

		$prev_url = get_permalink($post->ID).($page - 1);
		$prev = '<a class="prev_button" href="'.$prev_url.'" rel="prev">prev</a>';

		ob_start();
		next_post_link( '%link', __( 'next', 'twentyfourteen' ) );
		$next = ob_get_clean();

	} elseif ($page == 1) {


		ob_start();
		previous_post_link( '%link', __( 'prev', 'twentyfourteen' ) );
		$prev = ob_get_clean();

		$next_url = get_permalink($post->ID).($page + 1);
		$next = '<a class="next_button" href="'.$next_url.'" rel="next">next</a>';


	} else {

		$prev_url = get_permalink($post->ID).($page - 1);
		$prev = '<a class="prev_button" href="'.$prev_url.'" rel="prev">prev</a>';

		$next_url = get_permalink($post->ID).($page + 1);
		$next = '<a class="next_button" href="'.$next_url.'" rel="next">next</a>';

	}

} else {

	ob_start();
	previous_post_link( '%link', __( 'prev', 'twentyfourteen' ) );
	$prev = ob_get_clean();

	ob_start();
	next_post_link( '%link', __( 'next', 'twentyfourteen' ) );
	$next = ob_get_clean();

}


?>

<div class="pager clearfix">
	<div class="l-left">
		<?php print $prev; ?>
	</div>
	<div class="l-right">
		<?php print $next; ?>
	</div>
</div>
