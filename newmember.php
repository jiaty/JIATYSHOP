<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIATYSHOP NEW MEMBER</title>
</head>

<body>
	<?php
		$MINNAME = $_POST['name'];
		$MINNN = $_POST['nickname'];
		$MINBIR = $_POST['bir'];
		$MINTEL = $_POST['tel'];
		$MINCEL = $_POST['cel'];
		$MINADD = $_POST['add'];
		$MINID = $_POST['id'];
		$MINPD = $_POST['pd'];
		
		echo "註冊成功!!<br>";
		echo "ID = $MINID<br>";
		
		$link = mysql_connect('localhost','S0161044','1044') or die ('connect die');
		mysql_select_db('S0161044') or die ('select db die');
	
		$sqlster = "insert into customer values('".$MINNAME."','".$MINNN."','".$MINBIR."','".$MINTEL."','".$MINCEL."','".$MINADD."','".$MINID."','".$MINPD."');";
    	mysql_query($sqlster)or die ('query die');
		
		mysql_close($link)or die ('close die');
		
		$_SESSION["userid"]=$MINID;
		$_SESSION["MM_Username"]=$MINID;
		$_SESSION["usernickname"]=$MINNN;
		echo "<a href='main.php'> 開始購買,如未動作系統將於1秒後自動跳轉 </a>";
	    ?>
        <meta http-equiv="refresh" content="1;url=http://120.107.152.116/db102/S0161044/JIATYSHOP/main.php" />
        <?php
	?>
</body>
</html>