<?php 
/*
	Single Post Template: MIME Types
*/
?>
<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-8">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				    <div class="page-header">	
				    	<h1><?php the_title(); ?></h1>
				    </div>

					<?php the_content(); ?>

				    <ul>
				    <?php 
				    	$mime_types = get_allowed_mime_types(); 
				    	foreach ($mime_types as $mime => $type):
				    ?>						
				    	<li>
				    		<strong><?php echo $mime; ?></strong> -
				    		<?php echo $type; ?>
				    	</li>
				    <?php endforeach;
				    ?>
				    </ul>

				<?php endwhile; endif; ?>

	    	</div>

	    	<?php get_sidebar(); ?>

	    </div>

    </div>

<?php get_footer(); ?>