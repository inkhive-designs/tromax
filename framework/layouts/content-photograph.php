<?php
/**
 * @package Tromax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 grid grid_2_column photograph'); ?>>

    <div class="featured-thumb col-md-12 col-sm-4">
        <?php the_post_thumbnail('tromax-sq-thumb'); ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-12 col-sm-4">
        <header class="entry-header">
            <h1 class="entry-title title-font"><a class="hvr-underline-reveal" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <span class="entry-excerpt">
                <?php echo substr(get_the_excerpt(),0,100).(get_the_excerpt()?"...":""); ?></span>
            <span class="readmore"><a href="<?php the_permalink() ?>"><?php _e('Read More','tromax'); ?></a></span>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->

</article><!-- #post-## -->