<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-8">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			    <div class="page-header">	
			    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			    	<p class="meta">
			    		By <?php the_author_posts_link(); ?> on <?php echo the_time('l, F jS, Y'); ?> 
					</p>
			    </div>


			    	<?php if( has_post_format( 'image' )): ?>

			    		<p><?php the_post_thumbnail('medium'); ?></p>


			    		<?php the_content(); ?>

			    	<?php elseif ( has_post_format( 'quote' )): ?>

			    		<blockquote>
							<?php the_excerpt(); ?>
			    		</blockquote>			    		

			    		<?php the_content(); ?>

			    	<?php else: ?>

						<?php the_content(); ?>

					<?php endif; ?>
				

				<hr>

				<p>			    		
			    	Post Type: <span class="post-type"><?php echo get_post_format(); ?></span> |
		    		Category: <?php the_category( ', ' );?> |
		    		<?php the_tags('Tags: ', ', ');?>

				</p>				

				<hr>

				<?php endwhile; endif; ?>

				<?php // comments_template(); ?>

	    	</div>

	    	<?php get_sidebar( 'blog' ); ?>

	    </div>

    </div>

<?php get_footer(); ?>