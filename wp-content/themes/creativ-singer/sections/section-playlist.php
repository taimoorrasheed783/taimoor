<?php 
/**
 * Template part for displaying About Section
 *
 *@package Creativ Singer
 */
?>
    <?php 
        $album_cover_image_section  = creativ_singer_get_option( 'album_cover_image_section' );
        $playlist_section_title      = creativ_singer_get_option( 'playlist_section_title' );
        $playlist_content            = creativ_singer_get_option( 'playlist_content' );
        $playlist_content            = implode(', ', (array)$playlist_content); 
    ?>

    <div class="overlay"></div>
    <div class="wrapper">
        <article>
            <div class="featured-image" style="background-image: url('<?php echo esc_url( $album_cover_image_section );?>');">
            </div><!-- .featured-image -->

            <div class="entry-container">
                <?php if(!empty($playlist_section_title)):?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html($playlist_section_title);?></h2>
                    </div><!-- .section-header -->
                <?php endif;?>

                <div class="playlist-wrapper playlist">
                    <?php 
                        $playlist_shortcode = '[playlist type="audio" ids="' . $playlist_content . '" style="light"]';
                        echo do_shortcode( wp_kses_post( $playlist_shortcode ) );  
                    ?>
                </div><!-- .playlist-wrapper -->
            </div><!-- .entry-container -->
        </article>
    </div><!-- .wrapper -->

