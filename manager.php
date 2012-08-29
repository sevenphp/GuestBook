<?php
	define('IN_TAG', true);
	header('Content-Type:text/html;charset=utf-8');
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	checkManger();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--个人中心</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/manager.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/face.js"></script> -->
		<!--<script type="text/javascript" src="js/login.js"></script> -->
		<!-- <script type="text/javascript" src="js/validator.js"></script>
		<script type="text/javascript" src="js/reg.ajax.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="member">
			<?php 
				memberSlider();
			?>
<!-- 			<div id="member-slider">
				<h2>中心导航</h2>
				<dl>
					<dt>账号管理</dt>
					<dd><a href="member.php">个人信息</a></dd>
					<dd><a href="member_modify.php">修改资料</a></dd>
				</dl>
				<dl>
					<dt>其他管理</dt>
					<dd><a href="message_list.php">消息查阅</a></dd>
					<dd><a href="friend_list.php">好友设置</a></dd>
					<dd><a href="flower_list.php">查询花朵</a></dd>
					<dd><a href="#">个人相册</a></dd>
				</dl>
			</div> -->
			<div id="member-main">
				<h2>系统管理中心</h2>
				<dl>
					<dd>服务器主机名称:<?php echo $_SERVER['HTTP_HOST']; ?></dd>
					<dd>服务器版本:<?php echo iconv_substr(php_uname(),0,33,'utf-8'); ?></dd>
					<dd>通信协议/版本:<?php echo $_SERVER['SERVER_PROTOCOL'];?></dd>
					<dd>服务器IP:<?php echo $_SERVER['SERVER_ADDR'];?></dd>
					<dd>客户端IP:<?php echo $_SERVER['REMOTE_ADDR'];?></dd>
					<dd>服务器端口:<?php echo $_SERVER['SERVER_PORT'];?></dd>
					<dd>客户端端口:<?php echo $_SERVER['REMOTE_PORT'];?></dd>
					<dd>管理员邮箱:<a href="<?php echo 'mailto:'.$_SERVER['SERVER_ADMIN']; ?>" ><?php echo $_SERVER['SERVER_ADMIN']; ?></a></dd>
					<dd>Apache和PHP版本:<?php echo $_SERVER['SERVER_SOFTWARE'];?></dd>
				</dl>
			</div>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>		