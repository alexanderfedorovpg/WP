<?php get_header(); ?>
    <div class="main">
        <div class="hero page__hero">
            <div class="hero__inner">
                <div class="container">
                    <h1 class="hero__title">Financial Services
                    </h1>
                </div>
            </div>
        </div>
        <div class="content content_inner">
            <div class="c-solutions">
                <div class="section c-solutions__desc">
                    <div class="container">
                        <div class="wysiwyg">
                            <p>DAI financial solutions can help companies optimize every aspect of their sales
                                operation. By applying advanced and predictive analytics to data stored in CRM tools,
                                organizations can make more accurate pipeline forecasts
                                and help reps identify potential upsell opportunities in their existing accounts.</p>
                        </div>
                    </div>
                </div>
                <div class="section section_stripe c-solutions__items">
                    <div class="container">
                        <div class="solutions">
                            <div class="solutions__header">
                                <div class="solutions__select">
                                    <div class="select solutions__filter">
                                        <select class="select__widget" name="function">
                                            <option value="all" selected="selected" class="select__option">All
                                                functions
                                            </option>
											<?php
												$functs = get_terms( array(
													'taxonomy'   => 'function',
													'hide_empty' => false,
												) );
											?>
											<?php foreach ( $functs as $func ) { ?>
                                                <option value="<?php echo $func->slug; ?>"
                                                        class="select__option"><?php echo $func->name; ?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="solutions__types">
                                    <div class="solutions__type solutions__type_custom">
                                        <label class="control control_type_checkbox solutions__filter">
                                            <input class="control__input" name="type" type="checkbox" value="custom"
                                                   checked="checked"/><span class="control__wrapper"><span
                                                        class="control__text">Custom solutions</span></span>
                                        </label>
                                    </div>
                                    <div class="solutions__type solutions__type_pdf">
                                        <label class="control control_type_checkbox solutions__filter">
                                            <input class="control__input" name="type" type="checkbox" value="pdf"
                                                   checked="checked"/><span class="control__wrapper"><span
                                                        class="control__text">Client cases (PDF)</span></span>
                                        </label>
                                    </div>
                                    <div class="solutions__type solutions__type_live">
                                        <label class="control control_type_checkbox solutions__filter">
                                            <input class="control__input" name="type" type="checkbox" value="live"
                                                   checked="checked"/><span class="control__wrapper"><span
                                                        class="control__text">Client cases (Live demo)</span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div data-order='["custom","pdf","live"]' class="solutions__list sortable">
								<?php $args = array(
									'posts_per_page' => - 1,
									'post_type'      => 'case',
									'post_status'    => 'publish',
									'industry'       => 'financial-services'
								);
									$posts  = get_posts( $args );
									
									foreach ( $posts as $post ) {

										$type     = get_post_meta( $post->ID, 'type', 1 );
										$funct    = wp_get_post_terms( get_the_id(), 'function' );
										$tag      = $funct[0]->slug;
										$tag_name = $funct[0]->name;
										if ( $type == 'custom' ) {
											$excerpt = get_the_excerpt( $post );
											var_log( $excerpt );
											$thumb   = get_the_post_thumbnail_url( $post->ID, 'case_img' );
											$thumb2x = get_the_post_thumbnail_url( $post->ID, 'case_img_double' );
											?>
                                            <article data-type="<?= $type ?>" data-function="<?= $tag ?>"
                                                     class="solution solution_type_custom anim-show shifting solutions__item sortable__item">
                                                <a href="<?php echo get_permalink( $post->ID ); ?>"
                                                   class="solution__inner shifting__inner">
                                                    <header class="solution__header">
                                                        <h2 class="solution__title"><?php echo $post->post_title; ?></h2>
                                                        <div class="solution__tag"><?= $tag_name ?></div>
                                                        <img src="<?= $thumb ?>" srcset="<?= $thumb2x ?> 2x" alt=""
                                                             class="solution__photo shining__img" role="presentation"/>
                                                    </header>
                                                    <span class="solution__body">
                                        <p class="solution__desc"><?= $excerpt ?></p>
                                    </span>
                                                </a>
                                            </article>
											<?php
										} elseif ( $type == 'pdf' || $type == 'live' ) {
											$thumb = get_the_post_thumbnail_url( $post->ID );
											?>
                                            <article data-type="<?= $type ?>" data-function="<?= $tag ?>"
                                                     class="solution solution_type_<?= $type ?> solution_simple anim-show shifting solutions__item sortable__item">
                                                <a href="<?php echo get_permalink( $post->ID ); ?>"
                                                   class="solution__inner shifting__inner">
                                                    <header class="solution__header">
                                                        <h2 class="solution__title"><?php echo $post->post_title; ?></h2>
                                                        <div class="solution__tag"><?= $tag_name ?></div>
                                                        <img src="<?= $thumb ?>" alt="" class="solution__photo"
                                                             role="presentation"/>
                                                    </header>
                                                </a>
                                            </article>
											<?php
										}
									}
								?>
                            </div>
                            <div class="solutions__empty">Please select one of the type of cases
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>