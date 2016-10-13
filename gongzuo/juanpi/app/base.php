<?php

ini_set("error_reporting",E_ALL ^ E_NOTICE);

class base{


 	protected $_rw_lnk = null;




	static function run(){




		//查询操作
		$sql="select * from sdb_obj_goods;";
		$data=self::select($sql);
		$sqll="select * from sdb_obj_goods limit 0,4;";
		$data_top=self::select($sqll);
		// echo "<pre>";
		// var_dump($data);
		require('test.php');



		//插入操作

		// $pam = array(
		// 	'name' => '测试商品',
		// 	'pic'=>'http://img01.taobaocdn.com/bao/uploaded/i1/2731706960/TB24Oana1_yQeBjy0FlXXczrXXa_!!2731706960.jpg_400x400.jpg',
		// 	'price'=>'100',
		// 	'uptime'=>time(),
		// 	'downtime'=>time(),
		// 	'obj'=>'http://www.baidu.com',
		// 	'p_order'=>'1',
		// );
		// self::insert($pam);





	}

	static function select($sql=null){

		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', 'root');



		$rs = $db->query($sql);
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $rs->fetchAll();



		$db = null;
		return $rows;
	}


	static function insert($pam=null){




		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', 'root');

		foreach($pam as $key => $val){

			$str .= "`".$key."`,";
			$str2 .= "\"".$val."\",";


		}
		$str=substr($str,0,-1);
		$str2=substr($str2,0,-1);

		$sql = "INSERT INTO `sdb_obj_goods` ($str) VALUES ($str2)";
 
		$db->exec($sql);

		$id=$db->lastInsertId();



		$db = null;

		if($id){
			echo "插入成功";
		}else{
			echo "插入失败";
		}



	}



}