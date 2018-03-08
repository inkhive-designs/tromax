<?php
/*
 * @package tromax, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin-modules/admin_styles.php';
require get_template_directory() . '/framework/admin-modules/register_styles.php';
require get_template_directory() . '/framework/admin-modules/theme_setup.php';
require get_template_directory() . '/framework/admin-modules/register_widgets.php';
require get_template_directory() . '/framework/admin-modules/logo_compatibility.php';
require get_template_directory() . '/framework/admin-modules/nav_walkers.php';

/*
 * Pagination Function. Implements core paginate_links function.
 */
function tromax_pagination() {
    the_posts_pagination( array( 'mid_size' => 2 ) );
}

/*
** Function to Automatically Display the Thumbnails, and placeholder if no thumbnail available.
*/
add_filter( 'post_thumbnail_html', 'tromax_new_thumb_sizes', 10, 4 );
function tromax_new_thumb_sizes( $html, $id, $thumb_id, $size ) {
        // Check to see if we are on a singular view.
        if ( ! is_singular() ) :
                // let's check to see if the post has a featured image.
                if ( ! get_post_thumbnail_id( $id ) ) {
                        // if we don't have one, create a fallback for just the tromax-pop-thumb thumbnails.
                        if ( 'tromax-pop-thumb' == $size || 'tromax-thumb' == $size ) {
                                return  '<img src="' . get_template_directory_uri() . '/assets/images/placeholder2.jpg" />';
                        }
                        if ( 'tromax-sq-thumb' == $size ) {
                                return  '<img src="' . get_template_directory_uri() . '/assets/images/placeholder-sq.jpg" />';
                        }
                        // simple message if there is no thumbnail at all.                        
                        return '<h2>'.__('I do not have an image','tromax').'</h2>';
                }
        endif;
        // return our set featured image.
        return wp_get_attachment_image( $thumb_id, $size );
}


/*
** Function to Trim the length of Excerpt and More
*/
function tromax_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'tromax_excerpt_length', 999 );

function tromax_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'tromax_excerpt_more' );


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function tromax_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('tromax_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('tromax_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('tromax_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function tromax_primary_class() {
	$sw = esc_html( get_theme_mod('tromax_sidebar_width',4) );
	$class = "col-md-".(12-$sw);
	
	if ( !tromax_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_filter('tromax_primary-width', 'tromax_primary_class');

function tromax_secondary_class() {
	$sw = esc_html( get_theme_mod('tromax_sidebar_width',4) );
	$class = "col-md-".$sw;
	
	echo $class;
}
add_filter('tromax_secondary-width', 'tromax_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function tromax_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function tromax_fade($color, $val) {
	return "rgba(".tromax_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function tromax_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('tromax_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('tromax_blog_layout') );
	else :
		get_template_part( $ldir ,'tromax');	
	endif;	
}
add_action('tromax_blog_layout', 'tromax_get_blog_layout');

/*
** Function to Set Main Class 
*/
function tromax_get_main_class(){
	
	$layout = get_theme_mod('tromax_blog_layout');
	if (strpos($layout,'tromax') !== false) {
	    	echo 'tromax-main';
	}		
}
add_filter('tromax_main-class', 'tromax_get_main_class');

/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
	require get_template_directory() . '/framework/woocommerce.php';
endif;


/*
** Load Custom Widgets
*/



