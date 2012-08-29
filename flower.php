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
			$sql = "select tc_username from tc_user where tc_id='{$_GET['id']}' limit 1";
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
	
	
	/*送花*/
	if(!empty($_POST['sent'])){
		
		$sentFlower = array();
		$sentFlower['touser'] = mysql_real_escape_string($_POST['touser']);
		$sentFlower['fromuser'] = mysql_real_escape_string($_COOKIE['username']);
		$sentFlower['content'] = mysql_real_escape_string($_POST['content']);
		$sentFlower['count'] = mysql_real_escape_string($_POST['flower_count']);
		
		$sqlStr = "INSERT INTO `tc_flower`(
											`tc_to_user`,
											`tc_from_user`,
											`tc_content`,
											`tc_sent_time`,
											`tc_flower_count`
										)
								  VALUES(
											'{$sentFlower['touser']}',
											'{$sentFlower['fromuser']}',
											'{$sentFlower['content']}',
											NOW(),
											'{$sentFlower['count']}'
										)
				";
		
			if($GLOBALS['sys_code'] == 1){
				//有验证码
				checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
				
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');
				
					//自己不能给自己送花
					if($sentFlower['touser'] == $_COOKIE['username']){
						pushCloseWindow('自己不能给自己送花');
						exit();
					}
				
					mysql_query($sqlStr);
				}
			}elseif($GLOBALS['sys_code'] == 0){	//没验证码
				
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "select tc_uniqid from tc_user where tc_username='{$_COOKIE['username']}' limit 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');

					//自己不能给自己送花
					if($sentFlower['touser'] == $_COOKIE['username']){
						pushCloseWindow('自己不能给自己送花');
						exit();
					}
				
					mysql_query($sqlStr);
				}
			}

			if(mysql_affected_rows() == 1){
				mysql_close();
				//session_destroy();
				pushCloseWindow('送花成功!');
			}else{
				mysql_close();
				//session_destroy();
				pushCloseWindow('送花失败!');
			}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--送花</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/flower.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message.js"></script>
	</head>
	<body>
		<div id="message">
			<h3>发送消息</h3>
			<form action="?id=<?php echo $_GET['id'];?>" method="post">
				<dl>	
					<dd>
						<input type="hidden" name="touser" value="<?php echo $message['touser'];?>" />
						<input type="text" name="user" readonly="readonly" class="text" value="TO:<?php echo $message['touser'];?>"/>
						<select name="flower_count">
							<?php
								foreach(range(1,50) as $num){
									echo '<option value="'.$num.'">'.$num.'朵</option>';
								}
							?>
						</select>
					</dd>
					<dd><textarea name="content" class="text">朋友,我给你送花了</textarea></dd>
					<?php echo isDisplayCode2('送花'); ?>
				</dl>
			</form>
		</div>
	</body>
</html>