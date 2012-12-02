<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'evolab');

/** Имя пользователя MySQL */
define('DB_USER', 'admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'andromeda');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SOw%^5bfsvC;n)Cw!uWx|Et>5i/NjgA@7<#F25C.=&-B{uSq$qIxu[xJ>d}Lo,gJ');
define('SECURE_AUTH_KEY',  ')_XA{gr^fHA4x@va[X68-i> ~Fd:TLM.$J9-8z.PWsPp~jv8>m@Q~efg^G%OK-9x');
define('LOGGED_IN_KEY',    '1,5j8i]Jl4l501OiAm+_o?kCZIjtt<t<%NlU)SKbD`o|P,hp.ig#oyOzeVdl[5*E');
define('NONCE_KEY',        '[+X1} =TQC+rg)POW8eo7Y+(8WP|ro#t}o3w7B[WhV(E[gLk aXg&<yQ/?;+WJ]8');
define('AUTH_SALT',        'l csp@/-%b7EHD3;NPmN:mU}utiEp_O@D pzY+RojJ<)cC-%etUoSd,G`VW]@mT,');
define('SECURE_AUTH_SALT', 'l}+.^E$*psxu%i|UYQa5so1xr}T_?lk{FzCbPcuCCxm;:e%6[0zyPI(mVv{`P=Q3');
define('LOGGED_IN_SALT',   'og&oQl4X#7)=1ydv}Up_x{a<H?tqa{[aO6}bF|M+~s1diDZ8=lkfU|$IuCBmL<_N');
define('NONCE_SALT',       '#fA&3eUlOaF.6rJt;FPV3VAP3GQ]t[Hc0BQl{h`G[*.w21&3; .*C68s5b#}v{O&');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'el_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
