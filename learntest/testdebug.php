<?php




		$string=file_get_contents('debug.txt');
		$array=explode("\n",$string);
		$data=array_unique($array);
		$echo_string=implode("\n",$data);
		//error_log($echo_string,3,'debug.txt2');