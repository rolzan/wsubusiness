<?php
/**
 * The sidebar containing the CTA Bottom widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WebsiteSetup_Business
 */

if ( ! is_active_sidebar( 'cta-bot-1' ) ) {
	return;
}
?>

<aside class="cta-bot-widget-area">
	<div class="container">
		<?php dynamic_sidebar( 'cta-bot-1' ); ?>
	</div>
</aside><!-- .cta-bot-widget-area -->
