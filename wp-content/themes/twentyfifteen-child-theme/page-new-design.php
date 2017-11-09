<?php
/**
 * Template Name: Nuevo Diseño
*/

get_header('new-design'); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<article <?php post_class(); ?>>
			<header class="entry-header">
				
			</header>

			<div class="entry-content">
				<?php echo the_title('<h1>', '</h1>'); ?>

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					echo the_content();
				// End the loop.
				endwhile;
				?>
			</div>		
		</article>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

