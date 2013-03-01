<?php
/**
 * @package WordPress
 * @subpackage JTTEOTN Theme
 */

$nav = Array("upcoming", "gameplay", "about", "gallery");
?><!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>\
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/iefixes.css"/>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="container_12">
  <div id="header">
 		<a href="/" id="logo"><img src="<?php bloginfo('template_directory');?>/images/journey.png" width="782" height="191" alt="Journey to the End of the Night"></a>
		<div id="share">
			<a href="https://www.facebook.com/pages/Journey-to-the-End-of-the-Night/164293923590751"><img src="<?php bloginfo('template_directory');?>/images/facebook.png"></a>
			<!--<a href="http://twitter.com/home?status=http%3A%2F%2Ftotheendofthenight.com"><img src="<?php bloginfo('template_directory');?>/images/twitter.png"></a>//-->
		</div>
		<div id="nav">
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'fallback_cb' => '' ) ); ?>
						<br class="clear">
					</div>

		    </div>

				<div id="content" class="grid_10 prefix_1">
	<div id="content" role="main">