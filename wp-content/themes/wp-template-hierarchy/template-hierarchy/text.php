<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-8">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				    <div class="page-header">	
				    	<h1><?php the_title(); ?></h1>
				    </div>

				    <p>MIME Type: <?php echo get_post_mime_type(); ?></p>

				    <?php $attachment_url = wp_get_attachment_url( $post->id ); ?>				    
					<?php $path = pathinfo( $attachment_url ); ?>

					<p>File: <?php echo $path['basename']; ?></p>				    
					<p><a href="<?php echo $attachment_url; ?>">
						<button class="btn btn-primary">
							<span class="glyphicon glyphicon-arrow-down"></span>
							Download <?php echo $path['basename']; ?>
						</button>
					</a></p>

				<?php endwhile; endif; ?>


			</div>

 			<?php get_sidebar(); ?>

	   	</div>	   
	    
    </div>

<?php get_footer(); ?>