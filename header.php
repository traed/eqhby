<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eqhby
 */

namespace eqhby;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Oswald" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	
	<header class="site-header">
		<div id="logo-container" class="brand-logo">
			<a href="/"><img src="<?php echo Theme::get_url('assets/img/logo.png'); ?>" alt="Logo"></a>
		</div>

		<nav class="z-depth-0 nav-center">
			<!-- Mobile menu -->
			<?php wp_nav_menu(array(
				'menu' => 'primary',
				'container' => false,
				'menu_class' => 'sidenav',
				'menu_id' => 'mobile-menu'
			)); ?>
			<!-- #Mobile menu -->

			<a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<?php wp_nav_menu(array(
				'menu' => 'primary',
				'container_class' => 'nav-wrapper',
				'menu_class' => 'hide-on-med-and-down'
			)); ?>
		</nav>
	</header>

	<div id="content" class="site-content">
