<?php
/*
Template Name: Archives
*/
get_header(); ?>

<h1>archive.php</h1>
<div class="mx-auto container">

	<?php the_post(); ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>

	<?php // Devuelve el formulario de búsqueda por default de wordpress ?>
	<?php get_search_form(); ?>

	<h2>Archives by Month:</h2>
	<ul>
		<?php 
		// Obtiene los links de los post ordenados por meses
		wp_get_archives('type=monthly'); 
		?>
	</ul>

	<h2>Archives by Subject:</h2>
	<ul>
		 <?php 
		 // Obtiene las categorias creadas en wordpress
		 wp_list_categories(); 
		 ?>
	</ul>

</div>
<?php get_footer(); ?>