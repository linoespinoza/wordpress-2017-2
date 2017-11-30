<?php get_header('single'); ?>
<h1>attachment.php</h1>
<div class="mx-auto container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="">
	    <div class="page-header">	
	    	<h1><?php the_title(); ?></h1>
	    </div>

	    <?php //echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

	   	<?php echo get_post_mime_type(get_the_ID()); ?>
	    <?php echo wp_get_attachment_link( get_the_ID() ); ?>

	    <?php the_excerpt(); ?>
		<?php the_content(); ?>
	</div>

<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>