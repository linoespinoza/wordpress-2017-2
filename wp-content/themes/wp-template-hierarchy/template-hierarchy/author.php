<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">


	    	<div class="col-md-8">


				<?php
					$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
				?>

			    <div class="page-header">	
			    	<?php echo get_avatar( $curauth->ID ); ?>
			    	<h1><?php echo $curauth->display_name; ?></h1>
			    	<p><?php echo $curauth->user_description; ?></p>			    	
			    </div>			    			    

	    		<h2>Recent Posts</h2>
	
				<ul>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>					
					<?php if( is_year() ): ?>
						<h3><?php the_date( 'F' ); ?></h3>			    		
			    	<?php endif; ?>			    	
			    	<li><?php the_time( 'jS' ); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				</ul>	

				<?php else: ?>

					<p>No posts :(</p>

				<?php endif; ?>

	    	</div>

	    	<?php get_sidebar(); ?>

	    </div>

    </div>

<?php get_footer(); ?>