<?php get_header(); ?>
<div class="mx-auto container">
<h1>front-page.php </h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="">
	    <div class="page-header">	
	    	<h1><?php the_title(); ?></h1>
	    </div>

		<?php the_content(); ?>

		<a href="<?php the_permalink(); ?>about">Ver página About</a>
	</div>

<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>