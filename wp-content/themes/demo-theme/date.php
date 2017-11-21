<?php get_header(); ?>

date.php
<!-- Inicia el LOOP -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if(is_year()): ?>
		<h1><?php the_date('F'); ?></h1>
		<hr>
	<?php endif; ?>

    <div class="page-header">	
    	<h3><?php the_time( 'F j, Y' ); ?> - <?php the_title(); ?></h3>
    </div>

	<?php the_content(); ?>

<?php endwhile; endif; ?>
<!-- Finaliza el LOOP -->

<?php get_footer(); ?>