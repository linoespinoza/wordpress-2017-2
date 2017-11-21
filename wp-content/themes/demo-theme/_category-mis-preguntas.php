<?php get_header(); ?>

category-mis-preguntas.php
<!-- Inicia el LOOP -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php wp_title( '' ); ?></h1>
	<p>This is a category archive</p>
	
    <div class="page-header">	
    	<h3><?php the_title(); ?></h3>
    </div>

	<?php the_content(); ?>

<?php endwhile; endif; ?>
<!-- Finaliza el LOOP -->

<?php get_footer(); ?>