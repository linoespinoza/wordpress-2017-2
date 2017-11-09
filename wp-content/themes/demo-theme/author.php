<?php get_header(); ?>

author.php

<?php 

$currentAuthor = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

?>

<div class="page-header">	
	<?php echo get_avatar( $currentAuthor->ID ); ?>
	<h1><?php echo $currentAuthor->display_name; ?></h1>
	<p><?php echo $currentAuthor->user_description; ?></p>			    	
</div>	

<h2>Posts Recientes</h2>
<!-- Inicia el LOOP -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <div class="page-header">	
    	<h1><?php the_title(); ?></h1>
    </div>

	<?php the_content(); ?>

<?php endwhile; endif; ?>
<!-- Finaliza el LOOP -->

<?php get_footer(); ?>