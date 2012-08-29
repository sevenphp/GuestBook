<?php
	header('Content-Type:text/html;charset="utf-8"');
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';    
	
	checkManger();
	
	//先验证一下cookie和uniqid，防止cookie伪造攻击
	$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
	$query = mysql_query($sql);
	$rs = mysql_fetch_array($query);
	
	if(isset($rs['tc_uniqid'])){
		//mysql_close();
		checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');	//判断唯一标识符是否异常	
		$id = $_GET['managerid'];
		$sql = "UPDATE 
						`tc_user` 
				   SET 
						`tc_level`=0
				 WHERE 
				 		`tc_id`=$id
				   AND
						`tc_username`='{$_COOKIE['username']}' 
				   AND 
						`tc_level`=1"
				;
		
		mysql_query($sql);
		
		if(mysql_affected_rows() == 1){
			pushLocation2('辞职成功!', 'index.php');
		}else{
			pushAlert2('辞职失败！只能自己为自己辞职!');
		}
	}
	
	

?>