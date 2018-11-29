<?php get_header();?>
    <div class="main">
        <div class="hero page__hero">
            <div class="hero__inner">
                <div class="container">
                    <h1 class="hero__title anim-show">Карьера
                    </h1>
                </div>
            </div>
        </div>
        <div class="content content_inner">
            <div class="c-career">
                <section class="section section_content c-career__section c-career__section_intro">
                    <div class="container">
                        <div class="wysiwyg">
                            <h2>Присоединяйтесь к нашей команде</h2>
                            <p>Общеизвестно, что Amazon Web Services оставил свои самые крупные конкуренты облако в зеркало заднего вида.
                                Когда данные по AWS 'четвертом квартале 2016 года прибыли выйдет в конце января, мы, вероятно, чтобы увидеть продолжением его впечатляющие темпы роста 50%. Итак, давайте посмотрим на другую сторону дома, гроссбух для розничных операций Amazon.
                                Вместо квартального дохода, мы теперь имеем снимок онлайн Амазонки праздник продаж и цифры говорят нам что-нибудь.</p>
                        </div>
                    </div>
                </section>
                <div class="section section_stripe c-career__section c-career__section_quote">
                    <div class="container">
                        <div class="visit-card visit-card_quote">
                            <figure class="visit-card__photo-wrapper">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/img/assets/visit-card/minin.jpg" alt="Photo of this person" class="visit-card__photo" title="" />
                            </figure>
                            <blockquote class="visit-card__quote-wrapper">
                                <p class="visit-card__quote">We are looking for people that are ready for a challenging and fulfilling experience. With an array of opportunities, DAI nurtures employee growth, and allows your skills and hard work to define your next endeavor.
                                </p>
                                <cite class="visit-card__cite">Dr. Alexey Minin, Team Lead
                                </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <section class="section section_content c-career__section c-career__section_vacancies">
                    <div class="container">
                        <div class="wysiwyg">
                            <h2>Open position</h2>
                        </div>
                        <div class="accordeon c-career__vacancies">
                            <?php $args = array(
                                'posts_per_page'   => -1,
                                'post_type'        => 'vacancy',
                                'post_status'      => 'publish'
                            );
                                $posts = get_posts( $args );
                                foreach ($posts as $post){
                                    ?>
                                    <div class="details details_theme_primary accordeon__item">
                                        <h3 class="details__summary"><?=$post->post_title?></h3>
                                        <div class="details__content">
                                            <div class="vacancy">
                                                <div class="vacancy__desc"><?=$post->post_content?></div>
                                                <div class="vacancy__footer">
                                                    <h6 class="vacancy__label">Отправить свое резюме</h6>
                                                    <form class="vacancy__form">
                                                        <div class="input-file vacancy__resume">
                                                            <div class="input-file__field">
                                                            </div>
                                                            <label class="btn btn_theme_form input-file__btn">
                                                                <div class="btn__inner">Обзор
                                                                    <input type="file" class="input-file__hidden" name="resume" required="required" placeholder="Выберите файл" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <button class="btn btn_theme_form vacancy__submit" type="submit"><span class="btn__inner">Отправить</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php get_footer();?>