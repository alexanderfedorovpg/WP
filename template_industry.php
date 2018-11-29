<?php
/*
    Template Name: Шаблон Industry
*/
?>
<?php get_header(); ?>
<?php


	$translate_arr = array(
		'all'   => array(
			'en' => 'All',
			'ru' => 'Все'
		),
		'demo1' => array(
			'en' => 'Custom solutions',
			'ru' => 'Индивидуальные решения'
		),
		'demo2' => array(
			'en' => 'Client cases (PDF)',
			'ru' => 'Кейсы  (PDF)'
		),
		'demo3' => array(
			'en' => 'Client cases (Live demo)',
			'ru' => 'Онлайн демо'
		),

	);
	$lang          = pll_current_language();

	$_SESSION['solution'] =  $post->ID;
?>

<div class="main">
    <div class="hero page__hero">
        <div class="hero__inner">
            <div class="container">
                <h1 class="hero__title"><?= $post->post_title ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="content content_inner">
        <div class="c-solutions">
            <div class="section c-solutions__desc">
                <div class="container">
                    <div class="wysiwyg">
                        <p><?= $post->post_content ?></p>
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
                                        <option value="all" selected="selected"
                                                class="select__option"><?= $translate_arr['all'][ $lang ] ?></option>
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
                                                    class="control__text"><?= $translate_arr['demo1'][ $lang ] ?></span></span>
                                    </label>
                                </div>
                                <div class="solutions__type solutions__type_pdf">
                                    <label class="control control_type_checkbox solutions__filter">
                                        <input class="control__input" name="type" type="checkbox" value="pdf"
                                               checked="checked"/><span class="control__wrapper"><span
                                                    class="control__text"><?= $translate_arr['demo2'][ $lang ] ?></span></span>
                                    </label>
                                </div>
                                <div class="solutions__type solutions__type_live">
                                    <label class="control control_type_checkbox solutions__filter">
                                        <input class="control__input" name="type" type="checkbox" value="live"
                                               checked="checked"/><span class="control__wrapper"><span
                                                    class="control__text"><?= $translate_arr['demo3'][ $lang ] ?></span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div data-order='["custom","pdf","live"]' class="solutions__list sortable">
							<?php $args = array(
								'posts_per_page' => - 1,
								'post_type'      => 'case',
								'post_status'    => 'publish',
                                'industry'       => $post->post_title
							);
								$posts  = get_posts( $args );
								foreach ( $posts as $post ) {
									$type     = get_post_meta( $post->ID, 'type', 1 );
									$funct    = wp_get_post_terms( get_the_id(), 'function' );
									$tag      = $funct[0]->slug;
									$tag_name = $funct[0]->name;
									if ( $type == 'custom' ) {
										$excerpt = get_the_excerpt( $post );
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