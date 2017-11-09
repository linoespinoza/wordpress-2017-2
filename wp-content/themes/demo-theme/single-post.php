<?php get_header(); ?>

single-post.php
<!-- Inicia el LOOP -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="page-header">	
    	<h1><?php the_title(); ?></h1>
    </div>
    <h2>Extracto</h2>
	<?php the_excerpt(); ?> <br />

	<h3>Contenido de la entrada: <?php echo the_title(); ?></h3>
	<?php the_content(); ?>

	<?php comments_template(); ?>

<?php endwhile; endif; ?>
<!-- Finaliza el LOOP -->

<?php get_footer(); ?>