<?php 
/**
 * Template part for displaying latest_albums Section
 *
 *@package Creativ Singer
 */
    $cs_content_type                = creativ_singer_get_option( 'cs_content_type' );
    $number_of_cs_column            = creativ_singer_get_option( 'number_of_cs_column' );
    $number_of_cs_items             = creativ_singer_get_option( 'number_of_cs_items' );
    $latest_albums_section_title    = creativ_singer_get_option( 'latest_albums_section_title' );

    if( $cs_content_type == 'cs_page' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $latest_albums_posts[] = creativ_singer_get_option( 'latest_albums_page_'.$i );
        endfor;  
    elseif( $cs_content_type == 'cs_post' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $latest_albums_posts[] = creativ_singer_get_option( 'latest_albums_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if(!empty($latest_albums_section_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($latest_albums_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $cs_content_type == 'cs_page' ) : ?>
        <div class="section-content clear col-<?php echo esc_attr( $number_of_cs_column ); ?>">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $latest_albums_posts ),
                'post__in'      => $latest_albums_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <div class="featured-album-wrapper">
                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-album-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    
    <?php else : ?>
        <div class="section-content clear col-<?php echo esc_attr( $number_of_cs_column ); ?>">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $latest_albums_posts ),
                'post__in'      => $latest_albums_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>     
                
                <article>
                    <div class="featured-album-wrapper">
                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-album-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->
    <?php endif;