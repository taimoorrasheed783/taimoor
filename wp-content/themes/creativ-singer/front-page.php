<?php
/**
 * The template for displaying home page.
 * @package Creativ Singer
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = creativ_singer_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = creativ_singer_get_option( 'disable_featured_slider' );
                if( false ==$disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'latest-albums' ) { ?>
                <?php $disable_latest_albums_section = creativ_singer_get_option( 'disable_latest_albums_section' );
                if(false ==$disable_latest_albums_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">         
                        <div class="wrapper">               
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $disable_cta_section = creativ_singer_get_option( 'disable_cta_section' );
                $background_cta_section = creativ_singer_get_option( 'background_cta_section' );
                if( false ==$disable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">                        
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'playlist' ) { ?>
                <?php $disable_playlist_section = creativ_singer_get_option( 'disable_playlist_section' );
                $background_playlist_section = creativ_singer_get_option( 'background_playlist_section' );
                if( false ==$disable_playlist_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_playlist_section );?>');">                        
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about-us' ) { ?>
                <?php $disable_about_us_section = creativ_singer_get_option( 'disable_about_us_section' );
                if( false ==$disable_about_us_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif;

            }
            elseif( ( $section['id'] == 'blog' ) ){ ?>
                <?php $disable_blog_section = creativ_singer_get_option( 'disable_blog_section' );
                if(false ==$disable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif;
            }
        }
    }
    if( false == creativ_singer_get_option('enable_frontpage_content') ) { ?>
        <div class="wrapper page-section">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 