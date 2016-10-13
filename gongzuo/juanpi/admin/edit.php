<?php


		$sql="select * from sdb_obj_goods;";
		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', 'root');



		$rs = $db->query($sql);
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $rs->fetchAll();



		$db = null;

		$count=count($rows);

?>

<html>
<body>
<form action="doedit.php" method="post">

<table>
<tr>
	<th>商品编号</th>
	<th>品名</th>
	<th>主图</th>
	<th>价格</th>
	<th>月销量</th>
	<th>活动开始时间</th>
	<th>活动结束时间</th>
	<th>链接</th>
</tr>

<?php  for($i=0;$i<$count;$i++){   ?>
<tr>
	<input name="pam[<?php echo $i; ?>][goods_id]" type="hidden"  value="<?php echo $rows[$i]['goods_id']; ?>"  />
	<th><?php echo $rows[$i]['goods_id']; ?>.</th>
	<th><input type="text" name="pam[<?php echo $i; ?>][name]" value="<?php echo $rows[$i]['name']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][pic]" value="<?php echo $rows[$i]['pic']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][price]"  value="<?php echo $rows[$i]['price']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][p_order]"  value="<?php echo $rows[$i]['p_order']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][uptime]" placeholder="2016/09/19"  value="<?php echo $rows[$i]['uptime']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][downtime]" placeholder="2016/09/19"  value="<?php echo $rows[$i]['downtime']; ?>" /></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][obj]"  value="<?php echo $rows[$i]['obj']; ?>" /></th>
</tr>

<?php } ?>
<tr>
	<th colspan="9"><input type="submit" value="提交" /></th>
</tr>
</table>



</form>

</body>
</html>

