<?php
/**
*@author              	anshao
*@date                  Aug 14, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	header('Content-Type:text/html;charset="utf-8"');
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	checkManger();
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在此相册
		$sql = $sql = "SELECT `tc_dir_path` FROM `tc_dir` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
		$rs = mysql_fetch_array(mysql_query($sql));
		if(empty($rs)){
			pushAlert2('不存在此相册');
			exit();
		}
		$dirPath = $rs['tc_dir_path'];
		//echo $dirPath;
		//exit;
		
		//先验证一下cookie和uniqid，防止cookie伪造攻击
		$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		
		if(isset($rs['tc_uniqid'])){
			//mysql_close();
			checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');	//判断唯一标识符是否异常
		
			//删除数据库中相册目录对应的数据
			$sql = "DELETE FROM `tc_dir` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
			mysql_query($sql);
			
			//删除数据库中保存相片的对应的数据
			$sql = "DELETE FROM `tc_photo` WHERE `tc_pid`='{$_GET['id']}' LIMIT 1";
			mysql_query($sql);	//or die('xxxx');
			//exit();
			if(mysql_affected_rows() == 1){
				mysql_close();
				if(delDir($dirPath) == true){
					pushLocation2('本地相册删除成功','photo.php');
				}else{
					pushAlert2('本地相册删除失败');
				}
			}else{
				mysql_close();
				pushAlert2('相册删除失败');
			}
		}
	}else{
		pushAlert2('非法操作');
	}