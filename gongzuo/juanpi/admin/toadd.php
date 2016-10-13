<html>
<body>
<form action="doadd.php" method="post">

<table>
<tr>
	<th>商品计数</th>
	<th>品名</th>
	<th>主图</th>
	<th>价格</th>
	<th>月销量</th>
	<th>活动开始时间</th>
	<th>活动结束时间</th>
	<th>链接</th>
</tr>

<?php  for($i=1;$i<=$_POST["num"];$i++){   ?>
<tr>
	<th><?php echo $i; ?>.</th>
	<th><input type="text" name="pam[<?php echo $i; ?>][name]"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][pic]"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][price]"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][p_order]"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][uptime]" placeholder="2016/09/19"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][downtime]" placeholder="2016/09/19"/></th>
	<th><input type="text" name="pam[<?php echo $i; ?>][obj]"/></th>
</tr>

<?php } ?>
<tr>
	<th colspan="9"><input type="submit" value="提交" /></th>
</tr>
</table>



</form>

</body>
</html>