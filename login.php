<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	//开启SESSION
	session_start();
	
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//判断登录状态
	loginStatus();	
	$startTime = runTime();
	
	if(!empty($_POST['sub'])){
		//if($_POST['code'] == $_SESSION['code']){
		$loginInfo = array();
		$loginInfo['username'] = trim($_POST['username']);
		$loginInfo['password'] = md5($_POST['password']);
		$loginInfo['keeptime'] = $_POST['keeptime'];
			
		$sql = "SELECT * FROM 
								`tc_user`
						WHERE 
								`tc_username`='{$loginInfo['username']}' 
						AND 
								`tc_password`='{$loginInfo['password']}' 
						AND 
								`tc_active`=''
				";
		
		if($GLOBALS['sys_code'] == 1){	//有验证码
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
			
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
		}elseif($GLOBALS['sys_code'] == 0){	//无验证码
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
		}
			
		if($rs['tc_id']){
			//更新数据库中的tc_last_time,tc_last_ip,tc_login_count
			$sql = "update `tc_user` set `tc_last_time`=now(),`tc_last_ip`='{$_SERVER['REMOTE_ADDR']}',`tc_login_count`=`tc_login_count`+1 where `tc_username`='{$rs['tc_username']}'";
			mysql_query($sql);
			mysql_close();
			//session_destroy();//销毁SESSION	
			setCookies($rs['tc_username'], $rs['tc_uniqid'], $loginInfo['keeptime']);
			pushLocation2('恭喜用户:'.$rs['tc_username'].'登录成功', 'member.php');
		}else{
			mysql_close();
		//	session_destroy();
			pushAlert2('用户名或密码错误!或用户尚未注册或尚未激活!');
		}
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--登录</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/login.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/face.js"></script> -->
		<script type="text/javascript" src="js/login.js"></script>
		<!-- <script type="text/javascript" src="js/validator.js"></script>
		<script type="text/javascript" src="js/reg.ajax.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="login">
			<h2>用户登录</h2>
			<form action="login.php" method="post" name="login">
				<dl>
					<dt>请认真填写以下注册资料</dt>
					<dd><label>用 户 名:<input type="text" name="username" class="text"/></label></dd>
					<dd><label>密　　码:<input type="password" name="password" class="text" /></label></dd>
					<dd>保　　留:<input type="radio" name="keeptime" value="0" checked="checked" />不保留 <input type="radio" name="keeptime" value="1" />一天 <input type="radio" name="keeptime" value="2" />一周</dd>
					<?php echo isDisplayCode(); ?>
					<dd><input type="submit" name="sub" value="登录" id="subLogin"/><input type="button" name="reg" value="注册" id="subReg"/></dd>
				</dl>
			</form>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>