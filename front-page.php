<?php get_header();?>
      <div class="main main_full">
        <div class="header-animate header-animate_full">
          <div id="animation-container" class="header-animate__inner">
          </div>
          <div class="container">
            <div class="header-text">
              <div class="header-text__title anim-show">Drive Your Data with Deloitte
              </div>
              <div class="header-text__text anim-show anim-show_delay-4">Anybody can create insight. But what are you going to do about it? Many of the world’s leading businesses count on us to deliver powerful outcomes from their data—not just insights. That’s how you can gain the insight-driven advantage with business analytics.
              </div>
            </div>
          </div>
        </div>
        <div class="content content_main">
          <div class="c-main">
            <section class="c-main__section c-main__section_odd c-main__section_graphs">
			<?php 
			$trnslt = array(
				'finance'=> array(
					'ru' => '/banking-i-finansy/', 
					'en' => '/finance/'),
				'technology'=> array(
					'ru' => '/texnologii-smi-i-telekommunikacii/', 
					'en' => '/technology-media-telecommunication/'),
				'consumer'=> array(
					'ru' => '/promyshlennoe-proizvodstvo-i-transport/', 
					'en' => '/consumer-business-transportation/'),
				'energy'=> array(
					'ru' => '/energetika-i-resursy/', 
					'en' => '/energy-and-resources/')
			);
			?>
              <div class="container">
                <div class="title-extend c-main__title">
                  <H2 class="title-extend__title anim-show">Industries</H2>
                  <div class="title-extend__descr anim-show">
					We blend deep industry focus and trends research to create innovative analytic solutions that unclock real value
                  </div>
                </div>
                <div class="c-main__graph-list anim-show">
                  <div class="pic-text pic-text_not-started c-main__pic c-main__pic_graph-1-main pic-text pic-text_anim-up">
                    <A href="<?=$trnslt['finance'][pll_current_language()]?>" class="pic-text__inner">
						<span class="pic-text__title">Financial Services</span>
						<span class="pic-text__pic-wrap">
							<svg class="icon icon_graph-1-main " width="118px" height="99px">
								<use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#graph-1-main"></use>
							</svg>
						</span>
                    </A>
                  </div>
                  <div class="pic-text pic-text_not-started c-main__pic c-main__pic_graph-2-main pic-text pic-text_anim-up">
                    <A href="<?=$trnslt['technology'][pll_current_language()]?>" class="pic-text__inner">
						<span class="pic-text__title">Technology, Media &amp; Telecommunication</span>
						<span class="pic-text__pic-wrap">
							<svg class="icon icon_graph-2-main " width="97px" height="107px">
								<use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#graph-2-main"></use>
							</svg>
						</span>
                    </A>
                  </div>
                  <div class="pic-text pic-text_not-started c-main__pic c-main__pic_graph-3-main pic-text pic-text_anim-up">
                    <A href="<?=$trnslt['consumer'][pll_current_language()]?>" class="pic-text__inner">
						<span class="pic-text__title">Consumer Business &amp; Transportation</span>
						<span class="pic-text__pic-wrap">
							<svg class="icon icon_graph-3-main " width="120px" height="102px">
								<use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#graph-3-main"></use>
							</svg>
						</span>
                    </A>
                  </div>
                  <div class="pic-text pic-text_not-started c-main__pic c-main__pic_graph-4-main pic-text pic-text_anim-up">
                    <A href="<?=$trnslt['energy'][pll_current_language()]?>" class="pic-text__inner">
						<span class="pic-text__title">Energy and Resources</span>
						<span class="pic-text__pic-wrap">
							<svg class="icon icon_graph-4-main " width="99px" height="102px">
								<use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#graph-4-main"></use>
							</svg>
						</span>
                    </A>
                  </div>
                </div>
              </div>
            </section>
            <section class="c-main__section c-main__section_even c-main__section_trends">
              <div class="container">
                <div class="title-extend c-main__title">
                  <H2 class="title-extend__title anim-show">Big Data Trends
                  </H2>
                  <div class="title-extend__descr anim-show">Top trends and predictions 2017 by experts of Deloitte Analytics Institute
                  </div>
                </div>
                <ul class="list list_type_ordered c-main__trends">
                  <li class="list__item anim-show">
                    <h3 class="list__title">Machine learning is a top strategic trend for 2017
                    </h3>
                    <p class="list__text">Machine learning will be a necessary element for data preparation and predictive analysis in businesses moving forward.
                    </p>
                  </li>
                  <li class="list__item anim-show">
                    <h3 class="list__title">Algorithm markets will also emerge
                    </h3>
                    <p class="list__text">Businesses will quickly learn that they can purchase algorithms rather than program them and add their own data. Existing services like Algorithmia, Data Xu, and Kaggle can be expected to grow and multiply.
                    </p>
                  </li>
                  <li class="list__item anim-show">
                    <h3 class="list__title">Cognitive technology will be the new buzzword
                    </h3>
                    <p class="list__text">For many businesses, the link between cognitive computing and analytics will become synonymous in much the same way that businesses now see similarities between analytics and big data.
                    </p>
                  </li>
                  <li class="list__item anim-show">
                    <h3 class="list__title">«Fast data» and «actionable data» will replace big data
                    </h3>
                    <p class="list__text">The idea suggests companies should focus on asking the right questions and making use of the data they have — big or otherwise.
                    </p>
                  </li>
                  <li class="list__item anim-show">
                    <h3 class="list__title">The data-as-a-service business model is on the horizon
                    </h3>
                    <p class="list__text">More businesses will attempt to monetize their data.
                    </p>
                  </li>
                </ul>
              </div>
              <?php $trnslt= array('career_link'=> array('ru' => '/careers-ru/', 'en' => '/careers/'))?>
            </section><a class="incut-block c-main__section c-main__section_incut" href="<?=$trnslt['career_link'][pll_current_language()]?>">
            <div class="container">
              <p class="incut-block__text anim-show">We are looking for people who love  
                <mark class="incut-block__mark">machine learning
                </mark>
              </p>
            </div></a>
            <section class="c-main__section c-main__section_odd c-main__section_events">
                            <div class="container">
                                <div class="title-extend c-main__title">
                                    <H2 class="title-extend__title anim-show">Latest Events</H2>
                                    <div class="title-extend__descr anim-show">Our past news, feeds, updates, thoughts and more
                                    </div>
                                </div>
                                <div class="previews-list c-main__events anim-show">
                                    <div class="previews-list__wrapper">
                                        <?php $args = array(
                                        'posts_per_page'   => 3,
                                        'post_type'        => 'post',
                                        'post_status'      => 'publish',
                                        'orderby'          => 'date',
                                        'order'            => 'DESC',
                                        );
                                        $posts = get_posts( $args );
                                        foreach ($posts as $post){ 
                                          $thumb=get_the_post_thumbnail_url($post->ID);
                                          $date=date_format(date_create($post->post_date),'d/m/Y');
                                          $category = get_the_category($post->ID); 
                                          $category = $category[0];
                                          //var_log($category);
                                        ?>
                                        <article class="preview shifting anim-show previews-list__item">
                                            <a href="<?php echo get_permalink($post->ID);?>" class="preview__inner shifting__inner">
                                                <div class="preview__photo-wrapper">
                                                    <img src="<?=$thumb?>" alt="" class="preview__photo" role="presentation" />
                                                </div>
                                                <div class="preview__body">
                                                    <p class="preview__desc"><?php 
                                                      $raw = strip_tags($post->post_title); 
                                                      $string = substr($raw, 0, 160); // обрезаем первые 140 символов
                                                      $end = strlen(strrchr($string, ' ')); // длина обрезка 
                                                      $string = substr($string, 0, -$end) . '...'; // убираем обрезок добавляем троеточие
                                                      echo $post->post_title;
                                                    ?>
                                                    </p>
                                                    <footer class="preview__more"><span class="preview__more-item preview__more-item_date">Posted:<span class="preview__more-btn"><time class="preview__more-val"><?=$date?></time></span></span>
                                                        <div data-cat="news" class="preview__more-item preview__more-item_category">Category:
                                                            <button class="preview__more-btn preview__more-btn_click"><span class="preview__more-val"><?=$category->name?></span>
                                                            </button>
                                                        </div>
                                                    </footer>
                                                </div>
                                            </a>
                                        </article>
                                        <?php } ?>
                                    </div>
                                </div>
								<?php 
								$trnslt = array(
									'btn_more' => array('ru' => 'Ещё', 'en' => 'More'),
									'btn_more_link' => array('ru' => '/blog-ru/', 'en' => '/blog/')
								);
								?>
								<a class="btn btn_theme_simple anim-show" href="<?=$trnslt['btn_more_link'][pll_current_language()]?>">
									<span class="btn__inner">
										<?=$trnslt['btn_more'][pll_current_language()]?>
									</span>
								</a>
                            </div>
                        </section>
          </div>
        </div>
      </div>
<?php get_footer();?>