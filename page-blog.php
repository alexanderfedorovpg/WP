<?php get_header();?>
<div class="main">
    <div class="hero page__hero">
        <div class="hero__inner">
            <div class="container">
                <h1 class="hero__title anim-show">Blog</h1>
            </div>
        </div>
    </div>
    <div class="content content_inner">
        <div class="c-blog">
            <div class="section c-blog__blog">
                <div class="container">
                    <div class="blog">
                        <div class="blog__filter">
                        	<?php
                            	$cats = get_terms( array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    'orderby'       => 'id', 
									'order'         => 'ASC',
                                    'exclude'       => array(1,28), 
                            	) );
                            ?>
                            <label class="control blog__control">
                                <input class="control__input" name="category" type="radio" value="all" checked="checked" /><span class="control__wrapper"><span class="control__control-text">All</span></span>
                            </label>
                            <?php foreach ($cats as $cat) { ?>
                            <label class="control blog__control">
                                <input class="control__input" name="category" type="radio" value="<?php echo $cat->slug;?>" /><span class="control__wrapper"><span class="control__control-text"><?php echo $cat->name;?></span></span>
                            </label>
                            <?php } ?>
                        </div>
                        <div class="select blog__select">
                            <select class="select__widget">
                                <option value="all" class="select__option">All categories</option>
                                <?php 
                                reset($cats);
                                foreach ($cats as $cat) { ?>
                                <option value="<?php echo $cat->slug;?>" class="select__option"><?php echo $cat->name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="blog__previews">
                        	<?php $args = array(
                            'posts_per_page'   => -1,
                            'post_type'        => 'post',
                            'post_status'      => 'publish'
                            );
                            $posts = get_posts( $args );
                            foreach ($posts as $post){ 
                            	$thumb=get_the_post_thumbnail_url($post->ID);
                            	$date=date_format(date_create($post->post_date),'d/m/Y');
                            	$category = get_the_category($post->ID); 
                				$category = $category[0];
                				//var_log($category);
                            ?>
                            <article class="preview shifting blog__preview anim-show">
                                            <a href="<?php echo get_permalink($post->ID);?>" class="preview__inner shifting__inner">
                                                <div class="preview__photo-wrapper">
                                                    <img src="<?=$thumb?>" alt="" class="preview__photo" role="presentation" />
                                                </div>
                                                <div class="preview__body">
                                                    <p class="preview__desc"><?=$post->post_title?></p>
                                                    <footer class="preview__more"><span class="preview__more-item preview__more-item_date">Posted:<span class="preview__more-btn"><time class="preview__more-val"><?=$date?></time></span></span>
                                                        <div data-cat="pressrel" class="preview__more-item preview__more-item_category">Category:
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>