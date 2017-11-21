<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">
    		
    		<?php the_field('images'); ?>		      		      
    
		</div>
	  </div>
	
	  <!-- Secondary Column -->
	  <div class="small-12 medium-4 medium-pull-8 columns">
		<div class="secondary">
			
			<h1><?php the_title(); ?></h1>
			<p><?php the_field('description'); ?></p>
		
			<hr>

			<p>
				<?php previous_post_link(); ?> -
				<a href="<?php bloginfo('url'); ?>/portfolio">Back to Portfolio</a> - 
				<?php next_post_link(); ?>
			</p>

		</div>	
	  </div>
	<?php endwhile; endif; ?>
  </div>
</section>





<?php get_footer(); ?>