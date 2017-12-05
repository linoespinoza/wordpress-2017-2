<?php get_header(); ?>

<div class="mx-auto container">
	<p>author.php</p>
	<div class="row">
		<div class="col">
			<p>Nombre del Autor:</p>
			<h2><?php echo get_the_author_meta('display_name'); ?></h2>
			
			<?php if (!empty(get_the_author_meta('description'))) { ?>
				<p>Descripción: <?php echo get_the_author_meta('description'); ?></p>
			<?php } else { ?>
				<p>No se encuentra una descripción para este usuario.</p>
			<?php } ?>
			<?php echo get_avatar(get_the_author_meta('ID')); ?>
		</div>

		<div class="col">
		</div>
	</div>
</div>

<?php get_footer(); ?>