<?php
// disable show error
//error_reporting(0);  // disable all errors
error_reporting(E_ALL); // view all errors

$Page_time_started_at = microtime(true);
// make it or break it


// begin output buffering
ob_start();

require_once("includes/connection.php");
require_once("template/functions.php");
require_once("template/lang.php");
require_once("template/page_start_vars.php");



?>