<?php 

/*
	Template Name: Full Width
*/

?>

<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-12">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				    <div class="page-header">	
				    	<h1><?php the_title(); ?></h1>
				    </div>


					<?php the_content(); ?>

				<?php endwhile; endif; ?>

	    	</div>
	    	

	    </div>

    </div>

<?php get_footer(); ?>