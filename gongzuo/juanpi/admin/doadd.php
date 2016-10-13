<?php

		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', 'root');



		foreach($_POST['pam'] as $pam){
			$str=null;
			$str2=null;
			foreach($pam as $key => $val){

				$str .= "`".$key."`,";
				$str2 .= "\"".$val."\",";


			}
			$str=substr($str,0,-1);
			$str2=substr($str2,0,-1);

			$sql = "INSERT INTO `sdb_obj_goods` ($str) VALUES ($str2)";

			$db->exec($sql);

		}


		$db = null;

		header("Location:http://localhost/learn/gongzuo/juanpi/admin");