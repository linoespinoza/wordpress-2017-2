<?php get_header(); ?>

HOME PAGE
<!-- Inicia el LOOP -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="page-header">	
    	<h1><?php the_title(); ?></h1>
    </div>

	<?php the_content(); ?>

<?php endwhile; endif; ?>
<!-- Finaliza el LOOP -->

<?php get_footer(); ?>