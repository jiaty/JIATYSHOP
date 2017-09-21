<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIATYSHOP ORDER</title>
</head>

<body>
<p>
  <?
		$userid = $_SESSION["userid"];
		$shipway = $_POST['select'];
		$S_number = $_SESSION["S_number"];
	    
		$link = mysql_connect('localhost','S0161044','1044') or die ('connect die');
		mysql_select_db('S0161044') or die ('select db die');
		
		$sqlstr = "select * from shoppingcart where C_AccountNumber = '$userid' and Number = '$S_number';";
	    $result = mysql_query($sqlstr)or die ('die');
		$sentable = mysql_num_rows($result);
		
		if($sentable > 0){
	    $row = mysql_fetch_row($result);
	    $TotalPrice = $row[2];
		
		$sqlstr2 = "SELECT * FROM  `order` ;";
	    $result2 = mysql_query($sqlstr2)or die ('order number die');
		$ON = mysql_num_rows($result2);
		$ON +=1;
		
		$sqlstr1 = "INSERT INTO `s0161044`.`order` (`S_Number`, `Number`, `TotalPrice`, `ShippingMethod`) VALUES ('".$S_number."', '".$ON."', '".$TotalPrice."', '".$shipway."');";
    	$result1 = mysql_query($sqlstr1)or die ('insert die');
		
		$sqlstr3 = "SELECT * FROM  `include` ;";
	    $result3 = mysql_query($sqlstr3)or die ('N die');
		$N = mysql_num_rows($result3);
		
		$sqlstr3 = "DELETE FROM `include` WHERE `include`.`S_Number` = '".$S_number."';";
		$result3 = mysql_query($sqlstr3)or die ('delete die');
		
		echo('送出訂單成功');
		echo "<a href='membercenter.php'> 查看訂單,如未動作系統將於1秒後自動跳轉 </a>";
		?>
        <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/membercenter.php" />
        <?php
		}
		
		else{
            echo('ERROR! 請先選購商品');
		    echo "<a href='main.php'> 回首頁,如未動作系統將於1秒後自動跳轉 </a>";
		    ?>
            <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/main.php" />
            <?php
		}
		
		mysql_close($link)or die ('close die');
		
		?>
</p>
</body>
</html>