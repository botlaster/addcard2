<?php
//session_start();
//session_destroy();
?><html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
mysql_connect("localhost","root","root");
mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM product";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
?>
<table width="450"  border="1">
  <tr>
    <td width="101">Picture</td>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="50">Price</td>
    <td width="100">Cart</td>
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
    <td><input type="hidden" name="txtProductID" value="<?php echo $objResult["ProductID"];?>" size="2"> <input type="text" name="txtQty" value="1" size="2"> <input type="submit" value="Add"></td>
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
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>