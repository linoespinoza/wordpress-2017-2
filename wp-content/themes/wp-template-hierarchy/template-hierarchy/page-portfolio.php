<?php 
/*
	Template Name: Portfolio Page
*/

 ?>
<?php get_header(); ?>

    <div class="container" role="main">

		<div class="row">

	    	<div class="col-md-8">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				    <div class="page-header">	
				    	<h1><?php the_title(); ?></h1>	
				    </div>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

				<?php 
				    $args = array(
				        'post_type' => 'portfolio'
				    );
				    $the_query = new WP_Query( $args );		    
				?>
				<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<?php endwhile; endif; ?>
	    	
	    	</div>

	    	<?php get_sidebar(); ?>

	    </div>    	


	    </div>

    </div>

<?php get_footer(); ?>