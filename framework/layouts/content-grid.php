<?php
/**
 * @package Tromax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid'); ?>>
    <a href="<?php the_permalink();?>">
            <div class="featured-thumb col-md-4 col-sm-4">
                <?php the_post_thumbnail('tromax-pop-thumb'); ?>
            </div><!--.featured-thumb-->

            <div class="out-thumb col-md-8 col-sm-8">
                <header class="entry-header">
                    <h1 class="entry-title title-font"><a class="hvr-underline-reveal" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    <div class="postedon"><?php tromax_posted_on(); ?></div>
                    <span class="entry-excerpt"><?php the_excerpt(); ?></span>
                    <span class="readmore"><a class="hvr-underline-from-center" href="<?php the_permalink() ?>"><?php _e('Read More','tromax'); ?></a></span>
                </header><!-- .entry-header -->
            </div><!--.out-thumb-->

    </a>
		
</article><!-- #post-## -->