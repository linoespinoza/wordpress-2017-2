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

	    	</div>

	    	<div class="col-md-4">
	    		<div class="widget">
	    		<h3>Contact Info</h3>
	    		<p>Phone: 555-555-5555</p>
	    		<p>Address: N Burnet, Austin, TX 78758</p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27559.020228121262!2d-97.7370279!3d30.297548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1398534727784" width="300" height="200" frameborder="0" style="border:0"></iframe>
				</div>
	    	</div>

	    </div>

    </div>

<?php get_footer(); ?>