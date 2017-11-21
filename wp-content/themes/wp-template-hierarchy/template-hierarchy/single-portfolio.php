<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-8">

				<div class="page-header">		    		

					<h1><a href="<?php bloginfo( 'url' ); ?>/portfolio">Portfolio</a></h1>
				</div>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    
			   		<h2><?php the_title(); ?></h2>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

	    	</div>

	    	<?php get_sidebar(); ?>

	    </div>

    </div>

<?php get_footer(); ?>