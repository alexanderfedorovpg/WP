<?php get_header();?>
<div class="main">
    <div class="hero page__hero">
        <div class="hero__inner">
            <div class="container">
                <h1 class="hero__title anim-show">Contact
  </h1>
            </div>
        </div>
    </div>
    <div class="content content_inner">
        <div class="c-contacts">
            <section class="section c-contacts__section c-contacts__section_contacts">
                <div class="container">
                    <h2 class="c-contacts__title">Get in Touch</h2>
                    <address class="c-contacts__contacts"><a href="mailto:rudata@deloitte.ru" class="link">rudata@deloitte.ru</a><a href="tel:+74957870600" class="link link_text">+7 (495) 787 06 00</a>
    </address>
                </div>
            </section>
            <div class="section section_stripe c-contacts__section c-contacts__section_persons">
                <div class="container">
                    <div class="c-contacts__persons">
                        <div class="visit-card c-contacts__person">
                            <figure class="visit-card__photo-wrapper">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/img/assets/visit-card/dierks.jpg" alt="Photo of this person" class="visit-card__photo" title="" />
                            </figure>
                            <address class="visit-card__contacts">Stefan Dierks, Partner<br>
<a class="link visit-card__link" href="mailto:sdierks@deloitte.ru">sdierks@deloitte.ru</a>
        </address>
                        </div>
                        <div class="visit-card c-contacts__person">
                            <figure class="visit-card__photo-wrapper">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/img/assets/visit-card/minin.jpg" alt="Photo of this person" class="visit-card__photo" title="" />
                            </figure>
                            <address class="visit-card__contacts">Dr. Alexey Minin, Team Lead<br>
<a class="link visit-card__link" href="mailto:aminin@deloitte.ru">aminin@deloitte.ru</a>
        </address>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section c-contacts__section c-contacts__section_socials">
                <div class="container">
                    <h4 class="c-contacts__label">Follow us</h4>
                    <ul class="social social_theme_colored social_size_l c-contacts__socials">
                        <li class="social__item social__item_vk">
                            <a href="https://vk.com/deloitteanalytics" class="social__link">
                                <svg class="icon icon_vk social__icon social__icon_vk" width="24px" height="24px">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#vk"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item social__item_fb">
                            <a href="http://www.facebook.com/deloitteanalytics/" class="social__link">
                                <svg class="icon icon_fb social__icon social__icon_fb" width="9px" height="16px">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#fb"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item social__item_tw">
                            <a href="https://twitter.com/DeloitteAnalyt1" class="social__link">
                                <svg class="icon icon_tw social__icon social__icon_tw" width="19px" height="16px">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#tw"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <div data-options='{"center":{"lat":55.7791045,"lng":37.5819207},"zoom":17,"scrollwheel":false}' data-marker='{"position":{"lat":55.778305,"lng":37.586341},"clickable":false}' data-adaptive='{"(min-width: 721px) and (max-width: 1024px)":{"zoom":15,"center":{"lat":55.780359,"lng":37.58059}},"(max-width: 720px)":{"zoom":16},"(min-width: 401px) and (max-width: 720px)":{"center":{"lat":55.77902,"lng":37.587242}},"(max-width: 400px)":{"center":{"lat":55.779152,"lng":37.585654}}}'
            class="maps c-contacts__map">
                <div class="container">
                    <address class="maps__contacts">Moscow, Russia, 125047<br>
<br>
5B Lesnaya St. (White Square)
    </address>
                </div>
                <div class="maps__wrapper">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>