<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <meta name="HandheldFriendly" content="true">
    

    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri();?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php wp_head();?>
  </head>
  <body>
    <?php var_log($GLOBALS['current_theme_template']);?>
    <div class="page <?php dw_get_page_class($GLOBALS['current_theme_template']);?>">
      <header class="header <?php dw_get_header_class($GLOBALS['current_theme_template']);?>">
        <div class="container">
          <div class="header__top">
            <div class="header__contacts">
              <div class="header__contacts-item"><?php echo get_option('head_phone');?>
              </div>
              <div class="header__contacts-item"><a href="mailto:<?php echo get_option('head_email');?>" class="header__contacts-link"><?php echo get_option('head_email');?></a>
              </div>
            </div>
            <div class="header__langs">
            <?php if (is_active_sidebar('lang_switch')){
              dynamic_sidebar( 'lang_switch' );
            }?>
            </div>
          </div>
        </div>
        <div class="header__bottom">
          <div class="container">
            <div class="header__bottom-inner">
              <button class="burger header__burger js-menu-mobile">
                <svg class="icon icon_burger burger__icon" width="24px" height="24px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#burger"></use>
                </svg>
              </button><a href="/" class="logo header__logo"><img src="<?php echo get_stylesheet_directory_uri();?>/static/img/assets/logo/logo.svg" class="logo__img" alt="" role="presentation"/></a>
              <div class="menu header__menu">
                <ul class="menu__list">
                  <?php
                    $args = array(
                        'posts_per_page'   => -1,
                        'post_type'        => 'menu',
                        'post_status'      => 'publish',
                        'meta_query' => array(
                          array(
                            'key'     => 'menu_type',
                            'value'   => 'top',
                          ),
                        ),
                    );
                    $topmenu = get_posts( $args );
                    $fields = get_post_meta($topmenu[0]->ID,'fields',1);
                    foreach($fields as $n => $item){
                      $parent='';
                      //echo var_export($item,true);
                      if ($item['submenu'] != 0) $parent=' menu__item_parent';
                    ?>
                    <li class="menu__item<?=$parent?>">
                      <a <?php if ($item['link']>=0) echo 'href="'.get_permalink($item['link']).'"'; if($item['submenu']) echo 'href="javascript:void(0)"';?> class="menu__link">
                        <span class="menu__text"><?=$item['name']?></span>
                        <span class="menu__subclose">
                          <svg class="icon icon_cross menu__subclose-icon" width="9px" height="9px">
                              <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#cross"></use>
                          </svg>
                        </span>
                      </a>
                      <?php
                      if($item['submenu'] !== 0){
                        $submenu=get_post($item['submenu']);
                        $subfields= get_post_meta($submenu->ID,'fields',1);
                        if (get_post_meta($item['submenu'],'menu_type',1) == 'double_sub'){ ?>
                        <div class="menu__submenu menu__submenu_cols">
                          <div class="menu__cols">
                            <div class="menu__col">
                              <?php
                                $menu_title=get_post_meta($submenu->ID,'menu_title',1);?>
                              <div class="menu__subtitle"><?=$menu_title['left']?>
                              </div>
                              <ul class="menu__sublist">
                              <?php 
                                foreach ($subfields['left'] as $key => $subitem) {
                                  //var_export($subitem);?>
                                  <li class="menu__subitem"><a href="<?php echo get_permalink($subitem['link']); ?>" class="menu__sublink"><span class="menu__subtext"><?=$subitem['name']?></span></a>
                                  </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="menu__col">
                              <div class="menu__subtitle"><?=$menu_title['right']?>
                              </div>
                              <ul class="menu__sublist">
                                <?php 
                                foreach ($subfields['right'] as $key => $subitem) {
                                  //var_export($subitem);?>
                                  <li class="menu__subitem"><a href="<?php echo get_permalink($subitem['link']); ?>" class="menu__sublink"><span class="menu__subtext"><?=$subitem['name']?></span></a>
                                  </li>
                                <?php } ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <?php } elseif(get_post_meta($item['submenu'],'menu_type',1) == 'single_sub') {?>
                        <div class="menu__submenu">
                          <div class="menu__cols">
                            <div class="menu__col">
                              <ul class="menu__sublist">
                                <?php 
                                foreach ($subfields as $key => $subitem) {
                                  //var_export($subitem);?>
                                  <li class="menu__subitem"><a href="<?php echo get_permalink($subitem['link']); ?>" class="menu__sublink"><span class="menu__subtext"><?=$subitem['name']?></span></a>
                                  </li>
                                <?php } ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>