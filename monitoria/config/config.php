<?php
/** O nome do banco de dados*/
define('DB_NAME', 'wda_crud');
/**
 * Usuário do banco de dados MySQL
 */
define('DB_USER', 'root');
/**
 * Senha do banco de dados MySQL
 */
define('DB_PASSWORD', '');
/**
 * nome do host do MySQL
 */
define('DB_HOST', 'localhost');
/**
 * caminho absoluto para a pasta do sistema *
 */

/**
 * caminho no server para o sistema *
 */
if (!defined('BASEURL')) {
    define('BASEURL', '/monitoria/');
}

if (!defined('ASSETS')) {
    define('ASSETS', BASEURL . '/public/');
}

if (!defined('RESOURCES')) {
    define('RESOURCES', BASEURL . 'resources/');
}

if (!defined('VIEWS')) {
    define('VIEWS', BASEURL . 'templates/');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/../');
}

/**
 * caminho do arquivo de banco de dados *
 */
if (!defined('DBAPI')) {
    define('DBAPI', ABSPATH . 'database/database.php');
}

if (!defined('APP')) {
    define('APP', ABSPATH . 'app/');
}

/**
 * caminhos dos templates de header e footer *
 */
define('HEADER_TEMPLATE', ABSPATH . 'resources/views/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'resources/views/footer.php');