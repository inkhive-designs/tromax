<?php if ( get_theme_mod('tromax_featured_mr_enable') && is_front_page() ) : ?>
    <div id="featured-mr" class="container">

        <div class="featured-mr-sec col-md-12">
            <?php if (get_theme_mod('tromax_featured_mr_title')) : ?>
                <div class="section-title title-font">
                    <?php echo esc_html( get_theme_mod('tromax_featured_mr_title' ) ) ?>
                </div>
            <?php endif; ?>
        </div>
            <div class="featured-mr-container col-md-12">

                    <?php
                    $count = 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'cat'  => esc_html( get_theme_mod('tromax_featured_mr_cat',0) ),
                        'ignore_sticky_posts' => 1,
                    );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) :
                        $loop->the_post();
                        ?>
                        <div class="featured-mr col-md-6 col-sm-12">
                            <div class="feature-mr-item col-md-6 col-sm-6 col-xs-12">
                                <div class="fg-item">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                                        <?php the_post_thumbnail('tromax-sq-thumb'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="featured-mr-title col-md-6 col-sm-6 col-xs-12">
                                <div class="product-details">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="cat">
                                        <?php the_category(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $count++;
                    endwhile; ?>
                    <?php wp_reset_postdata(); ?>

            </div>
    </div>
<?php endif; ?>