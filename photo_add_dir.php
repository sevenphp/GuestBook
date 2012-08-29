<?php
/**
*@author              	anshao
*@date                  Aug 13, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	checkManger();
	
	//添加相册目录
	if(!empty($_POST['creat'])){
		//先验证一下cookie和uniqid，防止cookie伪造攻击
		$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		if(isset($rs['tc_uniqid'])){
			checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'manager_mem_list.php');	//判断唯一标识符是否异常
			$photoInfo = array();
			$photoInfo['name'] = checkPhotoName($_POST['pname']);
			$photoInfo['type'] = $_POST['ptype'];
			if($photoInfo['type'] == 1){
				$photoInfo['pass'] = NULL;
			}elseif($photoInfo['type'] == 0){
				$photoInfo['pass'] = checkPhotoPass($_POST['ppass']);
			}		
			$photoInfo['content'] = $_POST['pcontent'];
			$photoInfo['dir'] = time();		//以时间戳来命名创建的相册目录		
			$path = 'photo/';	//相册的根目录
			$photoInfo['path'] = $path.$photoInfo['dir'];	//相册的路径
			
		 	if(!is_dir($path)){	//判断是否存在该根目录,没有就创建
				mkdir($path);
			}
			
			if(!is_dir($photoInfo['path'])){	//判断是否已经存在该相册,没有就创建
				mkdir($photoInfo['path']);
			}
			
			//if(empty($_POST['pass'])){	//密码为空时,无须更新密码			
			//}
			
			$sql = "INSERT INTO `tc_dir`(
											`tc_dir_name`,
											`tc_dir_path`,
											`tc_dir_type`,
											`tc_dir_pass`,
											`tc_dir_content`,
											`tc_dir_time`
										)
							 	 VALUES(
											'{$photoInfo['name']}',
											'{$photoInfo['path']}',
											'{$photoInfo['type']}',
											'{$photoInfo['pass']}',
											'{$photoInfo['content']}',
											NOW()
									   )
					";
			mysql_query($sql) or die(mysql_error());
			
			if(mysql_affected_rows() == 1){
				mysql_close();
				pushCloseWindow('相册创建成功');
			}else{
				mysql_close();
				pushCloseWindow('相册创建失败');
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--添加相册目录</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_add_dir.css" />
		<!-- <link rel="stylesheet" type="text/css" href="styles/page_list.css" /> -->
		<script type="text/javascript" src="js/photo_add_dir.js"></script>
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
	</head>
	<body>
		<div id="photo-add">
			<form action="" method="post">
				<dl>
					<dt>添加相册目录</dt>
					<dd><label>相册名称:<input type="text" name="pname" class="text"/></label></dd>
					<dd>相册类型:<label><input type="radio" name="ptype" value="0"/>私密</label><label><input type="radio" name="ptype" value="1" checked="checked"/>公开</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</dd>
					<dd id="showpass"><label>相册密码:<input type="password" name="ppass" class="text" /></label></dd>
					<dd><label>相册描述:<textarea name="pcontent" class="text"></textarea></label></dd>
					<dd><input type="submit" name="creat" value="创建相册" /></dd>
				</dl>
			</form>
		</div>
	</body>
</html>