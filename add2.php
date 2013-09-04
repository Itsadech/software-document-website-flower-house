	<?php 
	session_start();
	include ('connect.php');
	if(!isset($_SESSION['login'])){
	
		header('location:index.php');
	}
	?>
	
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add</title>
	</head>
	
	<body>
	<table width="83%" height="395" border="1">
	  <tr>
		<td colspan="4" align="center">herder</td>
	  </tr>
	  <tr>
		<td width="28%" align="left" valign="top"><a href="index.php">home</a></br>
		  <br />
		  <a href="product.php?item=1&amp;name=ดอกกุหลาบ">ดอกกุหลาบ</a></br>
		  <br />
		  <a href="product.php?item=2&amp;name=ดอกดาวเรื่อง">ดอกดาวเรื่อง</a> </br>
		  <br />
		  <a href="product.php?item=3&amp;name=ดอกทานตะวัน">ดอกทานตะวัน<br />
		  </a></br>
		  <a href="product.php?item=4&amp;name=ดอกส้มสีทอง">ดอกส้มสีทอง</a></br>
		  <br />
		  <a href="product.php?item=5&amp;name=ดอกบานมิรูโรย">ดอกบานมิรูโรย<br />
		  </a></br>
		  <?php 
		if(!isset($_SESSION['login']))
		{
			header('location:index.php');
		
		}else
		
		 
		{
		?>
	ยินดีต้อนรับ  :
	<?php  echo $_SESSION['login']; ?></br>
	<a href="logout.php">ออกจากระบบ</a>
	<?php 
		}
		
		?></td>
		<td width="28%" align="left" valign="top">&nbsp;
		
		 <?php 
		echo"รายการ  ". $_GET['name'].":"."หมวด".$_GET['item'];
		
		?>
	   
		<br>
		
		<?php 
if($_POST['typeproduct']==!""&&$_POST['type']==!""&&$_POST['total']==!""&&$_POST['price']==!"") 
{
$strSQL = "INSERT INTO `customer2`.`information` (`id` ,`type_product` ,`type` ,`total` ,`price`)VALUES(NULL , '".($_POST['typeproduct'])."', 
'".($_POST['type'])."', '".($_POST['total'])."', '".($_POST['price'])."');";
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$objQuery = mysql_query($strSQL);


if($objQuery)
{
echo "save OK";
}
else
{
echo "Save not OK";
}


} 
?>
		
    
    
    
        <form name="addproduct" action="" method="post">
        <form name="addproduct" action="" method="post"> 
    <table width="688" border="1">
    <tr>
    <th width="153"> <div align="center">หมวดสินค้า</div></th>
    <th width="153"> <div align="center">รายการสินค้า</div></th>
    <th width="178"> <div align="center">จำนวน</div></th>
    <th width="96"> <div align="center">ราคา </div></th>
    </tr>
    <tr>
    <td>
    <select name="typeproduct">
    <option value="0"></option>
    <option value="1">กุหลาบ</option>
    <option value="2">ดาวเรือง</option>
    <option value="3">ทานตะวัน</option>
    <option value="4">ดอกส้มสีทอง</option>
    <option value="5">ดอกบานไม่รู้โรย</option>
    </select>

    </td>
    <td><input type="text" name="type" /></td>
    <td><input type="text" name="total" /></td>
    <td><input type="text" name="price" /></td>
    </tr>
    </table>
    <input type="submit" name="submit" value="เพิ่มข้อมูล"/>
    </form>
    
    </tr>
    </table>
      </td>
    <td width="300">&nbsp;</td>
        </td>
      </tr>
    </body>
    </html>
