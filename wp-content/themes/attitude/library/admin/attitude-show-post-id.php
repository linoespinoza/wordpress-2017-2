<?php
/**
 * Attitude Show Post Type 'Post' IDs
 *
 * This file shows the Post Type 'Post' IDs in the all post table.
 * This file shows the post id and hence helps the users to see the respective post ids so that they can use in the slider options easily.
 *
 * @package 		Theme Horse
 * @subpackage 	Attitude
 * @since 			Attitude 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/attitude
 */

/****************************************************************************************/

add_action( 'admin_init', 'attitude_show_post_respective_id' );
/**
 * Hooking attitude_show_post_respective_id function to admin_init action hook.
 * The purpose is to show the respective post id in all posts table.
 */
function attitude_show_post_respective_id() {
	/**
	 * CSS for the added column.
	 */
	add_action( 'admin_head', 'attitude_post_table_column_css' );

	/**
	 * For the All Posts table
	 */
	add_filter( 'manage_posts_columns', 'attitude_column' );
	add_action( 'manage_posts_custom_column', 'attitude_value', 10, 2 );

	/**
	 * For the All Pages table
	 */
	add_filter('manage_pages_columns', 'attitude_column');
	add_action('manage_pages_custom_column', 'attitude_value', 10, 2);
}

/**
 * Add a new column for all posts table.
 * The column is named ID.
 */
function attitude_column( $cols ) {
	$cols[ 'attitude-column-id' ] = 'ID';
	return $cols;
}

/**
 * This function shows the ID of the respective post.
 */
function attitude_value( $column_name, $id ) {
	if ( 'attitude-column-id' == $column_name )
		echo $id;
}

/**
 * CSS for the newly added column in all posts table.
 * The width of new column is set to 40px.
 */
function attitude_post_table_column_css() {
?>
	<style type="text/css">
		#attitude-column-id { 
			width: 40px; 
		}
	</style>
<?php	
}
?>