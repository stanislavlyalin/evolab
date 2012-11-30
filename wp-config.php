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
define('AUTH_KEY',         '4:ox@?C},S>$yp-EOH4@+~y<D.>D}CN%{bwZT3MlrPg[T^=3|%J5bd?L.!a<JD|)');
define('SECURE_AUTH_KEY',  '!k/^V|+u+=?$7)HUlKT*A`Ru/:h-yP7ks B1(zNkm>2Wql&q,dK9h>BbMd`$lDLH');
define('LOGGED_IN_KEY',    '*O!{*-I[n1;dqmsH2?-*^@|eSfvxPdD~&V8=/+nT2bN#u{Ty:]|OIlr!%pcNOi#)');
define('NONCE_KEY',        '&FI%_H|88I]C4UZfUX+Xu9%hv `aK!-4$rwK6XM$0k<u;G|!e2(G@8k#!yf^|:R9');
define('AUTH_SALT',        '7thN9&zT+H`B?YxM0f=eS8jK~0x1^::X@t_)Z)<}]j[w]0a-nBS@H=P73,>8-9?N');
define('SECURE_AUTH_SALT', ';Yy;&?DYdUs:l,zEK S,Wr$J5+,,fqY*H&0p./>,/*~)#|@]f`kB:_<X|p>] -7r');
define('LOGGED_IN_SALT',   '--BOP4&+htpNB~|VDwQphMU~@g|O+Mpe6)=4gm@Mn^uFB>( +7p-_CF}Uw8O4tw7');
define('NONCE_SALT',       'OS5=Sdzc[- 40B]Y{{Wyk=mcjq+ks(-iNr?<JS%S$.r`2n~?Nx_=(k$c=w;k!l7@');

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
