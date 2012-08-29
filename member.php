<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	if(isset($_COOKIE['username'])){
		$sql = "select `tc_username`,`tc_sex`,`tc_face`,`tc_email`,`tc_site`,`tc_qq`,`tc_reg_time`,`tc_level` from `tc_user` where `tc_username`='{$_COOKIE['username']}'";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		if($rs){
			mysql_close();	//关闭数据库连接
			$userInfo = array();
			$userInfo['username'] = $rs['tc_username'];
			$userInfo['sex'] = $rs['tc_sex'];
			$userInfo['face'] = $rs['tc_face'];
			$userInfo['email'] = $rs['tc_email'];
			$userInfo['site'] = $rs['tc_site'];
			$userInfo['qq'] = $rs['tc_qq'];
			$userInfo['reg_time'] = $rs['tc_reg_time'];
			$userInfo['level'] = $rs['tc_level'];
			$userInfo = userInfoHtml($userInfo);
		}
	}else{
		pushAlert('非法访问!');
		echo '<script>history.back();</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--个人中心</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/member.css" />
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
			<div id="member-slider">
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
			</div>
			<div id="member-main">
				<h2>会员管理中心</h2>
				<dl>
					<dd>用 户 名：<?php echo $userInfo['username']; ?></dd>
					<dd>性　　别：<?php echo $userInfo['sex']; ?></dd>
					<dd id="face">头　　像：<img src="<?php echo $userInfo['face']; ?>" alt="<?php echo $userInfo['face']; ?>"/></dd>
					<dd>电子邮件：<a href="mailto:<?php echo $userInfo['email']; ?>" ><?php echo $userInfo['email']; ?></a></dd>
					<dd>主　　页：<a href="<?php echo $userInfo['site']; ?>"><?php echo $userInfo['site']; ?></a></dd>
					<dd>Q 　 　Q：<?php echo $userInfo['qq']; ?></dd>
					<dd>注册时间：<?php echo $userInfo['reg_time']; ?></dd>
					<dd>身　　份：<?php checkLevel($userInfo['level']); ?></dd>
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