<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';    
	
	checkManger();
	
	//先验证一下cookie和uniqid，防止cookie伪造攻击
	$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
	$query = mysql_query($sql);
	$rs = mysql_fetch_array($query);
	
	if(isset($rs['tc_uniqid'])){
		//mysql_close();
		checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常	
		
		$sql = "DELETE FROM `tc_user` WHERE `tc_id`='{$_GET['delid']}' LIMIT 1";
		
		mysql_query($sql);
		
		if(mysql_affected_rows() == 1){
			pushLocation2('博友删除成功!', 'manager_mem_list.php');
		}	
	}
	
	

?>