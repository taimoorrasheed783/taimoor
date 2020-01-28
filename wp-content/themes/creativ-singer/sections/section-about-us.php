<?php 
/**
 * Template part for displaying About Us Section
 *
 *@package Creativ Singer
 */

    $ss_content_type     = creativ_singer_get_option( 'ss_content_type' );
    $number_of_ss_items  = creativ_singer_get_option( 'number_of_ss_items' );

    if( $ss_content_type == 'ss_page' ) :
        for( $i=1; $i<=$number_of_ss_items; $i++ ) :
            $featured_about_us_posts[] = creativ_singer_get_option( 'about_us_page_'.$i );
        endfor;  
    elseif( $ss_content_type == 'ss_post' ) :
        for( $i=1; $i<=$number_of_ss_items; $i++ ) :
            $featured_about_us_posts[] = creativ_singer_get_option( 'about_us_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if( $ss_content_type == 'ss_page' ) : ?>
        <div class="section-content">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $featured_about_us_posts ),
                'post__in'      => $featured_about_us_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="section-header">
                            <h2 class="section-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_singer_the_excerpt( 70 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->

                        <div class="read-more">
                            <?php $readmore_text = creativ_singer_get_option( 'readmore_text' );?>
                            <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                        </div><!-- .read-more -->
                    </div><!-- .entry-container -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>

    <?php else: ?>
        <div class="section-content">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $featured_about_us_posts ),
                'post__in'      => $featured_about_us_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="section-header">
                            <h2 class="section-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_singer_the_excerpt( 70 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->

                        <div class="read-more">
                            <?php $readmore_text = creativ_singer_get_option( 'readmore_text' );?>
                            <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                        </div><!-- .read-more -->
                    </div><!-- .entry-container -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    <?php endif;

    