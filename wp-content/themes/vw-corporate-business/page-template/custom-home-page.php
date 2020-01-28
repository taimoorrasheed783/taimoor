<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_corporate_business_before_slider' ); ?>

  <?php if( get_theme_mod('vw_corporate_business_slider_hide_show',true) != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_corporate_business_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_page[] = $mod;
            }
          }
          if( !empty($slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><?php the_title(); ?></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_corporate_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_corporate_business_slider_excerpt_number','30')))); ?></p>
                  <div class="more-btn">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('GET STARTED','vw-corporate-business'); ?><span class="screen-reader-text"><?php esc_html_e( 'GET STARTED','vw-corporate-business' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Previous','vw-corporate-business' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Next','vw-corporate-business' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'vw_corporate_business_after_slider' ); ?>

  <?php if( get_theme_mod('vw_corporate_business_about_post') != ''){ ?>
    <section class="about">
      <div class="container">
        <div class="row">
          <?php
           $postData1=  get_theme_mod('vw_corporate_business_about_post');
            if($postData1){
            $args = array( 'name' => esc_html($postData1 ,'vw-corporate-business'));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-7 col-md-7">
                  <h2><?php the_title(); ?></h2>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_corporate_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_corporate_business_about_excerpt_number','30')))); ?></p>
                  <div class ="about-btn">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('vw_corporate_business_about_button_text',__('READ MORE','vw-corporate-business'))); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','vw-corporate-business' );?></span></a>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5">
                  <div class="abt-image">
                    <?php the_post_thumbnail(); ?>
                  </div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; }?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_corporate_business_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>