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
<div id="page" class="site">
	<!-- Mobile menu -->
	<ul id="slide-out" class="sidenav sidenav-fixed">
		<li class="logo">
			<a id="logo-container" href="/" class="brand-logo">
				<img src="<?php echo Theme::get_url('assets/img/logo.png'); ?>" alt="Logo">
			</a>
		</li>
		<?php
			if(($locations = get_nav_menu_locations()) && isset($locations['primary'])) {
				$menu = get_term( $locations['primary'], 'nav_menu' );
				$menu_items = wp_get_nav_menu_items($menu->term_id);
	
				foreach($menu_items as $item) {
					if($item->menu_item_parent == 0) {
						printf('<li class="bold"><a href="%s">%s</a></li>', get_permalink($item), $item->title);
					} else {

					}
					// Check for submenus
				}
			}
		?>
	</ul>

	<header class="site-header">
		<nav>
			<div class="nav-wrapper">
				<a id="logo-container" href="/" class="brand-logo">
					<img src="<?php echo Theme::get_url('assets/img/logo.png'); ?>" alt="Logo">
				</a>
				<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</header>
	<!-- #Modile menu -->

	<div id="content" class="site-content">
