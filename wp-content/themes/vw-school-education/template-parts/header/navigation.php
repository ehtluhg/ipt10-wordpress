<?php
  $vw_school_education_search_hide_show = get_theme_mod( 'vw_school_education_search_hide_show' );
  if ( 'Disable' == $vw_school_education_search_hide_show ) {
   $colmd = 'col-lg-9 col-md-9';
  } else { 
   $colmd = 'col-lg-8 col-md-4';
  } 
?>
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_school_education_sticky_header', false) != '' || get_theme_mod( 'vw_school_education_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row bg-home">
        <div class="<?php echo esc_html( $colmd ); ?> align-self-center">
          <?php if(has_nav_menu('primary')){ ?>
            <div class="toggle-nav mobile-menu">
              <button onclick="vw_school_education_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_school_education_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-school-education'); ?></span></button>
            </div>
          <?php } ?>
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-school-education' ); ?>">
              <?php 
                if(has_nav_menu('primary')){
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                }
              ?>
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_school_education_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_school_education_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-school-education'); ?></span></a>
            </nav>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-10 align-self-center">
          <div class="socialbox">
            <?php dynamic_sidebar('social-icon') ?>
          </div>
        </div>
        <?php if ( 'Disable' != $vw_school_education_search_hide_show ) {?>
          <div class="search-box col-lg-1 col-md-2 col-2 align-self-center">
            <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_school_education_search_icon','fas fa-search')); ?>"></i></a></span>
          </div>
        <?php } ?>
      </div>
      <div class="serach_outer">
        <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_school_education_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>