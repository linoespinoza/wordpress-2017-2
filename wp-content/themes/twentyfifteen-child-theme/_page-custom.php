<?php
/**
 * Template Name: Custom Template
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php
						// The Query
						$args = array(
							//'author' => '2',
							// 'tag' => '',
							'category_name' => 'frontend',
							'post_type' => 'post',
							'order' => 'ASC',
							'orderby' => 'title',
							'posts_per_page' => 3
						);
						$the_query = new WP_Query( $args );

						// The Loop
						if ( $the_query->have_posts() ) {
							echo '<ul>';
							while ( $the_query->have_posts() ) {								
								$the_query->the_post();
								echo '<li>' . get_the_title() . '</li>';
							}
							echo '</ul>';
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					?>

				</div>
			</article>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
