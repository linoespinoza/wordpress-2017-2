<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php echo get_bloginfo('name'); ?></title> 

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <div class="collapse navbar-collapse">
        <?php 
          $args = array(
          	'menu'        => 'header-menu',            
            'menu_class'  => 'nav navbar-nav',
            'container'   => false
          );
          wp_nav_menu( $args );
        ?>  
        </div>
      </div>      
    </div>
