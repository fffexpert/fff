<?php
// Защита от прямого доступа к файлу
if ( !defined('ABSPATH') ) {
	exit;
}

// отключение админской панели
//add_filter('show_admin_bar', '__return_false');

//подключение стилей
add_action('wp_print_styles', 'theme_name_scripts');
function theme_name_scripts() {
//    wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/css/bootstrap-reboot.min.css' );
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
    wp_enqueue_style( 'arcticmodal', get_template_directory_uri() . '/css/jquery.arcticmodal-0.3.css' );
    wp_enqueue_style( 'slick-theme-style', get_template_directory_uri() . '/css/slick-theme.css' );
    wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css' );
	
	
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'validate', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js', array(), '1.0.0', true );
    wp_enqueue_script( 'fancybox-script', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'arcticmodal-script', get_template_directory_uri() . '/lib/jquery.arcticmodal-0.3.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-script', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/lib/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/lib/main.js', array(), '1.0.0', true );
}


// MENU
register_nav_menus(array(
    'main' => 'Основное Меню',
));

//Добавляет класс к меню li
function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'top') {
    $classes[] = 'nav__item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

// Поддержка загрузки лого
add_theme_support( 'custom-logo' );

// Поддержка миниатюр
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 210, 210 , true );


//Сокращение текста
function trim_text_chars($content ,$count, $after) {
	if (mb_strlen($content) > $count) $content = mb_substr($content,0,$count);
	else $after = '';
	echo $content . $after;
}

//ACF Страница с опциями
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
	    'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки подвала',
		'parent_slug'	=> 'themes.php',
	    ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки полей страницы помощника и художника',
		'menu_title'	=> 'Поля страницы помощника и художника',
		'parent_slug'	=> 'themes.php',
	));

}


//Удаление BR из Contact form 7
//add_filter( 'wpcf7_autop_or_not', '__return_false' );

//Удаление P из Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

//Удаление CSS из Contact form 7
add_filter( 'wpcf7_load_css', '__return_false' );

//Удаление JS из Contact form 7
//add_filter( 'wpcf7_load_js', '__return_false' );

/*Contact form 7 remove span*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});



/**
 * Альтернатива wp_pagenavi. Создает ссылки пагинации на страницах архивов.
 *
 * @param array  $args      Аргументы функции
 * @param object $wp_query  Объект WP_Query на основе которого строится пагинация. По умолчанию глобальная переменная $wp_query
 *
 * @version 2.7
 * @author  Тимур Камаев
 * @link    Ссылка на страницу функции: http://wp-kama.ru/?p=8
 */
function kama_pagenavi( $args = array(), $wp_query = null ){

	// параметры по умолчанию
	$default = array(
		'before'          => '',   // Текст до навигации.
		'after'           => '',   // Текст после навигации.
		'echo'            => true, // Возвращать или выводить результат.

		'text_num_page'   => '',           // Текст перед пагинацией.
		// {current} - текущая.
		// {last} - последняя (пр: 'Страница {current} из {last}' получим: "Страница 4 из 60").
		'num_pages'       => 3,           // Сколько ссылок показывать.
		'step_link'       => 0,           // Ссылки с шагом (если 10, то: 1,2,3...10,20,30. Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…',          // Промежуточный текст "до".
		'dotright_text2'  => '…',          // Промежуточный текст "после".
		'back_text'       => '<svg width="20" height="31" viewBox="0 0 20 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 1.90469L2 15.111L18 28.3174" stroke="#212121" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',    // Текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => '<svg width="20" height="31" viewBox="0 0 20 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 28.3175L18 15.1111L2 1.90479" stroke="#212121" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',   // Текст "перейти на следующую страницу".  Ставим 0, если эта ссылка не нужна.
		'first_page_text' => 0, // Текст "к первой странице".    Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => 0,  // Текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);

	// Cовместимость с v2.5: kama_pagenavi( $before = '', $after = '', $echo = true, $args = array() )
	if( ($fargs = func_get_args()) && is_string( $fargs[0] ) ){
		$default['before'] = isset($fargs[0]) ? $fargs[0] : '';
		$default['after']  = isset($fargs[1]) ? $fargs[1] : '';
		$default['echo']   = isset($fargs[2]) ? $fargs[2] : true;
		$args              = isset($fargs[3]) ? $fargs[3] : array();
		$wp_query = $GLOBALS['wp_query']; // после определения $default!
	}

	if( ! $wp_query ){
		wp_reset_query();
		global $wp_query;
	}

	if( ! $args ) $args = array();
	if( $args instanceof WP_Query ){
		$wp_query = $args;
		$args     = array();
	}

	$default = apply_filters( 'kama_pagenavi_args', $default ); // чтобы можно было установить свои значения по умолчанию

	$rg = (object) array_merge( $default, $args );

	//$posts_per_page = (int) $wp_query->get('posts_per_page');
	$paged          = (int) $wp_query->get('paged');
	$max_page       = $wp_query->max_num_pages;

	// проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;

	if( empty( $paged ) || $paged == 0 )
		$paged = 1;

	$pages_to_show = intval( $rg->num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;

	$half_page_start = floor( $pages_to_show_minus_1/2 ); // сколько ссылок до текущей страницы
	$half_page_end   = ceil(  $pages_to_show_minus_1/2 ); // сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; // первая страница
	$end_page   = $paged + $half_page_end;   // последняя страница (условно)

	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}

	if( $start_page <= 0 )
		$start_page = 1;

	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );

	// собираем елементы
	$els = array();

	if( $rg->text_num_page ){
		$rg->text_num_page = preg_replace( '!{current}|{last}!', '%s', $rg->text_num_page );
		$els['pages'] = sprintf( '<li><a class="pages">'. $rg->text_num_page .'</a></li>', $paged, $max_page );
	}
	// назад
	if ( $rg->back_text && $paged != 1 )
		$els['prev'] = '<li><a class="prev" href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $rg->back_text .'</a></li>';
    
/*    if($els['prev'] == ''){
        $els['prev'] = '';
    }
*/    
	// в начало
	if ( $start_page >= 2 && $pages_to_show < $max_page ) {
		$els['first'] = '<li><a class="first" href="'. $first_url .'">'. ( $rg->first_page_text ?: 1 ) .'</a></li>';
		if( $rg->dotright_text && $start_page != 2 )
			$els[] = '<li><span class="extend">'. $rg->dotright_text .'</span></li>';
	}
	// пагинация
	for( $i = $start_page; $i <= $end_page; $i++ ) {
		if( $i == $paged )
			$els['current'] = '<li class="active"><a>'. $i .'</a></li>';
		elseif( $i == 1 )
			$els[] = '<li><a href="'. $first_url .'">1</a></li>';
		else
			$els[] = '<li><a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li>';
	};

	// ссылки с шагом
	$dd = 0;
	if ( $rg->step_link && $end_page < $max_page ){
		for( $i = $end_page + 1; $i <= $max_page; $i++ ){
			if( $i % $rg->step_link == 0 && $i !== $rg->num_pages ) {
				if ( ++$dd == 1 )
					$els[] = '<li><span class="extend">'. $rg->dotright_text2 .'</span></li>';
				$els[] = '<li><a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li>';
			}
		}
	}
	// в конец
	if ( $end_page < $max_page ) {
		if( $rg->dotright_text && $end_page != ($max_page-1) )
			$els[] = '<li><span class="extend">'. $rg->dotright_text2 .'</span></li>';
		$els['last'] = '<li><a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $rg->last_page_text ?: $max_page ) .'</a></li>';
	}
	// вперед
	if ( $rg->next_text && $paged != $end_page ){
		$els['next'] = '<li><a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $rg->next_text .'</a></li>';
    }

/*    if($els['next'] == ''){
        $els['next'] = '';
    }
*/
    
	$els = apply_filters( 'kama_pagenavi_elements', $els );

	$out = $rg->before . '<ul class="people__pag">'. implode( ' ', $els ) .'</ul>'. $rg->after;

	$out = apply_filters( 'kama_pagenavi', $out );

	if( $rg->echo ) echo $out;
	else return $out;
}

// минификация разметки
//require get_template_directory() . '/core/markup-minify.php';
