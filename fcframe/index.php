<?php
/**
 *  fcframe
 *  2016.03.31  by  fengcong
 */

error_reporting(E_ALL ^ E_NOTICE);

define('ROOT_DIR',realpath(dirname(__FILE__)));
define('DEBUG_PHP',true);
require(ROOT_DIR.'/app/base/kernel.php');

kernel::run();


?>
