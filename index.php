//ทดสอบการใช้ githup วันที่ 4 กันยายน 2556
<?php 
session_start();
include ('connect.php');
if (!$con){
	echo "connect EEROR";

}else {
	echo "connect OK";
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JAck</title>
</head>

<body>
<table width="83%" height="395" border="1">
  <tr>
    <td colspan="3" align="center">herder</td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top">
    
     <a href="product.php">home</a></br>
    
      <a href="product.php?item=1&amp;name=ดอกกุหลาบ">ดอกกุหลาบ</a></br>
      <a href="product.php?item=2&amp;name=ดอกดาวเรื่อง">ดอกดาวเรื่อง</a> </br>
      <a href="product.php?item=3&amp;name=ดอกทานตะวัน">ดอกทานตะวัน</a></br>
     <a href="product.php?item=4&amp;name=ดอกส้มสีทอง">ดอกส้มสีทอง</a></br>
      <a href="product.php?item=5&amp;name=ดอกบานมิรูโรย">ดอกบานมิรูโรย</a></br>
    <br><br>
    
    
    
   <?php 

   
   $loginname = $_POST['username'];
   $password = $_POST['password'];

     if($loginname==!""&&$password==!"")
    {
   $strSQL = "SELECT * FROM account WHERE username = '".trim($loginname)."'and password = '".trim($password)."'";
   $objQuery = mysql_query($strSQL);
    $objResult = mysql_fetch_array($objQuery);

   if($objResult){
     echo "Welcome";
     $_SESSION['login'] = $loginname;
    header('location:product.php');

     }else {
      echo "login Error !";
       }

	  
	}
   /*/if($loginname==!""&&$pass==!"")
   {
    if (($loginname == $idname)&& ($pass == $idpass))
	{
		echo "Welcomw";
		$_SESSION['login'] = "admin";
		header ('location:index.php');
		
		
		
		
		}else
		{
		   echo "login error";
    
        }
   }
    /*/
	if(!isset($_SESSION['login']))
	{
	
	
	
	?>
    
    
    
    
    <form name ="login" action="" method="post">
    
    <label>ชื่อผู้ใช้งาน</label><br>
<input type="text" name="username" /><br>
 <label>รหัสผู้ใช้งาน</label>
<input type="password" name="password" /><br>
<input type="submit" name="submit"value="เข้าใช้งานระบบ"/>

</form>

    <?php
    }else
	{
    ?>
    
    ยินดีต้อนรับ  : <?php  echo $_POST['login']; ?>
    <a href="logout.php">ออกจากระบบ</a>
    <?php
	
	
    }
		
			
		

	?>
    
    </td>

    <td width="83%" align="left" valign="top">conten
     <table width="662" border="1">
                <tr>
                <th width="91" align="center"> <div align="center">ID</div></th>
                <th width="160" align="center"> <div align="center">รายการสินค้า</div></th>
                <th width="198" align="center"> จำนวน</th>
                <th width="97" align="center"> <div align="center">ราคา</div></th>
            
                </tr>
                
                  
                
                
                <?php 
				
				if ($_GET['item']==!"")
				{
                 $strSQL = "SELECT * FROM information WHERE type_product ='".$_GET['item']."'";	
                 mysql_query("SET character_set_results=utf8");
  				 mysql_query("SET character_set_client=utf8");
    			 mysql_query("SET character_set_connection=utf8");	
                 $objQuery = mysql_query($strSQL);
                
				}else{
					 $strSQL = "SELECT * FROM information ";	
                 mysql_query("SET character_set_results=utf8");
  				 mysql_query("SET character_set_client=utf8");
    			 mysql_query("SET character_set_connection=utf8");	
                 $objQuery = mysql_query($strSQL);
					
					}
                ?>
                
                <?php
                while ($objResult = mysql_fetch_array($objQuery))
                {
                
                
                
                ?>
                <tr>
                <td align="center"><?php echo $objResult['id'];?></td>
          <td align="center"><?php echo $objResult['type'];?></td>
          <td align="center"><?php echo $objResult['total'];?></td>
                                        <td align="center"><?php echo $objResult['price'];?></td>

                                        </tr>
                                        <?php 
                }
                                        ?>
                
                
                
                
                
                
                
                
                
               
                </table>
    <?php 
    echo $_GET['name'].":"."หมวด".$_GET['item'];
    
    ?>
    
    
    
    </td>
  </tr>
  <tr>
    <td colspan="3" align="left">Footer</td>
  </tr>
</table>
</body>
</html>

<?php 


mysql_close($con);


?>