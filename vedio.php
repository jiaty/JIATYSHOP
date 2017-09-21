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
<script type="text/javascript" src="javascript/swfobject.js"></script>

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

$(function(){
	var prevSize = 'large',			// 設定要取得的預覽圖的尺寸, 有寬高為 480X360及寬高為 120X90 兩種
		imgWidth = 480,			// 限制圖片的寬及 YouTube 影片的寬
		imgHeight = 360,		// 限制圖片的高及 YouTube 影片的高
		flashVars = {
			enablejsapi: 1,
			autoplay: 1,		// 是否自動播放; 1: 自動, 0:不自動
			modestbranding: 1,	// 是否隱藏在播放控制器上的 Youtube logo(不過右下角的還是會有); 1: 顯示, 0: 隱藏
			showinfo: 0,		// 是否隱藏在影片上方的標題列; 1: 顯示, 0: 隱藏
			rel: 0,			// 是否隱藏在影片上方的 Share 及 More Info功能; 1: 顯示, 0: 隱藏
			controls: 0		// 是否隱藏影片下方的控制列; 1: 顯示, 0: 隱藏
		};
 
	// 一一轉換每一個超連結中的 YouTube 影片
	$('#abgne-block-20120704 li a').each(function(){
		var $this =  $(this),
			_url = $this.attr('href'),
			_info = $this.text(),
			_index = $this.parent().index(),
			_embedId = 'myytplayer_' + _index,
			_playerId = 'ytapiplayer_' + _index,
			player, timer, checkSpeed = 500;
 
		// 先取得 vid 後, 再利用 vid 取得預覽圖片位置
		// 最後產生預覽圖片元素
		var _vid = _url.match('[\\?&]v=([^&#]*)')[1],
			_prevUrl = 'http://img.youtube.com/vi/' + _vid + '/' + (prevSize == 'large' ? 0 : 2) + '.jpg',
			_prev = '<img id="' + _playerId + '" src="' + _prevUrl + '" alt="' + _info + '" title="' + _info + '" width="' + imgWidth + '" height="' + imgHeight + '" />';
 
		// 把目前超連結的內容轉換成預覽圖片並加入 click 事件
		$this.html(_prev).on('click', 'img', function(){
			clearInterval(timer);
 
			// 當點擊到預覽圖片時就轉換成 YouTube 影片
			swfobject.embedSWF('http://www.youtube.com/v/' + _vid + '?playerapiid=' + _playerId, _playerId, imgWidth, imgHeight, '8', null, flashVars, { allowScriptAccess: 'always' }, { id: _embedId });
			timer = setInterval(checkStatechange, checkSpeed);
 
			return false;
		});
 
		// 監視 YouTube 影片播放狀態
		function checkStatechange(){
			if((player = $('#' + _embedId)[0]) == undefined) return;
			try{
				var currentState = player.getPlayerState();
				// 如果已經播放完畢
				if(currentState == '0'){
					clearInterval(timer);
					$this.html(_prev);
				}
			}catch(err){}
		}
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

#abgne-block-20120704 {
	margin: 0;
	padding: 0;
	list-style: none;
}
#abgne-block-20120704 li {
	margin-bottom: 5px;
}
#abgne-block-20120704 li a img {
	border: 0;
	vertical-align: middle;
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
<img src="sourceImages/blank.jpg" width="1260" height="100" alt=""/>

<h1 align="center">JIATY SHOP BRAND IMAGES developed by maya</h1>
<ul id="abgne-block-20120704">
		<li>
        <a href="https://www.youtube.com/watch?v=ml1BZaFpM9o"><img id="vedio" src="http://img.youtube.com/vi/ml1BZaFpM9o/0.jpg" alt="JIATY SHOP BRAND IMAGES developed by maya" title="JIATY SHOP BRAND IMAGES developed by maya" width="480" height="360"></a>
        </li>
	</ul>

<h1 align="center">&nbsp;</h1>
<h1 align="center">WEB CONCEPT / 網頁概念</h1>
<h2 align="center">&nbsp;</h2>
<h2 align="center">ERD</h2>
<img src="sourceImages/JiatyShopERD01.png" width="653" height="363" alt=""/>
<h2 align="center">&nbsp;</h2>
<h2 align="center">RelationModel</h2>
<img src="sourceImages/JiatyShopRelationModel.png" width="530" height="453" alt=""/>
<h2 align="center">&nbsp;</h2>
<h2 align="center">PDF FOR THE WHOLE CONCEPT</h2>
<a href="#" onClick="MM_openBrWindow('https://drive.google.com/file/d/0ByhFVqoVkiiqOE9tcm02SXd6RjA/edit?usp=sharing','','')"><img src="sourceImages/PDF.png" width="100" height="100" alt=""/></a>
<h2 align="center">&nbsp;</h2>
<h2 align="center">&nbsp;</h2>
<h2 align="center">&nbsp;</h2>
</div>


<footer id="bottombar">ⓒInformation Management Sophomore S0161044 JiaRouHou</footer>
</body>
</html>