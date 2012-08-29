<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(!isset($_COOKIE['username'])){
		pushLocation2('请登录后再进行操作!', 'login.php');
	}

		//先验证一下cookie和uniqid，防止cookie伪造攻击
		$sql = "select tc_uniqid from tc_user where tc_username='{$_COOKIE['username']}' limit 1";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		
		if(isset($rs['tc_uniqid'])){
			//mysql_close();
			checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常
			
			//构造读取消息的sql语句
			$sql = "SELECT `tc_state`,`tc_from_user`,`tc_content`,`tc_sent_time` FROM `tc_message` WHERE `tc_id`='{$_GET['messid']}' LIMIT 1";
			
			$query = mysql_query($sql);
			
			$rs = mysql_fetch_array($query);
			
			if(empty($rs['tc_state'])){
				$sql = "UPDATE `tc_message` SET `tc_state`=1 WHERE `tc_id`='{$_GET['messid']}' LIMIT 1";
				mysql_query($sql);
			}
		}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--消息详细内容</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/message_detail.css" />
		<!-- <link rel="stylesheet" type="text/css" href="styles/page_list.css" /> -->
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
					<dd><a href="#">查询花朵</a></dd>
					<dd><a href="#">个人相册</a></dd>
				</dl>
			</div>
			<div id="member-main">
				<h2>消息详细内容</h2>
				<dl>
					<dd>发信人:<?php echo $rs['tc_from_user']; ?></dd>
					<dd class="content">内&#12288;容:<span><?php echo $rs['tc_content']; ?></span></dd>
					<dd>时&#12288;间:<?php echo $rs['tc_sent_time'];?></dd>
					<dd class="button"><input type="button" value="返回消息列表" onclick="javascript:history.go(-1); "/>&nbsp;&nbsp;<a href="message_singal_del.php?messid=<?php echo $_GET['messid'];?>" onclick="javascript:return(confirm('确定要删除此消息'))">删除此消息</a></dd>
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