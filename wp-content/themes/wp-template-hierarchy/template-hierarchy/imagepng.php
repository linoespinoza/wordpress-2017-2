<html>
<head>

	<title>PNG Template</title>
	<?php wp_head(); ?>
	<style type="text/css">
		body {
			/*background: yellow;*/
		}
		div {
			width: 1024px;		
			margin: 20px auto;
		}
		h1 {
			text-align: center;
		}
		a, a:hover {
			text-decoration: none;
			padding: 5px;
		}
	</style>

</head>
<body>		
	<p><a href="javascript:history.back()">&#8592; Back</a></p>
	<div>
	<h1>PNG Template</h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<p>MIME Type: <?php echo get_post_mime_type(); ?></p>
		<p>File Name: png.php</p>
		<p><?php echo wp_get_attachment_image( $post->id, 'large' ); ?></p>
	
	<?php endwhile; endif; ?>
	</div>

</body>
</html>

