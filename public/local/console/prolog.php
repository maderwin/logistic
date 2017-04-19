<?php
/**
 * Этот файл должен подключаться в начале каждого CRON-обработчика.
 * Здесь задаются серверные переменные и подключается prolog_before.php Битрикса
 */
if ( ! $_SERVER['DOCUMENT_ROOT'] ) {
    $_SERVER['DOCUMENT_ROOT']    = realpath( dirname( __FILE__ ) . "/../../" );
}

define( "NO_KEEP_STATISTIC", true );
define( "NOT_CHECK_PERMISSIONS", true );
define( 'CHK_EVENT', true );

require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

@set_time_limit( 0 );
@ignore_user_abort( true );

if ( ! CModule::IncludeModule( "iblock" ) ) {
    die( 'Ошибка подключения модуля iblock' );
}
