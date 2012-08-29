<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	session_start();
	define('IN_TAG',true);
	
	require 'includes/common.inc.php';
	
	if(isset($_COOKIE['username'])){
		if(!empty($_GET['id'])){
			$sql = "SELECT `tc_username` FROM `tc_user` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			$message = array();
			$message['touser'] = htmlspecialchars($rs['tc_username']);
		}else{
			pushCloseWindow('非法访问');
		}
	}else{
		pushCloseWindow('无法访问,请先登陆');
	}
	
	if(!empty($_POST['sent'])){
			if($GLOBALS['sys_code'] == 1){	//有验证码
				checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
				
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');
						
					$sentMess = array();
					$sentMess['touser'] = mysql_real_escape_string($_POST['touser']);
					$sentMess['fromuser'] = mysql_real_escape_string($_COOKIE['username']);
					$sentMess['content'] = mysql_real_escape_string($_POST['content']);
					//print_r($sentMess);
				
					$sql = "INSERT INTO `tc_message`(
														`tc_to_user`,
														`tc_from_user`,
														`tc_content`,
														`tc_sent_time`
													) 
											 VALUES(
														'{$sentMess['touser']}',
														'{$sentMess['fromuser']}',
														'{$sentMess['content']}',
														now()
													)
						";
				
					mysql_query($sql);
				}	
			}elseif($GLOBALS['sys_code'] == 0){	//没验证码
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');
						
					$sentMess = array();
					$sentMess['touser'] = mysql_real_escape_string($_POST['touser']);
					$sentMess['fromuser'] = mysql_real_escape_string($_COOKIE['username']);
					$sentMess['content'] = mysql_real_escape_string($_POST['content']);
					//print_r($sentMess);
				
					$sql = "INSERT INTO `tc_message`(
														`tc_to_user`,
														`tc_from_user`,
														`tc_content`,
														`tc_sent_time`
													) 
											  VALUES(
														'{$sentMess['touser']}',
														'{$sentMess['fromuser']}',
														'{$sentMess['content']}',
														now()
													)
							";
					mysql_query($sql);
				}
			}

			if(mysql_affected_rows() == 1){
				mysql_close();
				//session_destroy();
				pushCloseWindow('消息发送成功!');
			}else{
				mysql_close();
				//session_destroy();
				pushCloseWindow('消息发送失败!');
			}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>多用户内容管理系统--消息发送</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/message.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message.js"></script>
	</head>
	<body>
		<div id="message">
			<h3>发送消息</h3>
			<form action="?id=<?php echo $_GET['id'];?>" method="post">
				<dl>
					<dd><input type="hidden" name="touser" value="<?php echo $message['touser'];?>" /></dd>
					<dd><input type="text" name="user" readonly="readonly" class="text" value="TO:<?php echo $message['touser'];?>"/></dd>
					<dd><textarea name="content" class="text"></textarea></dd>
					<?php echo isDisplayCode2('发送消息'); ?>
				</dl>
			</form>
		</div>
	</body>
</html>