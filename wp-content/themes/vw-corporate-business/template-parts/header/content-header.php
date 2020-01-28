<?php if( get_theme_mod('vw_corporate_business_topbar_hide_show',true) != ''){ ?>
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <?php if ( get_theme_mod('vw_corporate_business_location','') != "" ) {?>
           <span> <i class="fas fa-map-marker-alt"></i><?php echo esc_html( get_theme_mod('vw_corporate_business_location','') ); ?></span>
          <?php }?>
          <?php if ( get_theme_mod('vw_corporate_business_call','') != "" ) {?>
            <span><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('vw_corporate_business_call','') ); ?></span>
          <?php }?>
          <?php if ( get_theme_mod('vw_corporate_business_email','') != "" ) {?>
            <span><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('vw_corporate_business_email','') ); ?></span>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php dynamic_sidebar('social-icon'); ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>