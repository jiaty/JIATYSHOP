<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"><!--文字碼是萬用字元碼utf-8-->
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<LINK REL="SHORTCUT ICON" HREF="sourceImages/JFavicon.ico">
<title>JIATY SHOP</title>
<link rel="stylesheet" type="text/css" href="css/HorizontalDoubleSubmenu.css">
<link rel="stylesheet" type="text/css" href="css/list.css">

<script type="text/javascript" src="javascript/jQuery.js"></script>
<script type="text/javascript" src="javascript/jquery.backgroundPosition.js"></script>

<script type="text/javascript">
	$(function(){
		// 幫 #menu li 加上 hover 事件
		$('#menu>li').hover(function(){
			// 先找到 li 中的子選單
			var _this = $(this),
				_subnav = _this.children('ul');
			
			// 變更目前母選項的背景顏色
			// 同時淡入子選單(如果有的話)
			_this.css('backgroundColor', 'rgba(55,0,0,0.80)');
			_subnav.stop(true, true).fadeIn(400);
		} , function(){
			// 變更目前母選項的背景顏色
			// 同時淡出子選單(如果有的話)
			// 也可以把整句拆成上面的寫法
			$(this).css('backgroundColor', '').children('ul').stop(true, true).fadeOut(400);
		});
		
		// 取消超連結的虛線框
		$('a').focus(function(){
			this.blur();
		});
	});
	
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);}
  
  $(function(){
	// 幫 #hmenu li a 加上 hover 事件
	$("#hmenu li a").hover(function(){
		// 滑鼠移進選項時..
		// 把背景圖片的位置往上移動
		var _this = $(this),
			_height = _this.height() * -1;
		_this.stop().animate({
			backgroundPosition: "0px " + _height + "px"
		}, 200);
	}, function(){
		// 滑鼠移出選項時..
		// 把背景圖片的位置移回原位
		$(this).stop().animate({
			backgroundPosition: "0px 0px"
		}, 200);
	});
});

</script>

<style type="text/css"> 
    #top-bar{
	background-color: #560001;
	font-weight: bold;
	color: white;
	position:fixed; !important;
	width: 100%;
	z-index: 2; 
	padding-left:15px;
	top:-10px;
    } 
    #bottombar {
    background-color: #560001;
    position: fixed; !important;
    width: 100%;
    bottom: 0;
    z-index: 5;
    height: 34px;
    border: 1px solid #ffffff;
    background-repeat:repeat-x;
    color:#FFFFFF;
	font-family: verdana;
	font-size:12px;
    _position:absolute;
    _top:expression(document.body.scrollTop+document.body.clientHeight-this.clientHeight);
    }
  body,td,th {
	color: #560001;
}
</style>
</head>

<body>
  <header id="top-bar">
    <p><font size="+3">JIATY SHOP</font></p>
  </header>
  
<div id="bar" style="background-color: #560001; height:85px; width: 100%; position: fixed;">
<ul id="menu" name="menu">
  <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/main">春夏衣料品</a>
    <ul>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/shirts">shirts</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/jacket">jacket</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/dresses">dresses</a></li>
    </ul>
  </li>
  <li> <a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/main">春夏下身</a>
    <ul>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/skirts">skirts</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/pants">pants</a></li>
    </ul>
  </li>
  <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/main">春夏配件</a>
    <ul>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/shoes">shoes</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/socks">socks</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/hats">hats</a></li>
      <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/glasses">glasses</a></li>
    </ul>
  </li>
  <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/main">NEW!新品上架</a></li>
  <li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/vedio">JIATYSHOP</a></li>
  <li><a href="#" onClick="MM_openBrWindow('https://www.queenshop.com.tw/','','')">MODEL圖片來源</a></li>
</ul>

<ul id="hmenu">
		<li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/membercenter" class="v1">MEMBER</a></li>
		<li><a href="bag.php" class="v2">ACCOUNT</a></li>
		<li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/login" class="v3">LOGIN</a></li>
  </ul>
</div>

<div align="center">
  <table align="center" border="0" cellpadding="0" cellspacing="0" width="1200">
    <tr>
      <td height="300px" valign="bottom"><h1 align="center">SHOPPING BAG 購物車<img src="sourceImages/bag.gif" width="1200" height="100" alt=""/></h1></td>
    </tr>
    <tr valign="top">
      <td><img src="sourceImages/line.gif" width="1200" height="10" alt=""/></td>
    </tr>
    <tr>
      <td valign="middle">
      <div style="width:334px; height:80px; padding:0px 30px 0px 0px; font-size:15px; line-height:30px; font-family:'微軟正黑體'">
      <?php
	  IF ($_SESSION['usernickname']<>"")
		{
		echo "".$_SESSION['usernickname']." ";
		}
		else
		{
		
		}
		
		
		$userid = $_SESSION["userid"];
        $itemid = $_SESSION["Cnumber"];
		
		$link = mysql_connect('localhost','S0161044','1044') or die ('connect die');
        mysql_select_db('S0161044') or die ('select db die');
		
	    $sqlstr = "select * from shoppingcart where C_AccountNumber = '$userid';";
	    $result = mysql_query($sqlstr)or die ('die');
		$NumberOfRow = mysql_num_rows($result);
		$max = 0;
		
		for($i=0; $i<$NumberOfRow; $i++){
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$temp = $row[1];
			if($temp>$max)
			    $max = $temp;
		}
		
		$sqlstr1 = "select * from include where S_Number = '$max';";
	    $result1 = mysql_query($sqlstr1)or die ('die');
		if(!$result1){
			echo"empty shoppingcart!";
			$NumberOfC_Row = 0;
		}
		else{
			$NumberOfC_Row = mysql_num_rows($result1);
		}
		
	  ?>
      您好      WELCOME
      <br>
      訂單編號：
      <?php
	  echo"$max";
	  $_SESSION["S_number"] = $max;
	  ?>
      <img src="sourceImages/line.gif" width="1200" height="2" alt=""/>
      </div>
      </td>
    </tr>
    <tr>
      <table width="1200" align="center">
  <tr>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">商品編號</div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">類別</div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">數量</div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">總價</div></td>
  </tr>
</table>
  <img src="sourceImages/line.gif" width="1200" height="5" alt=""/>
    </tr>
    <tr>
    <?php
    
    ?>
    <div style=" border-bottom:1px solid black; padding:20px; width:1200px">
    <?php
	for($j=0;$j<$NumberOfC_Row;$j++){
		$C_row = mysql_fetch_array($result1, MYSQL_NUM);
		$CN = $C_row[1];
		$amount = $C_row[2];
	    $sqlstr2 = "select * from commodity where Number = '$CN';";
	    $result2 = mysql_query($sqlstr2)or die ('die');
		$CR = mysql_fetch_row($result2);
	?>
    <table width="1200" align="center">
      <td align="center" width="300"><div style=" font-family:微軟正黑體">
      <?php
	  $N = $CR[1];
	  echo"$N";
	  ?>
      </div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">
    <?php
	  $Type = $CR[2];
	  echo"$Type";
	?>
    </div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">
    <?php
	  echo"$amount";
	?>
    </div></td>
    <td align="center" width="300"><div style=" font-family:微軟正黑體">
    <?php
	  $Price = $CR[0];
	  $Price*=$amount;
	  echo"$Price";
	?>
    </div></td>
      </table>
      <?php
	}
	  ?>
      </div>
    </tr>
    <tr>
    <form id="form1" name="form1" method="post" action="addtoorder.php">
    <table width="1200" border="0" align="center">
  <tr>
    <td width="600" align="center" valign="middle">
    <label for="select"><div style="font-family:'微軟正黑體';">運送方式 :</label>
    <select name="select" id="select">
    <option value="CashOnDelivery">CashOnDelivery</option>
    <option value="ChainStorePickup">ChainStorePickup</option>
    </select></div>
    </td>
    <td width="600" align="center"><input type="submit" name="STO" id="STO" value="送出訂單"></td>
  </tr>
  </table>
  </form>
    </tr>
  <tr>
  <img src="sourceImages/blank.jpg" width="1200" height="100" alt=""/>
  </tr>
  </table>
</div>



<footer id="bottombar">ⓒInformation Management Sophomore S0161044 JiaRouHou</footer>
</body>
</html>