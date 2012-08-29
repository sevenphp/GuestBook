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
		
			if($GLOBALS['sys_code'] == 1){
				//有验证码
				checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
				
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "select tc_uniqid from tc_user where tc_username='{$_COOKIE['username']}' limit 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');
				
					$addFriend = array();
					$addFriend['touser'] = mysql_real_escape_string($_POST['touser']);
					$addFriend['fromuser'] = mysql_real_escape_string($_COOKIE['username']);
					$addFriend['content'] = mysql_real_escape_string($_POST['content']);
					//print_r($addFriend);
					if($addFriend['touser'] == $addFriend['fromuser']){
						pushCloseWindow('禁止添加自己为好友!');
					}
				
					//判断双方是否已经是好友(验证好友或未验证好友)
					$sql = "SELECT `tc_id` FROM
													`tc_friend`
										  WHERE
												(
													`tc_from_user`='{$addFriend['fromuser']}'
											AND
													`tc_to_user`='{$addFriend['touser']}'
												)
											OR
												(
													`tc_from_user`='{$addFriend['touser']}'
											AND
													`tc_to_user`='{$addFriend['fromuser']}'
												)
									      LIMIT
													1
						";
					mysql_query($sql);
				
					if(mysql_affected_rows() == 1){
						mysql_close();
						//session_destroy();
						pushCloseWindow('双方已经是验证好友或是未验证好友!');
						//pushLocation2('消息发送成功!','message_list.php');
					}
				
					//添加为好友
					$sql = "INSERT INTO `tc_friend`(
														`tc_to_user`,
														`tc_from_user`,
														`tc_content`,
														`tc_friend_time`)
											 VALUES(
														'{$addFriend['touser']}',
														'{$addFriend['fromuser']}',
														'{$addFriend['content']}',
														NOW()
													)
						  ";
						//echo $sql;
						mysql_query($sql);
				}
				
			}elseif($GLOBALS['sys_code'] == 0){
				//没验证码
				//先验证一下cookie和uniqid，防止cookie伪造攻击
				$sql = "select tc_uniqid from tc_user where tc_username='{$_COOKIE['username']}' limit 1";
				$query = mysql_query($sql);
				$rs = mysql_fetch_array($query);
					
				if(isset($rs['tc_uniqid'])){
					//mysql_close();
					checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'blog.php');
						
					$addFriend = array();
					$addFriend['touser'] = mysql_real_escape_string($_POST['touser']);
					$addFriend['fromuser'] = mysql_real_escape_string($_COOKIE['username']);
					$addFriend['content'] = mysql_real_escape_string($_POST['content']);
					//print_r($addFriend);
					if($addFriend['touser'] == $addFriend['fromuser']){
						pushCloseWindow('禁止添加自己为好友!');
					}
				
					//判断双方是否已经是好友(验证好友或未验证好友)
					$sql = "SELECT `tc_id` FROM 
												`tc_friend` 
										  WHERE 
												(
												`tc_from_user`='{$addFriend['fromuser']}' 
											AND 
												`tc_to_user`='{$addFriend['touser']}'
												) 
											OR 
												(
												`tc_from_user`='{$addFriend['touser']}' 
											AND 
												`tc_to_user`='{$addFriend['fromuser']}'
												)
					 					  LIMIT 
					 					  		1
							";
					mysql_query($sql);
				
					if(mysql_affected_rows() == 1){
						mysql_close();
						//session_destroy();
						pushCloseWindow('双方已经是验证好友或是未验证好友!');
						//pushLocation2('消息发送成功!','message_list.php');
					}
				
					//添加为好友
					$sql = "INSERT INTO `tc_friend`(
														`tc_to_user`,
														`tc_from_user`,
														`tc_content`,
														`tc_friend_time`) 
											VALUES(
														'{$addFriend['touser']}',
														'{$addFriend['fromuser']}',
														'{$addFriend['content']}',
														NOW()
												   )
					      ";
					//echo $sql;
					mysql_query($sql);
				
			}
		}
		if(mysql_affected_rows() == 1){
			mysql_close();
			//session_destroy();
			pushCloseWindow('添加好友成功!请等待对方验证!');
			//pushLocation2('消息发送成功!','message_list.php');
		}else{
			mysql_close();	//关闭数据库连接
			//session_destroy();	//销毁验证码SESSSION
			pushAlert2('添加好友失败!');
		}	

		//}//else{
		//	pushAlert2('验证码错误');
		//}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--添加好友</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/friend.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message.js"></script>
	</head>
	<body>
		<div id="message">
			<h3>添加好友</h3>
			<form action="?id=<?php echo $_GET['id'];?>" method="post">
				<dl>
					<dd><input type="hidden" name="touser" value="<?php echo $message['touser'];?>" /></dd>
					<dd><input type="text" name="user" readonly="readonly" value="TO:<?php echo $message['touser'];?>" class="text" /></dd>
					<dd><textarea name="content" class="text">交个朋友吧!</textarea></dd>
					<?php echo isDisplayCode2('添加好友'); ?>
				</dl>
			</form>
		</div>
	</body>
</html>