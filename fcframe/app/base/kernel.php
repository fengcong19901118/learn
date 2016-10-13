<?php
/**
 *  fcframe
 *  2016.03.31  by  fengcong
 */

if(!defined('APP_DIR')){
    define('APP_DIR',ROOT_DIR.'/app');
}
if(!defined('PUBLIC_DIR')){
    define('PUBLIC_DIR',ROOT_DIR.'/public');
}


class kernel{




		static function run(){
				set_error_handler(array('kernel', 'exception_error_handler'));

            try {
      			$file_path=dirname(__FILE__) . '/test_try_catch.php';
						if (file_exists($file_path)) {
								require ($file_path);
						} else {
								throw new Exception('file ' . $file_path . ' is not exists');
						}
						$file_path2=dirname(__FILE__) . '/test_try_catch2.php';
						if (file_exists($file_path2)) {
								require ($file_path2);
						} else {
								throw new Exception('file ' . $file_path2 . ' is not exists');
						}
					} catch (Exception $e) {
						self::exception_handler($e);
				}




		}


	static public function exception_handler($exception) {
        if (defined('DEBUG_PHP') && constant('DEBUG_PHP')===true) {
            self::_exception_handler($exception);
            
        }else{
            self::system_crash();
        }
    }
    
    static private function _exception_handler($exception){

        $message = $exception->getMessage();
        
        $code = $exception->getCode();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $trace = $exception->getTrace();
        $trace_message = $exception->getTraceAsString();

        $trace_message = null;
        
        $root_path = realpath(ROOT_DIR);

        $output = ob_end_clean();
        
        $position = str_replace($root_path,'&gt; &nbsp;',$file).':'.$line;

        $i=0;
        foreach($trace as $t){
            if(!($t['class']=='kernel' && $t['function']=='exception_error_handler')){
                $t['file'] = str_replace($root_path,'ROOT:',$t['file']);
                $basename = basename($t['file']);
                if($i==0){
                    $trace_message .= '<tr class="code" style="color:#000"><td><b>&gt;&nbsp;</b></td>';
                }else{
                    $trace_message .= '<tr class="code" style="color:#999"><td></td>';
                }
                if($t['args']){
                    //                            var_dump(debug_backtrace());
                    $args = array();
                    foreach($t['args'] as $arg_info){
                        if (is_array($arg_info) || (is_string($arg_info) && strlen($arg_info)>20)) {
                            $args[] = "<span class=\"lnk\" onclick=\"alert(this.nextSibling.innerHTML)\">...</span><span style='display:none'>".self::_var_export($arg_info)."</span>";
                        }else if(is_object($arg_info)){
                            $arg_detail = self::_var_export($arg_info);
                            $arg_info = get_class($arg_info);                                
                            $args[
                            ] = "object(<span class=\"lnk\" onclick=\"alert(this.nextSibling.innerHTML)\">$arg_info</span><span style='display:none'>$arg_detail</span>)";
                        }else{
                            $args[] = var_export(htmlspecialchars($arg_info),1);
                        }
                    }
                    $args = implode(',', $args);                    
                }else{
                    $args = '';
                }
                if($t['line']){
                    $trace_message .= "<td>#{$i}</td><td>{$t['class']}{$t['type']}{$t['function']}({$args})</td><td>{$basename}:{$t['line']}</td></tr>";
                }else{
                    $trace_message .= "<td>#{$i}</td><td>{$t['class']}{$t['type']}{$t['function']}({$args})</td><td>{$basename}</td></tr>";
                }
                $i++;
            }
        }
        
        $output=<<<EOF
        <p style="background:#eee;border:1px solid #ccc;padding:10px;margin:10px 0">$message</p>
        <div style="padding:10px 0;font-weight:bold;color:#000">$position</div>
        <table cellspacing="0" cellpadding='0' style="width:100%;">
        $trace_message
        </table>
EOF;

        echo $output;
    }

    static function system_crash() {
        echo '服务异常稍后再试';        
    }

	static function exception_error_handler($errno, $errstr, $errfile, $errline )
    {
        switch ($errno) {
            case E_ERROR:
            case E_USER_ERROR:
                logger::error(sprintf('error: %s, severity:%s, file:%s, line:%s', $errstr, $errno, $errfile, $errline));
                throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
            break;
            case E_STRICT:
            case E_USER_WARNING:
            case E_USER_NOTICE:
            default:
                //do nothing
            break;
        }
        return true;
    }//End Function
}















?>