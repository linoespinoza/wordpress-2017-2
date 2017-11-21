<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-8">

			    <div class="page-header">	
			    	<h1><?php wp_title( '' ); ?></h1>
			    </div>

				<ul>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>					
					<?php if( is_year() ): ?>
						<h3><?php the_date( 'F' ); ?></h3>			    		
			    	<?php endif; ?>			    	
			    	<li><?php the_time( 'jS' ); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
				</ul>			

	    	</div>

	    	<?php get_sidebar( 'blog' ); ?>

	    </div>

    </div>

<?php get_footer(); ?>