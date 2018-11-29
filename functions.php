<?php
add_filter( 'user_can_richedit' , '__return_false', 50 );
add_image_size( 'case_img', 279, 186);
add_image_size( 'case_img_double', 279*2, 186*2);

add_filter('pll_the_languages', 'dw_dropdown', 10, 2);
function dw_dropdown($output, $args) {
	$out='';
	$translations = pll_the_languages(array('raw'=>1));
	foreach ($translations as $lang){
		$c='';
		if ($lang['current_lang'])
			$c=' btn_active';
		$out.='<A class="btn btn_theme_head header__lang-btn'.$c.'" href="'.$lang['url'].'"><span class="btn__inner">'.$lang['name'].'</span></A>';
	}
    return $out;
}
function remove_some_widgets(){
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );
function dw_widgets_init() {
	register_sidebar( array(
		'name'          => 'Language Switcher',
		'id'            => 'lang_switch',
		'description'   => 'Add widgets here to appear in your language switcher area.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'dw_widgets_init' );
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
} 
function dw_get_page_class($name){
	switch ($name) {
		case 'front-page.php':											echo '';break;
		case 'template_industry.php':		                            echo 'page_inner page_solution';break;
		case 'page-blog.php':											echo 'page_inner page_blog';break;
		case 'page-blog-ru.php':						                echo 'page_inner page_blog';break;
		case 'single-post.php':											echo 'page_inner page_blog';break;
		case 'page-contact.php':										echo 'page_inner page_contacts';break;
		case 'page-contact-ru.php':                                     echo 'page_inner page_contacts';break;
		case 'page-careers.php':										echo 'page_inner page_career';break;
		case 'page-careers-ru.php':										echo 'page_inner page_career';break;
		default: 														echo ''; break;
	}
}
function dw_get_header_class($name){
	switch ($name) {
		case 'front-page.php':											echo '';break;
		default: 														echo 'header_inner page__header'; break;
	}

}
function cisdai_enqueue_style() {
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/static/css/main.min.css', false );
	wp_enqueue_style( 'main-ie', get_stylesheet_directory_uri() . '/static/css/main.min.css', false );
	wp_style_add_data( 'main-ie', 'conditional', 'if (gt IE 9)|!(IE)' );
}
add_action( 'wp_enqueue_scripts', 'cisdai_enqueue_style' );
function cisdai_enqueue_script() {
	if (is_page('contact')||is_page('contact-ru')) {
		wp_enqueue_script( 'contacts-map-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAPGgaOqK-FKU5Do6GlB4KzorMR7F73_4g&language=en', false, false ,true );
		$translation_array = array(
			'url' => get_stylesheet_directory_uri(),
		);
		wp_localize_script( 'contacts-map-js', 'contact_map', $translation_array );
	}

	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/static/js/main.min.js', false, false ,true );
	if (is_front_page())
		wp_enqueue_script( 'animate-block-js', get_stylesheet_directory_uri() . '/static/js/separate-js/animate-block.js', false, false ,true );
}
add_action( 'wp_enqueue_scripts', 'cisdai_enqueue_script' );
function theme_register_nav_menu() {
	register_nav_menu( 'footer', 'Footer Menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function add_option_field_to_general_admin_page(){
	register_setting( 'general', 'head_phone' );
	add_settings_field( 
		'head_phone_setting-id', 
		'Header phone number', 
		'head_phone_setting_callback_function', 
		'general', 
		'default', 
		array( 
			'id' => 'head_phone_setting-id', 
			'option_name' => 'head_phone' 
		)
	);
	register_setting( 'general', 'head_email' );
	add_settings_field( 
		'head_email_setting-id', 
		'Header email', 
		'head_phone_setting_callback_function', 
		'general', 
		'default', 
		array( 
			'id' => 'head_email_setting-id', 
			'option_name' => 'head_email' 
		)
	);
	register_setting( 'general', 'cv_mail_delivery' );
	add_settings_field(
		'cv_mail_delivery_setting-id',
		'CV mails delivery',
		'head_phone_setting_callback_function',
		'general',
		'default',
		array(
			'id' => 'cv_mail_send_setting-id',
			'option_name' => 'cv_mail_delivery',
			'placeholder' => 'Напишите email(ы) для рассылки CV через «,» (запятую)',
			'size' => '100'
		)
	);



}
add_action('admin_menu', 'add_option_field_to_general_admin_page');

function head_phone_setting_callback_function( $val ){
	$id = $val['id'];
	$option_name = $val['option_name'];
	$placeholder = $val['placeholder'];
	$size = $val['size'];
	?>
	<input 
		type="text" 
		name="<?=$option_name?>" 
		id="<?=$id?>" 
		value="<?php echo esc_attr( get_option($option_name) ); ?>"
        placeholder="<?=$placeholder?>"
        size="<?=$size?>"
	/> 
	<?php
}



function var_log($v){
	echo '<pre style="position:absolute;top:0;left:0;background:black;">';
	var_export($v);
	echo '</pre>';
}


if ( ! function_exists( 'init_session' ) ):
    function init_session() {
        if ( ! session_id() ) {
            session_start();
        }
    }
endif;

add_action( 'init', 'init_session', 1 );

function get_crumbs() {

    global $post;

    if ( empty( $post ) ) {

        return "<div>Error output breadcrumbs</div>";

    }

    $crumbs = '
<nav class="breadcrumbs anim-show anim-show_js_inited anim-show_visible" data-shown="true">
  <h2 class="screenreader" style=" display: block;">Breacrumbs</h2>
      <ul class="breadcrumbs__menu list">';

    /**     Формируем путь такого типа: Solutions / [case_type] / [function|industry] / [case_name]
     * [case_type] - Тип кейса, либо просто кейс, либо сustom solution;
     * [function|industry] - Функция или индустрия, зависит от того откуда пришли;
     * [case_name] - Тайтл кейса */

	$lang = pll_current_language();

	$translate_arr = array(

		'custom' => array(
			'en' => 'Custom solution',
			'ru' => 'Индивидуальные решения'
		),
		'case'   => array(
			'en' => 'Case',
			'ru' => 'Кейс'
		)
	);

	$solution         = get_page_by_path( 'all-solutions' );
	$solution_id      = pll_get_post( $solution->ID );
	$solution_by_lang = get_post( $solution_id );

	$type_page_id = pll_get_post( $_SESSION['solution'] );

	$arr_crumbs_items = [];
	$case_type        = get_post_meta( $post->ID, 'type',
		1 ) == 'custom' ? $translate_arr['custom'][ $lang ] : $translate_arr['case'][ $lang ];
	$type_page        = get_post( $type_page_id );
	$void             = 'javascript:void(0);';

	$arr_crumbs_items [ $solution_by_lang->post_title ]['url'] = get_permalink( $solution_id );           // SOLUTION
	$arr_crumbs_items [ $case_type ]['url']                    = $void;                                  // CASE
	$arr_crumbs_items [ $type_page->post_title ]['url']        = get_permalink( $type_page_id );        // INDUSTRY | FUNCTION
	$arr_crumbs_items [ $post->post_title ]['url']             = $void;                                // CURRENT PAGE
	$last_item                                                 = end( $arr_crumbs_items );

	foreach ( $arr_crumbs_items as $name => $link ) {
		if ( $last_item != $name ) {

			$crumbs .= ' <li class="breadcrumbs__item"><a href="' . $link['url'] . '" class="breadcrumbs__link">' . $name . '</a>
                           </li>';
		} else {

			$crumbs .= '<li class="breadcrumbs__item"><span class="breadcrumbs__link">' . $name . '</span>
                            </li>';
		}
	}
	$crumbs .= '</ul>
</nav>';

	return $crumbs;
}

add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );

function myajax_data(){

    wp_localize_script('jquery', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php')   //глобальная переменная для ajax запросов
        )
    );
}

add_action('wp_footer', 'cv_file_send', 99);
function cv_file_send() {
if (is_page('careers-ru')||is_page('careers')) {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery('.vacancy__form').submit(function (e) {
                e.preventDefault();

                var forma = new FormData(),
                    ID =  jQuery(this).find('input[name=vac_id]').val(),
                    control = jQuery(this).find('.input-file__hidden')[0];

                   var ext =  control.value,
                       check = ext.search(/^.*\.(?:png|jpg|jpeg|xlsx|xls|doc|docx|pdf|csv'|)\s*$/ig);

                if(check!=0){
                    alert("Неправильный формат файла\n Форма будет очищена");
                    return;
                }


                forma.append("file", control.files[0]);
                forma.append("vacancy_id", ID);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", myajax.url + '?action=cv_send', true);
                xhr.send(forma);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState != 4) return;
                    if (xhr.status != 200) {
                        alert(xhr.status + ': ' + xhr.statusText);
                    } else {
                        alert(xhr.responseText);
                    }
                };

                jQuery(this)[0].reset();
                jQuery('.input-file__field').empty();
            });
        });
    </script>
    <?php
    }
}

add_action('wp_ajax_cv_send', 'cv_send_callback');
add_action('wp_ajax_nopriv_cv_send', 'cv_send_callback');
function cv_send_callback() {

	$file              = $_FILES['file'];
	$vacancy_id        = intval( $_POST['vacancy_id'] );
	$file_mime_types   = array(
		'image/png',
		'image/jpeg',
		'image/bmp',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/vnd.ms-excel',
		'application/msword',
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'application/pdf',
		'text/csv'
	);
	$file_types        = array( 'png', 'jpg', 'jpeg', 'xlsx', 'xls', 'doc', 'docx', 'pdf', 'csv' );
	$current_file_type = substr( strrchr( $file['name'], '.' ), 1 );
	if ( is_int( $vacancy_id ) && in_array( $current_file_type, $file_types ) && in_array( $file['type'],  // проверка типа файла и целочиленого значения ID
			$file_mime_types )
	) {

		$delivery_emails = array_map( 'trim', explode( ",",
			get_option( 'cv_mail_delivery' ) ) );                           //    получаем email(ы) указанные во вкладке "Общие настройки"

		$post    = get_post( $vacancy_id );
		$vacancy = $post->post_title;

		$file_size = $file['size'];
		$file_type = $file['type'];
		$file_dir  = $file['tmp_name'];                                    //   Располжение файла
		$filename  = $file['name'];                                        //   Имя файла для прикрепления
		$to        = join( ', ', $delivery_emails );                       //   Кому
		$from    = "noreply@cisdai.ru";                                    //   От кого
		$subject = "CV $vacancy from cisdai";                              //   Тема

		$message  = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                    <html xmlns='http://www.w3.org/1999/xhtml'>
                    <head>
                        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                        <title>CV from cisdai.ru</title>
                    </head>
                    <body>
                        <table>
                            <tr>
                                <td>
                                 По данной вакансии $vacancy вам прислали файл.
                                </td>
                            </tr>
                        </table>
                    </body>
                  </html>";                                                                 // Текст письма
		$boundary = "---";                                                                  // Разделитель
		/* Заголовки */
		$headers = "From: $from\r\n";
		$headers .= "Reply-To:$from\r\n";
		$headers .= "X-Mailer: PHPMail Tool\n";
		$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
		$body = "--$boundary\n";
		/* Присоединяем текстовое сообщение */
		$body .= "Content-type: text/html;\n";
		$body .= $message . "\n";
		$body .= "--$boundary\n";
		$file = fopen( $file_dir, "r" );                                                      //  Открываем файл
		$text = fread( $file, $file_size );                                                   //  Считываем весь файл
		fclose( $file );                                                                      //  Закрываем файл
		/* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
		$body .= "Content-Type: $file_type; name==?utf-8?B?" . base64_encode( $filename ) . "?=\n";
		$body .= "Content-Transfer-Encoding: base64\n";
		$body .= "Content-Disposition: attachment; filename==?utf-8?B?" . base64_encode( $filename ) . "?=\n\n";
		$body .= chunk_split( base64_encode( $text ) ) . "\n";
		$body .= "--" . $boundary . "--\n";

		if (mail( $to, $subject, $body, $headers)){

		    echo "Ваше резюме отправлено";
        }
        else{

	        echo "Ваше резюме не отправлено";
        }

		if (time_nanosleep(5, 0)) {
			unlink($file_dir);
		}

		wp_die();


	} else {

		echo 'Ошибка отправки';

		if ( is_user_logged_in() ) {
			print_r( $_FILES );
			print_r( $_POST );
		}
	}

}

?>