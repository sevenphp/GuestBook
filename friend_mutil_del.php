<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';    
	
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
		
		if(!empty($_POST['mutildel'])){
		//	$delid = array();
			$delid = implode(',', $_POST['checkbox']);
			
			//批量删除消息的sql语句
			$sql = "DELETE FROM `tc_friend` WHERE `tc_id` IN({$delid})";	//批量删除用IN;
			
			mysql_query($sql);
				
			if(mysql_affected_rows()){
				pushLocation2('好友批量删除成功!', 'message_list.php');
			}				
		} 			
	}	
	
   
	
?>