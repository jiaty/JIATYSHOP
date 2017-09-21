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
<link href="css/productlist.css" rel="stylesheet" type="text/css">
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
		<li><a href="bag.php" class="v2">BAG</a></li>
		<li><a href="http://120.107.152.116/db102/S0161044/JIATYSHOP/login" class="v3">LOGIN</a></li>
	</ul>
	
</div>

<div align="center">
  <p>&nbsp;</p>
  <p><img src="sourceImages/shirts.jpg" width="1260" height="300" alt=""/></p>
  <p>&nbsp;</p>
</div>


<div style="width:1290px; margin:0px auto; clear:both;">
<div class="problock">
<?php
    $_SESSION["Cnumber"] = "1";
?>
  <a href="shirts1.php"><img src="sourceImages/B1.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="shirts1.php">七分袖雪紡上衣</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B2.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">圖騰無袖透膚短上身</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B3.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">經典棉質橫條紋上衣</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B4.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">拼接無袖設計上衣</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B5.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">彩色渲染綁帶細肩上身</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B6.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">復古橫條紋上衣</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B7.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">格紋傘擺細肩上衣</a></p>
</div>
<div class="problock">
  <a href="#"><img src="sourceImages/B8.jpg" width="250" height="250"></a>
  <p class = "name"> <a href="#">花紋透膚上衣</a></p>
</div>
</div>

<footer id="bottombar">ⓒInformation Management Sophomore S0161044 JiaRouHou</footer>
</body>
</html>