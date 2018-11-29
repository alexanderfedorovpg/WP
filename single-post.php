<?php get_header(); ?>
<?php
	$translate_arr = array(
		'blog' => array(
			'en' => 'Blog',
			'ru' => 'Блог'
		),

		'share'    => array(
			'en' => 'Share this:',
			'ru' => 'Поделиться:'
		),
		'posted'   => array(
			'en' => 'Posted:',
			'ru' => 'Дата публикации:'
		),
		'btn_next' => array(
			'en' => 'Next',
			'ru' => 'Следующий'
		),
		'btn_prev' => array(
			'en' => 'Previous',
			'ru' => 'Предыдущий'
		),

	);
	$lang          = pll_current_language();

	//var_log($post); ?>
    <div class="main">
        <div class="hero page__hero">
            <div class="hero__inner">
                <div class="container">
                    <h1 class="hero__title anim-show"><?= $translate_arr['blog'][ $lang ] ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="content content_inner">
            <article class="c-article">
                <div class="container">
                    <header class="wysiwyg c-article__header">
                        <h2><?= $post->post_title ?></h2>
                    </header>
                    <footer class="c-article__footer">
                        <div class="share c-article__share">
                            <div class="share__label"><?= $translate_arr['share'][ $lang ] ?>
                            </div>
							<?php
								$social_url = get_permalink($post->ID);
								$social_title = $post->post_title;
								$social_image = current(wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail-size', true));
								$social_description = mb_substr(strip_tags($post->post_content), 0, 300, 'UTF-8').(mb_strlen($post->post_content) > 300 ? "..." : "");
							?>
							
                            <ul class="social social_theme_colored share__social">
                                <li class="social__item social__item_vk">
                                    <a 
										target="_blank" 
										href="https://vk.com/share.php?
											url=<?= $social_url ?>&
											title=<?= $social_title ?>&
											image=<?= $social_image ?>&
											description=<?= $social_description ?>" 
										class="social__link">
                                        <svg class="icon icon_vk social__icon social__icon_vk" width="24px"
                                             height="24px">
                                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/svg-symbols.svg#vk"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social__item social__item_fb">
                                    <a 
										target="_blank" 
										href="http://www.facebook.com/sharer.php?
											s=100&
											p[url]=<?= urlencode($social_url) ?>&
											p[title]=<?= urlencode($social_title) ?>&
											p[summary]=<?= urlencode($social_description) ?>&
											p[images][0]=<?= urlencode($social_image) ?>
											" 
										class="social__link">
                                        <svg class="icon icon_fb social__icon social__icon_fb" width="9px"
                                             height="16px">
                                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/svg-symbols.svg#fb"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social__item social__item_tw">
                                    <a 
										target="_blank" 
										href="http://twitter.com/share?
											url=<?= $social_url ?>&
											text=<?= $social_title ?>" 
										class="social__link">
                                        <svg class="icon icon_tw social__icon social__icon_tw" width="19px"
                                             height="16px">
                                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/svg-symbols.svg#tw"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="c-article__date"><?= $translate_arr['posted'][ $lang ] ?>
                            <time datetime="<?php echo date_format( date_create( $post->post_date ), 'd/m/Y' ); ?>"
                                  class="c-article__date-val"><?php echo date_format( date_create( $post->post_date ),
									'd/m/Y' ); ?></time>
                        </div>
                    </footer>
					<?php
						$content = $post->post_content;
						$parts   = preg_split( "/(<img[\w\W]+?\/>)/", $content, - 1, PREG_SPLIT_DELIM_CAPTURE );
						if ( count( $parts ) <= 1 ) {
							echo '<div class="wysiwyg c-article__text">' . $content . '</div><div class="c-article__nav">';
							$prev_post = get_previous_post();
							// if ( ! empty( $prev_post ) ) {
								// echo '<a class="btn btn_theme_simple c-article__btn" href="' . get_permalink( $prev_post->ID ) . '"><span class="btn__inner">' . $translate_arr['btn_prev'][ $lang ] . '</span></a>';
							// }
							if ( ! empty( $prev_post ) ) {
								echo '<a href="' . get_permalink( $prev_post->ID ) . '">
										<svg class="left-chevron" width="40px" height="40">
                                            <use xlink:href="'.get_stylesheet_directory_uri().'/svg-symbols.svg#left-chevron"></use>
                                        </svg>
									</a>';
							}
							$next_post = get_next_post();
							// if ( ! empty( $next_post ) ) {
								// echo '<a style="margin-left:auto;" class="btn btn_theme_simple c-article__btn" href="' . get_permalink( $next_post->ID ) . '"><span class="btn__inner">' . $translate_arr['btn_next'][ $lang ] . '</span></a>';
							// }
							if ( ! empty( $next_post ) ) {
								echo '<a style="margin-left:auto;" href="' . get_permalink( $next_post->ID ) . '">
										<svg class="right-chevron" width="40px" height="40">
                                            <use xlink:href="'.get_stylesheet_directory_uri().'/svg-symbols.svg#right-chevron"></use>
                                        </svg>
								</a>';
							}						
							echo '</div></div>';
						} else {
							foreach ( $parts as $n => $p ) {
								if ( preg_match( "<img[\w\W]+?\/>", $p ) == 1 ) {
									$src = array();
									preg_match( '/src="([^"]*)"/i', $p, $src );
									$src = $src[1];
									echo '<div class="section section_back-img c-article__photo" style="background-image:url(' . $src . ')">';
									echo '<img src="' . $src . '" alt="" width="100%" />';
									echo '</div>';
								} else {
									if ( $n == 0 ) {
										echo '<div class="wysiwyg c-article__text">';
										echo $p;
										echo '</div></div>';
									} elseif ( $n == count( $parts ) - 1 ) {
										echo '<div class="container"><div class="wysiwyg c-article__text">';
										echo $p;
										echo '</div>';
										echo '<div class="c-article__nav">';
										$prev_post = get_previous_post();
										// if ( ! empty( $prev_post ) ) {
											// echo '<a class="btn btn_theme_simple c-article__btn" href="' . get_permalink( $prev_post->ID ) . '"><span class="btn__inner">' . $translate_arr['btn_prev'][ $lang ] . '</span></a>';
										// }
										if ( ! empty( $prev_post ) ) {
											echo '<a href="' . get_permalink( $prev_post->ID ) . '">
													<svg class="left-chevron" width="40px" height="40">
														<use xlink:href="'.get_stylesheet_directory_uri().'/svg-symbols.svg#left-chevron"></use>
													</svg>
												</a>';
										}
										$next_post = get_next_post();
										// if ( ! empty( $next_post ) ) {
											// echo '<a style="margin-left:auto;" class="btn btn_theme_simple c-article__btn" href="' . get_permalink( $next_post->ID ) . '"><span class="btn__inner">' . $translate_arr['btn_next'][ $lang ] . '</span></a>';
										// }
										if ( ! empty( $next_post ) ) {
											echo '<a style="margin-left:auto;" href="' . get_permalink( $next_post->ID ) . '">
												<svg class="right-chevron" width="40px" height="40">
													<use xlink:href="'.get_stylesheet_directory_uri().'/svg-symbols.svg#right-chevron"></use>
												</svg>
											</a>';
										}
										echo '</div>';
										echo '</div>';
									} else {
										echo '<div class="container"><div class="wysiwyg c-article__text">';
										echo $p;
										echo '</div></div>';
									}
								}
							}
						}
					?>
            </article>
        </div>
    </div>
<?php get_footer(); ?>