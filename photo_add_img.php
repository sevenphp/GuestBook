<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(!isset($_COOKIE['username'])){
		pushAlert2('请登录后操作!');
	}
	
	//判断是否存在此相册
	$sql = "SELECT `tc_dir_path` FROM `tc_dir` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
	$rs = mysql_fetch_array(mysql_query($sql));
	if(empty($rs)){
		pushAlert2('不存在此相册');
		exit();
	}
	
	//将相片相关信息插入数据库
	if(!empty($_POST['addphoto'])){
		$addInfo = array();
		$addInfo['name'] = mysql_real_escape_string($_POST['pname']);
		$addInfo['addr'] = mysql_real_escape_string($_POST['paddr']);
		$addInfo['content'] = mysql_real_escape_string($_POST['pcontent']);
		$addInfo['pid'] = mysql_real_escape_string($_POST['pid']);		//图片上传的相册的id
		$addInfo['time'] = mysql_real_escape_string($_POST['ptime']);		//图片上传的时间
		
		//print_r($addInfo);
		//exit();
		//开始插入数据库
		$sql = "INSERT INTO `tc_photo`(
										`tc_pid`,
										`tc_photo_name`,
										`tc_photo_path`,
										`tc_photo_content`,
										`tc_photo_time`,
										`tc_photo_username`
									   )
								VALUES(
										'{$addInfo['pid']}',
										'{$addInfo['name']}',
										'{$addInfo['addr']}',
										'{$addInfo['content']}',
										'{$addInfo['time']}',
										'{$_COOKIE['username']}'
									   )						
				";
		mysql_query($sql) or die(mysql_error());
		if(mysql_affected_rows() == 1){
			mysql_close();
			pushLocation2('图片添加成功', 'photo_show_list.php?id='.$addInfo['pid']);
		}else{
			mysql_close();
			pushLocation2('图片添加失败', 'photo_show_list.php?id='.$addInfo['pid']);
		}
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--添加相片</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_add_img.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/blog.js"></script> -->
		<script type="text/javascript" src="js/photo_add_img.js"></script>
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="photo">
			<h2>添加相片</h2>	
			<form action="" method="post">
				<dl>
					<dd><input type="hidden" name="pid" value="<?php echo $_GET['id'];?>" /></dd>
					<dd><input type="hidden" name="ptime" id="time"/></dd>
					<dd><label>相片名称:<input type="text" name="pname" class="text"/></label></dd>
					<dd><label>相片地址:<input type="text" name="paddr" class="text" id="addr"/></label><a href="javascript:;" name="uploadimg" title="<?php echo $rs['tc_dir_path'];?>">上传图片</a></dd>
					<dd><label>相片描述:<textarea name="pcontent" class="text"></textarea></label></dd>
					<dd id="add-photo"><input type="submit" name="addphoto" value="添加相片" /></dd>
				</dl>
			</form>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>