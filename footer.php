<?php

    if ('ru' == pll_current_language()) :
        get_footer('ru');
    else :
        get_footer('en');
    endif;