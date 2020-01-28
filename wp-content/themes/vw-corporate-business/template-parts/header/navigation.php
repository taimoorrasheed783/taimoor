<?php
  $vw_corporate_business_search_hide_show = get_theme_mod( 'vw_corporate_business_search_hide_show' );
  if ( 'Disable' == $vw_corporate_business_search_hide_show ) {
   $colmd = 'col-lg-7 col-md-7';
  } else { 
   $colmd = 'col-lg-6 col-md-4 col-3';
  } 
?> 
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_corporate_business_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row bg-home">
        <div class=" col-lg-3 col-md-4">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <p class="site-description">
                <?php echo $description; ?>
              </p>
            <?php endif; ?>
          </div>
        </div>
        <div class="<?php echo esc_html( $colmd ); ?>">
          <div class="toggle-nav mobile-menu">
            <button onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-corporate-business'); ?></span></button>
          </div>
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-corporate-business' ); ?>">
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-corporate-business'); ?></span></a>
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              ?>
            </nav>
          </div>
        </div>
        <?php if ( 'Disable' != $vw_corporate_business_search_hide_show ) {?>
          <div class="search-box col-md-2 col-lg-1 col-3">
            <span><a href="#"><i class="fas fa-search"></i></a></span>
          </div>
        <?php } ?>
        <div class="col-lg-2 col-md-2 col-6 p-0 get-started">
          <?php if ( get_theme_mod('vw_corporate_business_started_text','') != "" ) {?>
            <a href="<?php echo esc_url( get_theme_mod('vw_corporate_business_started_link',__('#','vw-corporate-business')) ); ?>"><?php echo esc_html( get_theme_mod('vw_corporate_business_started_text','') ); ?></a>
          <?php }?>
        </div>
      </div>
      <div class="serach_outer">
        <div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>