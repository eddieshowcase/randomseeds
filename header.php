<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

<!--	--><?php //if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
<!--	<div class="off-canvas-wrapper">-->
<!--		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>-->
<!--		--><?php //get_template_part( 'template-parts/mobile-off-canvas' ); ?>
<!--	--><?php //endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<!-- Cover Image-->
		<div id="cover-wrap">

			<!-- Title-->
			<div id="site-branding-wrap"  class="page-wide flex-row flex-vertical-center">
				<div id="site-branding"  class="flex-column-shrink">
					<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<div class="site-desc"><?php bloginfo( 'description' ); ?></div>
				</div>
			</div>

		</div>

		<div id="nav-wrap">

			<!-- Mobile-->
			<div class="title-bar align-center" data-responsive-toggle="site-navigation">
				<button class="menu-icon" type="button" data-toggle="site-navigation"></button>
				<div class="title-bar-title">
					<a href="#" data-toggle="site-navigation">MENU</a>
				</div>
			</div>

			<!-- Desktop -->
			<nav id="site-navigation" class="main-navigation top-bar page-wide" role="navigation">
				<div class="top-bar-left">

					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
				<div class="top-bar-right">
					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>

		</div>





<!--		--><?php //wp_nav_menu(array(
//			'container' => false,
//			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
//			'depth' => 3,
//			'fallback_cb' => false,
//			'walker' => new Foundationpress_Top_Bar_Walker(),
//			)); ?>






	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
