<?php
define("URL_SEPARATOR", '/');
define("DS", DIRECTORY_SEPARATOR);

defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT.DS);

require_once LIB_PATH_INC.'dbconnection.php';
require_once LIB_PATH_INC.'check_login.php';
$user_id = 0;
$remote_ip = 0;
$action =  '';
$description = "testing";
if (isset( $_SESSION['visaid'] )) {
    $user_id = $_SESSION['visaid'];
}
if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
    $remote_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    if ( strpos( $remote_ip, "," ) > 0 ) {
        $remote_ip_for = explode( ",", $remote_ip );
        $remote_ip = $remote_ip_for[0];
    }
} else {

    if (isset( $_SERVER['REMOTE_ADDR'] )) {
        $remote_ip = $_SERVER['REMOTE_ADDR'];
    }

}

if (isset( $_SERVER['REQUEST_URI'] )) {
    $action = $_SERVER['REQUEST_URI'];
    $action = preg_replace('/^.+[\\\\\\/]/', '', $action);
    //$action = preg_replace('/^\/inventory/', '', $action);
}

logAction($action , $description, $remote_ip,$user_id);


?>