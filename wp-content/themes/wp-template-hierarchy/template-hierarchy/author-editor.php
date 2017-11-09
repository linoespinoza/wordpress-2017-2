<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">


	    	<div class="col-md-8">

				<?php
					$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
				?>

		    	<h1><?php echo $curauth->display_name; ?></h1>
		    	<p><?php echo $curauth->user_description; ?></p>			    	

	    	</div>

	    	<?php get_sidebar(); ?>

	    </div>

    </div>

<?php get_footer(); ?>