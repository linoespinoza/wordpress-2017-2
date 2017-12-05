<?php get_header('single'); ?>
<h1>single.php</h1>
<div class="mx-auto container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="">
	    <div class="page-header">	
	    	<h1><?php the_title(); ?></h1>
	    </div>

		<?php the_content(); ?>
		<p><?php //echo get_the_author_link(); ?> </p>
	</div>

<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>