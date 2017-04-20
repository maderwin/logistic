<?php if ( ! defined( "B_PROLOG_INCLUDED" ) || B_PROLOG_INCLUDED !== true ) {
    die();
}

/* ENVIRONMENT */
if ( getenv( 'APPLICATION_ENV' ) ) {
    define( 'APPLICATION_ENV', getenv( 'APPLICATION_ENV' ) );
} else {
    define( 'APPLICATION_ENV', "production" );
}

if(APPLICATION_ENV == 'development'){
    ini_set( "xdebug.var_display_max_depth", - 1 );
    ini_set( "xdebug.var_display_max_children", - 1 );
    ini_set( "xdebug.var_display_max_data", - 1 );
}

ini_set('soap.wsdl_cache_ttl', '0');
mb_internal_encoding( 'UTF-8' );

/* APP PATHS */
define( "P_APP", "/local/" );

define( "P_ASSETS", P_APP . "assets/" );
define( "P_CSS", P_ASSETS . "css/" );
define( "P_JS", P_ASSETS . "js/" );
define( "P_IMAGES", P_ASSETS . "images/" );
define( "P_FONTS", P_ASSETS . "fonts/" );

define( "P_UPLOAD", "/" . COption::GetOptionString( "main", "upload_dir", "upload" ) . "/" );

define( "P_DR", \Bitrix\Main\Application::getDocumentRoot() );
define( "P_APP_PATH", P_DR . P_APP );

define( "P_LOCALES", P_APP_PATH . "locales/" );
define( "P_LAYOUT", P_APP_PATH . "layout/" );
define( "P_INCLUDE", P_APP . "include_area/" );
define( "P_VENDOR", P_APP_PATH . "vendor/" );
define( "P_CLASSES", P_APP_PATH . "classes/" );
define( "P_LOG", P_APP_PATH . "logs/" );

/* IB IDS */

define('HL_OPTION', 1);

define('IB_CONTENT_THEME', 10);
define('IB_CONTENT_SPECIAL', 9);
define('IB_CONTENT_PRESS', 6);
define('IB_CONTENT_NEWS', 5);
define('IB_CONTENT_INTERVIEW', 4);
define('IB_CONTENT_COMPANY', 3);
define('IB_CONTENT_ARTICLE', 2);
define('IB_CONTENT_EVENT', 11);

define('IB_DICT_SOURCES', 8);
define('IB_DICT_REGION', 7);

// Log
define("LOG_FILENAME", P_LOG . "log" . date("Ymd_Hi") . ".log");

