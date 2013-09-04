				<?php 
                session_start();
                include ('connect.php');
                if(!isset($_SESSION['login'])){
                
                    header('location:index.php');
                }
                ?>
                
               <?php 
			   echo $_GET['edit'==""];
			   {
				   $strSQL = "DELETE FROM information WHERE id = '".$_GET["edit"]."'";
				   $objQuery = mysql_query($strSQL);
				   
				   }
			   
			   
			   
			   ?>
                
                
                
                
                
                
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>procuct</title>
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
                   <a href="add2.php">เพิ่มข้อมูล</a>
                    <br>
                    <table width="574" border="1">
                <tr>
                <th width="91"> <div align="center">ID</div></th>
                <th width="160"> <div align="center">รายการสินค้า</div></th>
                <th width="198"> จำนวน</th>
                <th width="97"> <div align="center">ราคา</div></th>
                <th width="97"> <div align="center">ลบ</div></th>
                  <th width="97"> <div align="center">แก้ไข</div></th>
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
                <td><?php echo $objResult['id'];?></td>
                        <td><?php echo $objResult['type'];?></td>
                                <td><?php echo $objResult['total'];?></td>
                                        <td><?php echo $objResult['price'];?></td>
             <td align="center"><a href="product.php?edit=<?php echo  $objResult["id"]; ?>&item=<?php echo $_GET['item'];?> ">  ลบ </a></td>

             <td align="center"><a href="edit.php?fix=<?php echo $objResult["id"]; ?>&item=<?php echo $_GET['item']; ?> ">แก้ไข</a></td>
                           </tr>
                                        <?php 
                }
                                        ?>
                
                
                
                
                
                
                
                
                
               
                </table>
                    
                    </td>
                    <td width="300">&nbsp;</td>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4" align="left">Footer</td>
                  </tr>
                </table>
                </body>
                </html>