<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tromax
 */
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tromax' ); ?></a>
    <?php
        get_template_part('modules/header/jumbo', 'search');
        get_template_part('modules/header/top', 'bar');
        get_template_part('modules/header/masthead', 'none');
    ?>

	<div id="slickmenu"></div>
    <?php get_template_part('modules/navigation/main', 'menu'); ?>
		
	<?php get_template_part('/framework/featured-components/featured', 'showcase'); ?>
	
	<?php get_template_part('/framework/featured-components/featured', 'news'); ?>
	
	<div class="mega-container">
		
	
		<div id="content" class="site-content container">