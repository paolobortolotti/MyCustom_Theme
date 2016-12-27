<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package supertheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
		
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( has_nav_menu( 'Main_Menu' ) ) : ?>


<header>
 <nav class="navbar navbar-default navbar-static-top supertheme" role="navigation">
            <div class="container">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"><?php _e('Toggle navigation'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
    <div class='site-logo'>
        <a class="navbar-brand"  href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img  width= "200px" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
<?php else : ?>
    <hgroup>
        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
    </hgroup>
<?php endif; ?>
                    
     
                </div>

 <?php
            wp_nav_menu( array(
                'menu'              => 'main_menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'navbar-collapse collapse',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

            </div>
        </nav>
    

 </header>
<?php endif; ?>


<div id="page" class="pb-theme">
