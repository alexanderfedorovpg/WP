            <footer class="footer">
                <div class="container">
                    <div class="footer__inner">
                        <div class="footer__block footer__block_copy">
                            <div class="footer__links">
                                <?php
                                    $items=wp_get_nav_menu_items('141');
                                    foreach($items as $item){
                                        //var_export($item);
                                        ?>
                                        <a href="<?php echo $item->url;?>" class="footer__link"><?php echo $item->title;?></a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="footer__copy">© <?php echo date('Y'); ?> Deloitte</div>
                        </div>
                        <form class="subscribe footer__block footer__block_subscribe" method="POST">
                            <input type="hidden" name="action" value="unisenderSubscribe">
                            <h3 class="subscribe__title">Узнавайте первым</h3>
                            <div class="subscribe__text subscribe__text_success subscribe__text_hidden">
                                <h4 class="subscribe__subtitle">Спасибо</h4>
                                <div class="subscribe__descr">Подписка успешна! Проверьте почту и подтвердите подписку.</div>
                            </div>
                            <div class="subscribe__text">
                                <div class="subscribe__descr">О наших новостях, событиях, решениях и кейсах</div>
                            </div>
                            <div class="input subscribe__input input input_theme_special">
                                <input type="text" class="input__field" placeholder="Ваш Email" required="required" name="email" data-error="Введите верный e-mail" />
                            </div>
                            <button class="btn subscribe__btn btn btn_theme_special"><span class="btn__inner">Подписаться</span></button>
                        </form>
                        <ul class="social footer__block footer__block_social">
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
                    <div class="scroll-top js-scroll-top footer__scroll-top">
                        <A class="btn scroll-top__btn btn btn_theme_foot" href="javascript:void(0)">
                            <span class="btn__inner">
                                <svg class="icon icon_arr " width="12px" height="8px">
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri();?>/svg-symbols.svg#arr"></use>
                                </svg>
                            </span>
                        </A>
                    </div>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>