<?php
session_start();
include('connect.php');
if(!isset($_SESSION['login']))
{
header('location:index.php');

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
</head>

<body>
<table width="947" height="752" border="1" align="center">
<tr>
<td height="133" colspan="3">Header</td>
</tr>
<tr>
<td width="108" height="524" align="left" valign="top">
<br>
<a href="index.php">HOME</a><br/>
<a href="product.php?item=1&name=ดอกกุหลาบ">ดอกกุหลาบ</a><br/>
<a href="product.php?item=2&name=ดอกดาวเรือง">ดอกดาวเรือง</a><br/>
<a href="product.php?item=3&name=ดอกทานตะวัน">ดอกทานตะวัน</a><br/>
<a href="product.php?item=4&name=ดอกส้มสีทอง">ดาวส้มสีทอง</a><br/>
<a href="product.php?item=5&name=ดอกบานไม่รู้โรย">ดอกบานไม่รู้โรย</a><br/>

<?php
if(!isset($_SESSION['login']))
{

header('location:index.php');

}else
{
?>
ยินดีต้องรับ : <?php echo $_SESSION['login']; ?><br>
<a href="logout.php">ออกจากระบบ</a>
<?php
}
?> 



</td>
<td width="687" align="left" valign="top">

<br>

<?php 
if($_POST['typeproduct']==!""&&$_POST['type']==!""&&$_POST['total']==!""&&$_POST['price']==!"") 
{
$strSQL = "UPDATE information SET ";
$strSQL .="type_product =  '".$_POST['typeproduct']."' ";
$strSQL .=",type  =  '".$_POST['type']."' ";
$strSQL .=",total =  '".$_POST['total']."' ";
$strSQL .=",price =  '".$_POST['price']."' ";
$strSQL .="WHERE id =  '".$_GET['fix']."' ";



mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$objQuery = mysql_query($strSQL);


if($objQuery)
{
echo "แก้ไขเรียบร้อย";
}
else
{
echo "แก้ไขผิดพลาด";
}


} 
?>

<form name="update" action="" method="post"> 
<table width="688" border="1">
<tr>
<th width="153"> <div align="center">หมวดสินค้า</div></th>
<th width="153"> <div align="center">รายการสินค้า</div></th>
<th width="178"> <div align="center">จำนวน</div></th>
<th width="96"> <div align="center">ราคา </div></th>
</tr>
<tr>
<?php 
$strSQL = "SELECT * FROM information WHERE id = '".$_GET['fix']."' ";

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$objQuery = mysql_query($strSQL); 
$objResult = mysql_fetch_array($objQuery);
?> 
<td>
<input type="text" name="typeproduct" value="<?php echo $objResult["type_product"]; ?> " />


</td>
<td><input type="text" name="type" value="<?php echo $objResult["type"]; ?> " /></td>
<td><input type="text" name="total" value="<?php echo $objResult["total"]; ?> " /></td>
<td><input type="text" name="price" value="<?php echo $objResult["price"]; ?> " /></td>
</tr>
</table>
<input type="submit" name="submit" value="อัตเดตข้อมูล" />
</form> 
</td>
<td width="130">&nbsp;</td>
</tr>
<tr>
<td height="85" colspan="3">Footer</td>
</tr>
</table>
</body>
</html>