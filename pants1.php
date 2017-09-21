<?php
session_start();

$_SESSION["Cnumber"] = "33";
$Cnumber = $_SESSION["Cnumber"];

$link = mysql_connect('localhost','S0161044','1044') or die ('connect fail');
	mysql_select_db('S0161044') or die ('select db fail');
	
	$sqlstr = "select * from commodity where Number = '$Cnumber';";
	$result = mysql_query($sqlstr);
	$row = mysql_fetch_row($result);
	$price = $row[0];
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
  <table width="1200" border="0" height="100px" valign="bottom">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="1200" border="0" valign="bottom">
  <tr>
    <td align="right"><img src="sourceImages/P1.jpg" width="500" height="500" alt=""/></td>
    <td align="left">
    <form id="form1" name="form1" method="post" action="addtobag.php">
    <table width="500" border="0">
  <tr>
    <td>
    <div style=" border-bottom:1px solid  #560001; padding:0px; width:500px">
      <table width="500" border="0">
  <tr>
    <td align="left"><div style=" font-family:微軟正黑體">
      <p>JIATY SHOP / 本學期全新上架 / </p>
      <p>連身吊帶窄管褲</p>
      <p>商品編號：
      <?
	  echo"$Cnumber";
      ?>
      </p></div></td>
    <td align="right" valign="bottom">
    <div style="font-weight:bold; font-size:42px; color:Red;">
    <span style="font-size:14px; font-weight:bold;">TWD.</span> 
    <?
	echo"$price";
	?>
    </div></td>
  </tr>
</table>
      </div>
</td>
  </tr>
  <tr>
    <td>
    <div style=" border-bottom:1px solid #560001; padding:0px; width:500px">
      <table width="500" border="0">
  <tr>
    <td width="90" align="left" valign="top"><div style=" font-family:微軟正黑體">商品資訊：</div></td>
    <td width="410" align="right"><div style=" font-family:微軟正黑體">
    <p>素面連身吊帶褲</p>
    <p>金邊雙扣的設計</p>
    <p>可拆式活動吊帶</p>
    <p>吊帶可自由變化</p>
    <p>內搭圖案T就會很可愛~</p>
    </div></td>
  </tr>
  <tr>
    <td align="left" width="500"><div style=" font-family:微軟正黑體">
      <p>COLOR：F</p>
      <p>SIZE：F</p>
      </td>
  </tr>
</table>
      </div>
    </td>
  </tr>
  <tr>
    <td><table width="500" border="0">
  <tr>
    <td align="center"><label for="number3">數量:</label>
      <input name="number" type="number" id="number3" min="1"></td>
    <td align="center"><input type="submit" name="ATB" id="ATB" value="加入購物車"></td>
  </tr>
</table>
</td>
  </tr>
</table>
</form>
</td>
  </tr>
</table>
<img src="sourceImages/products/p1.jpg" width="700" height="600" alt=""/>
<img src="sourceImages/products/p2.jpg" width="700" height="600" alt=""/>
<img src="sourceImages/products/p3.jpg" width="700" height="600" alt=""/>
<img src="sourceImages/products/p4.jpg" width="1000" height="4200" alt=""/>
</div>

<footer id="bottombar">ⓒInformation Management Sophomore S0161044 JiaRouHou</footer>
</body>
</html>