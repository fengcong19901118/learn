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

// function __autoload($class_name){
// 	return require_once $class_name.".php";
// }

// function call_func($a,$b){

// 	return call_user_func_array($a, $b);

// }



// class index{
// 	public function test1($a,$b){

// 		echo $b.",".$a;

// 	}

// 	public function test2($a,$b,$c){

// 		echo $b.",".$a.",".$c;

// 	}
// }
// set_error_handler('exception_error_handler');

// function exception_error_handler($errno, $errstr, $errfile, $errline )
// {
//     switch ($errno) {
//         case E_ERROR:
//         case E_USER_ERROR:
//             echo sprintf('error: %s, severity:%s, file:%s, line:%s', $errstr, $errno, $errfile, $errline);
//             throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
//         break;
//         case E_STRICT:
//         case E_USER_WARNING:
//         case E_USER_NOTICE:
//         default:
//             //do nothing
//         break;
//     }
//     return true;
// }
// call_func(array('index','test2'),array('111','222','333'));

// $haha= new index;

// $haha->test2('aaa','bbb','ccc');

?>
