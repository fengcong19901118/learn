<?php

		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', 'root');


		foreach($_POST['pam'] as $pam){
			$str=null;
			$str2=null;
			$str3=null;

			foreach($pam as $key => $val){

				$str .= "`".$key."`=\"".$val."\",";

			}
			$str=substr($str,0,-1);
			$str2=substr($str2,0,-1);

			$sql = "update `sdb_obj_goods` SET $str WHERE goods_id = $pam[goods_id]";

			$db->exec($sql);

		}


		$db = null;

		header("Location:http://localhost/learn/gongzuo/juanpi/admin");