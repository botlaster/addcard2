<?php
//session_start();
//session_destroy();
?><html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
td{
text-align:center;
}
</style>
</head>
<?php
mysql_connect("localhost","root","password");
mysql_select_db("testaddcard");
$strSQL = "SELECT * FROM product";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
?>
<center>
<table width="450"  border="1">
  <tr>
    <td width="101" align=center>Picture</td>
    <td width="101" align=center>ProductID</td>
    <td width="82" align=center>ProductName</td>
    <td width="50" align=center>Price</td>
    <td width="100" align=center>Cart</td>
	<td width="101" align=center>Total</td>
	<td align=center>Add</td>
  </tr>
  <?php
  while($objResult = mysql_fetch_array($objQuery))
  {
  ?>
  <tr>
  <form action="order.php" method="post">
	<td><img src="img/<?php echo $objResult["Picture"];?>"></td>
    <td><?php echo $objResult["ProductID"];?></td>
    <td><?php echo $objResult["ProductName"];?></td>
    <td><?php echo $objResult["Price"];?></td>
	<input type="hidden" id="b" value="<?=$objResult['Price']?>">
    <td><input type="hidden" name="txtProductID" value="<?php echo $objResult["ProductID"];?>" size="2">
	<select name="txtQty" onchange="abc(this);">
		<?php for($qty=1;$qty<=20;$qty++)
	  {
	  ?>
		<option value="<?php echo $qty ?>"><?php echo $qty;?></option>
		<?php
	  }
	  ?>
	</select>
	</td>
	<td>
	<div id="a"><?=$objResult["Price"];?></div>
	</td>
	<td>
	<input type="submit" value="Add">
	</td>
	</form>
  </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
<?php
mysql_close();
?>
<script>
function abc(data)
{
	var a = data.value;
	var b = document.getElementById("b").value;
	var c = b*a;
	document.getElementById("a").innerHTML=c;
}
</script>
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>