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
	
	//读取对应id的相册的基本属性
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$sql = "SELECT `tc_id`,`tc_dir_name`,`tc_dir_type`,`tc_dir_face`,`tc_dir_content` FROM `tc_dir` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		if(empty($rs['tc_dir_type'])){
			$type = '<dd>相册类型:<label><input type="radio" name="ptype" value="0" checked="checked"/>私密</label><label><input type="radio" name="ptype" value="1" />公开</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</dd>';
		}else{
			$type = '<dd>相册类型:<label><input type="radio" name="ptype" value="0"/>私密</label><label><input type="radio" name="ptype" value="1" checked="checked"/>公开</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</dd>';
		}
	}
	
	//修改相册目录
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
			$photoInfo['face'] = $_POST['face'];
			$photoInfo['id'] =$_POST['pid'];
			
			//print_r($photoInfo);
			//exit();
			
			if(!empty($photoInfo['type'])){	//如果相册类型为公开
				$sql = "UPDATE `tc_dir` SET
												`tc_dir_name`='{$photoInfo['name']}',
												`tc_dir_type`='{$photoInfo['type']}',
												`tc_dir_pass`='',
												`tc_dir_content`='{$photoInfo['content']}',
												`tc_dir_face`='{$photoInfo['face']}'
										WHERE
												`tc_id`='{$photoInfo['id']}'
						";
				mysql_query($sql) or die(mysql_error());
			}else{	//相册类型为私密
				//查询一下原来密码是否为空
	/* 			$sqlStr = "SELECT `tc_dir_pass` FROM `tc_dir` WHERE `tc_id`='{$photoInfo['id']}' LIMIT 1";
				$queryStr = mysql_query($sqlStr);
				$rsStr = mysql_fetch_array($queryStr);
				if(!empty($rsStr['tc_dir_pass'])){ */
					if(empty($photoInfo['pass'])){	//密码为空时,不更新相册密码
						$sql = "UPDATE `tc_dir` SET
													`tc_dir_name`='{$photoInfo['name']}',
													`tc_dir_type`='{$photoInfo['type']}',
													`tc_dir_content`='{$photoInfo['content']}',
													`tc_dir_face`='{$photoInfo['face']}'
											WHERE
													`tc_id`='{$photoInfo['id']}'";
						mysql_query($sql) or die(mysql_error());
					}else{
						$sql = "UPDATE `tc_dir` SET
													`tc_dir_name`='{$photoInfo['name']}',
													`tc_dir_type`='{$photoInfo['type']}',
													`tc_dir_pass`='{$photoInfo['pass']}',
													`tc_dir_content`='{$photoInfo['content']}',
													`tc_dir_face`='{$photoInfo['face']}'
											WHERE
													`tc_id`='{$photoInfo['id']}'";
						mysql_query($sql) or die(mysql_error());
					}
/* 				}else{
					pushAlert2('相册密码不能为空');
					$sql = "";
				} */
			}
			
			if(mysql_affected_rows() == 1){
				mysql_close();
				pushCloseWindow('相册修改成功');
			}else{
				mysql_close();
				pushCloseWindow('相册修改失败');
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--修改相册目录</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_modify_dir.css" />
		<!-- <link rel="stylesheet" type="text/css" href="styles/page_list.css" /> -->
		<script type="text/javascript" src="js/photo_modify_dir.js"></script>
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
	</head>
	<body>
		<div id="photo-add">
			<form action="" method="post">
				<dl>
					<dt>修改相册目录</dt>
					<dd><label>相册名称:<input type="text" name="pname" class="text" value="<?php echo $rs['tc_dir_name'];?>"/></label></dd>
					<?php echo $type;?>
					<dd id="showpass"><label>相册密码:<input type="password" name="ppass" class="text" /></label></dd>
					<dd><label>相册封面:<input type="text" name="face" class="text" value="<?php echo $rs['tc_dir_face']; ?>"/></label></dd>
					<dd><label>相册描述:<textarea name="pcontent" class="text"><?php echo $rs['tc_dir_content'];?></textarea></label></dd>
					<dd><input type="hidden" name="pid" value="<?php echo $_GET['id'];?>" /></dd>
					<dd><input type="submit" name="creat" value="修改相册" /></dd>
				</dl>
			</form>
		</div>
	</body>
</html>