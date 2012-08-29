<?php
/**
*@author              	anshao
*@date                  Aug 14, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(!isset($_COOKIE['username'])){
		pushAlert2('请先登录后再操作!');
	}
	
	if(!empty($_POST['up'])){
		//print_r($_FILES);
		//var_dump($_FILES['upfile']);
		//1.设置允许上传的文件的MIME类型(或者通过扩展名判断)
		//$fileType = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');	//MIME类型
		$fileExten = array('.jpg','.jpeg','.png','.gif');	//扩展名
		$fileName = $_POST['dir'].'/'.date('YmdHis',time()).rand(0,100).strrchr($_FILES['upphoto']['name'],'.');
		
		if(!in_array(strrchr($_FILES['upphoto']['name'],'.'),$fileExten)){
			pushAlert2('文件类型不合法!');
			exit();
		}
		
		//2.判断文件上传是否有错误
		if($_FILES['upphoto']['error'] > 0){
			switch ($_FILES['upphoto']['error']){
				case '1':
						pushAlert2('文件大小超过服务器限制的最大长度!');
						break;
				case '2':
						pushAlert2('文件大小超过表单允许的最大长度!');
						break;
				case '3':
						pushAlert2('部分文件被上传!');
						break;
				case '4':
						pushAlert2('没有文件被上传!');
						break;
			}
			exit();
		}
		
		if(is_uploaded_file($_FILES['upphoto']['tmp_name'])){
			if(@move_uploaded_file($_FILES['upphoto']['tmp_name'], $fileName)){
				//pushCloseWindow('文件上传成功!');
				echo "<script>alert('文件上传成功!');window.opener.document.getElementById('addr').value=\"{$fileName}\";window.opener.document.getElementById('time').value=\"".date('Y-m-d H:i:s',time())."\";window.close();</script>";
			}else{
				pushAlert2('文件上传失败!');
			}
		}else{
			pushAlert2('找不到此文件');
			exit();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--相片上传</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_upload_img.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/blog.js"></script> -->
	</head>
	<body>
		<div id="upimg">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<input type="hidden" name="dir" value="<?php echo $_GET['dir'];?>" />
				相片上传:<input type="file" name="upphoto"/><input type="submit" name="up" value="上传" />
			</form>
		</div>
	</body>
</html>