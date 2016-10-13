<?php


if(!move_uploaded_file($_FILES['file']['tmp_name'], "data/".$_FILES['file']['name'])){
	echo "上传失败，请重新上传";
	exit;
}


$file=file_get_contents("data/".$_FILES['file']['name']);

$file=iconv("gb18030","utf-8", $file);

$array=explode("\r\n", $file);

foreach($array as &$val){

	$val=explode(",", $val);

}
unset($val);



$list=array_shift($array);

$dsn = "mysql:host=localhost;dbname=test";
$db = new PDO($dsn, 'root', 'root');

$str=null;

foreach($list as $val){

		if($val==="品名"){
			$str.="`name`,";
		}elseif($val=="主图"){
			$str.="`pic`,";
		}elseif($val=="价格"){
			$str.="`price`,";
		}elseif($val=="月销量"){
			$str.="`p_order`,";
		}elseif($val=="活动开始时间"){
			$str.="`uptime`,";
		}elseif($val=="活动结束时间"){
			$str.="`downtime`,";
		}elseif($val=="链接"){
			$str.="`obj`,";
		}

}

echo "<pre>";

$str=substr($str,0,-1);
if($str){
	$db->exec("truncate table sdb_obj_goods");
	echo "清空数据库成功";
}

foreach($array as $key => $val){
		$str2=null;

		foreach($val as $v){
			$str2.="\"".$v."\",";
		}


		$str2=substr($str2,0,-1);



		$sql = "INSERT INTO `sdb_obj_goods` ($str) VALUES ($str2)";
		$db->exec($sql);
		echo $sql;
		echo $key."<br>";


}



		$db = null;
echo "完成";