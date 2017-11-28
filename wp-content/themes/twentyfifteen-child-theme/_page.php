<?php // get_header(); ?>
<h1>page.php</h1>
<div class="mx-auto container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="">
	    <div class="page-header">	
	    	<h1><?php the_title(); ?></h1>
	    </div>

		<?php the_content(); ?>
	</div>

<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>