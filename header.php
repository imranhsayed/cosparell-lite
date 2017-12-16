<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cosparell
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cosparell' ); ?></a>
		<div class="header-icons clear">
			<ul>
				<li><a href="<?php echo esc_url(cosparell_social_links('Facebook'));  ?>"><span class="facebook-link"></span></a></li>
				<li><a href="<?php echo esc_url(cosparell_social_links('Twitter'));  ?>"><span class="twitter-link"></span></a></li>
				<li><a href="<?php echo esc_url(cosparell_social_links('Google+'));  ?>"><span class="googleplus-link"></span></a></li>
				<li><a href="<?php echo esc_url(cosparell_social_links('Youtube'));  ?>"><span class="youtube-link"></span></a></li>
				<li>
					<?php get_search_form();  ?> <!-- picks up the searchform.php file -->
				</li>
				<li><span class="search-icon"></span></li>
			</ul>	
			
		</div>
	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
		<!-- LOGO -->
		<?php
					
					$cosparell_logo_settings = cosparell_get_option( 'cosparell_logo_settings' );
					
					if( $cosparell_logo_settings ){ ?>
					<?php  
					$siteUrl = esc_url(site_url());
					?>
				    <a href="<?php echo esc_url($siteUrl); ?>" title="<?php esc_attr(bloginfo('name')); ?>">
				       <img src="<?php echo esc_url($cosparell_logo_settings); ?>" />
				   	</a>
					
				   <?php  } else { ?>
		
		<!-- SITE TITLE & DESCRIPTION -->
				   <div class="site-title-description">
				   	<?php  
				   	$homeUrl = esc_url(home_url('/'));
				   	?>
					   <h1 class="site-title"><a href="<?php echo esc_url($homeUrl); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					   <h2 class="site-description"><?php __(bloginfo( 'description' ), 'cosparell'); ?></h2>
				   </div><!-- site-title-description -->
					
				   <?php } ?>
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="screen-reader-text">Main Navigation</h1>
			<div class="navicon closed"><i class="fa fa-navicon"></i></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 2 ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	
	<div id="content" class="site-content">
