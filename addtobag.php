<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIATYSHOP SHOPPINGBAG</title>
</head>

<body>
<p>
  <?
		$userid = $_SESSION["userid"];
		$itemid = $_SESSION["Cnumber"];
		$amount = $_POST['number'];
	    
		$link = mysql_connect('localhost','S0161044','1044') or die ('connect die');
		mysql_select_db('S0161044') or die ('select db die');
		
		$sqlstr2 = "select * from commodity where Number = '$itemid';";
	    $result2 = mysql_query($sqlstr2);
	    $row2 = mysql_fetch_row($result2);
	    $price = $row2[0];
		$total = $amount*$price;
		
		$sqlstr3 = "select * from shoppingcart where C_AccountNumber='$userid';";
		$result3 = mysql_query($sqlstr3)or die ('die');
		$row6 = mysql_num_rows($result3);
		
		if($userid!=null){
		if($row6 > 0){
			for($i=0; $i<$row6; $i++){
				$array = mysql_fetch_array($result3, MYSQL_NUM);
				$temp = $array[1];
				$max = 0;
				if($temp > $max)
				    $max = $temp;
			}
			$sqlstr9 = "select * from include where S_Number = '$max';";
	        $result9 = mysql_query($sqlstr9)or die ('die');
			$row3 = mysql_num_rows($result9);
			if($row3>0){
			$S_number = $max;
			$bool = true;
			$row6  = -1;
			}
			if($row3==0){
			$bool = false;
			}
		}
		if($row6 == 0 || !$bool){
			$sqlster = "select * from shoppingcart;";
		    $result = mysql_query($sqlster)or die ('die');
	        $row = mysql_num_rows($result);
	    	$row +=1;
			$S_number = $row;
			
			$sqlstr10 = "insert into shoppingcart values('".$userid."','".$S_number."','0');";
	        $result10 = mysql_query($sqlstr10)or die ('die');
			
		}
		
		$_SESSION["S_number"] = $S_number;
		
		$sqlstr7 = "select * from include where C_Number='$itemid' and S_Number = '$S_number';";
		$result7 = mysql_query($sqlstr7)or die ('die');
		$row5 = mysql_fetch_row($result7);
		$row7 = mysql_num_rows($result7);
		if($row7 == 0){
		$sqlster1 = "insert into include values('".$S_number."','".$itemid."','".$amount."');";
    	$result1 = mysql_query($sqlster1)or die ('insert die');
		}
		else{
			$N = $row5[2];
			$amount+=$N;
			$sqlstr8 = "UPDATE  `s0161044`.`include` SET  `Amount` =  '$amount' WHERE  `include`.`S_Number` = '$S_number' AND  `include`.`C_Number` = '$itemid' LIMIT 1 ;";
			$result8 = mysql_query($sqlstr8)or die ('update die');
		}
		$sqlstr4 = "select * from shoppingcart where C_AccountNumber = '$userid' and Number = '$S_number';";
		if($sqlstr4){
			$result4 = mysql_query($sqlstr4);
			$row4 = mysql_fetch_row($result4);
			$test = $row4[2];
			$total += $row4[2];
			$sqlstr5 = "UPDATE  `s0161044`.`shoppingcart`  SET `TotalPrice` =  '$total' where CONVERT(  `shoppingcart`.`C_AccountNumber` USING utf8 ) = '$userid' AND `shoppingcart`.`Number` = '$S_number' AND `shoppingcart`.`TotalPrice` = '$test' LIMIT 1;";
			$result5 = mysql_query($sqlstr5)or die ('update die');
		}
		if(!$sqlstr4){
			$sqlster6 = "insert into shoppingcart values('".$userid."','".$S_number."','".$total."');";
			$result6 = mysql_query($sqlster6)or die ('insert die');
		}
		
		mysql_close($link)or die ('close die');
		
		echo('訂購成功');
		echo "<a href='main.php'> 回首頁,如未動作系統將於1秒後自動跳轉 </a>";
		?>
        <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/main.php" />
        <?php
		}
		else{
			echo('訂購失敗，請先登入/註冊會員');
		    echo "<a href='login.php'> 前往登入/註冊頁面,如未動作系統將於1秒後自動跳轉 </a>";
		}
	    ?>
        <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/login.php" />
        <?php
		?>
</p>
</body>
</html>