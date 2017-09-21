<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIATYSHOP LOGIN</title>
</head>

<body>

<?php
	$MINID = $_POST['id'];
	$MINPD = $_POST['pd'];
	
	$link = mysql_connect('localhost','S0161044','1044') or die ('connect fail');
	mysql_select_db('S0161044') or die ('select db fail');
	
	$sqlstr = "select * from customer where AccountNumber = '".$MINID."'and Password = '".$MINPD."';";
	$result = mysql_query($sqlstr);
				
	if (mysql_num_rows($result)==1)
		{
			echo "Welcome success</br>";
			$_SESSION["userid"]=$MINID;
			$_SESSION["MM_Username"]=$MINID;
			$rows = mysql_fetch_row($result);
			$MINNN = $rows[1];
			$_SESSION["usernickname"]=$MINNN;
			echo "<a href='main.php'> 開始購買,如未動作系統將於1秒後自動跳轉 </a>";
			?>
            <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/main.php" />
            <?php
		}
	else
		{
			echo "Failed login</br>";
			echo "<a href='login.php'> 帳號或密碼錯誤，請先加入會員。如未動作系統將於2秒後自動跳轉 </a>";
			?>
            <meta http-equiv="refresh" content="2;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/login.php" />
            <?php
		}
	
	mysql_free_result($result);	 //釋放查詢結果所佔用的記憶體

    mysql_close($link);         //關閉資料庫
?>

</body>
</html>