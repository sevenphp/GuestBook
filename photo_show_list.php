<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(!isset($_COOKIE['username'])){
		pushAlert2('请先登录再进行操作!');
	}
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在此相册
		$sqlStr = "SELECT `tc_dir_path`,`tc_dir_type` FROM `tc_dir` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
		$rsStr = mysql_fetch_array(mysql_query($sqlStr));
		if(empty($rs)){
			pushAlert2('不存在此相册');
			exit();
		}
		//echo $rsStr['tc_dir_type'];
		//exit();
		
		//分页
		if(isset($_GET['page'])){	//为$_GET['page']做判断,
			 $page = $_GET['page'];
			if(empty($page) || $page<0 || !is_numeric($page)){	//进行容错
			$page = 1;
			}else{
			$page = intval($_GET['page']);
			}
		}else{
			$page = 1;
		}
		$pagelimit = 10;	//每分页显示10条数据
		
		$sql = "SELECT `tc_id` FROM `tc_photo` WHERE `tc_pid`='{$_GET['id']}'";
		$query = mysql_query($sql);
		$counter = mysql_num_rows($query);		//总记录条数
		
		if($counter == 0){
			$pagenum = 1;	//如果没有数据,默认第一页
		}else{
			$pagenum = ceil($counter/$pagelimit);		//总页数
		}
		
		if($page > $pagenum){	//如果$_GET['page']传递的参数的值大于总页数,用总页数覆盖$_GET['page']传递的值
			$page = $pagenum;
		}
		$pag = ($page-1)*$pagelimit;
		
		//读取相册目录数据
			$sql = "SELECT
							`tc_id`,
							`tc_pid`,
							`tc_photo_name`,
							`tc_photo_content`,
							`tc_photo_path`,
							`tc_photo_username`,
							`tc_read_count`,
							`tc_comment_count`
					FROM
							`tc_photo`
					WHERE
							`tc_pid`='{$_GET['id']}'
				ORDER BY
							`tc_photo_time`
					DESC
					LIMIT	 $pag,$pagelimit
		";
		$query = mysql_query($sql);
		//$rs = mysql_fetch_array($query);
	}else{
		pushAlert2('非法访问!');
	}
	
	//对比相册密码
	if(!empty($_POST['sub'])){
		//echo md5(123456).'<br />';
		$checkStr = "SELECT `tc_id`,`tc_dir_name` FROM `tc_dir` WHERE `tc_id`='{$_POST['id']}' AND `tc_dir_pass`='".md5($_POST['pass'])."' LIMIT 1";
		
		//echo $checkStr;
		//exit();
		$checkPass = mysql_fetch_array(mysql_query($checkStr));
	
		if(!empty($checkPass['tc_id'])){
			setcookie('photo'.$checkPass['tc_id'],$checkPass['tc_dir_name']);
			pushLocation2('密码正确', 'photo_show_list.php?id='.$checkPass['tc_id']);
		}else{
			pushAlert2('密码不正确');
		}
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--相片列表</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_show_list.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/blog.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="photo-show">
			<h2>相片列表</h2>	
			<?php 
				if(!empty($rsStr['tc_dir_type']) || !empty($_COOKIE['photo'.$_GET['id']]) || $_SESSION['level']==1){
				while(!!$rs=mysql_fetch_array($query)){
			?>
			<dl>
				<dt><a href="photo_show_detail.php?id=<?php echo $rs['tc_id'];?>" title="<?php echo $rs['tc_photo_content'];?>"><img src="thumb.php?img=<?php echo $rs['tc_photo_path'];?>&per=0.3" /></a></dt>
				<dd><?php echo $rs['tc_photo_name'];?></dd>
				<dd>上传者:<?php echo $rs['tc_photo_username'];?>&nbsp;&nbsp;阅(<?php echo $rs['tc_read_count'];?>)&nbsp;&nbsp;评(<?php echo $rs['tc_comment_count'];?>)</dd>
			</dl>
			<?php }?>
			<div class="clear"></div>
			<?php
					pageList('photo_show_list.php','?id='.$_GET[id].'&',$pagenum,$page);
			?>
			<div class="clear"></div>
			<div id="add-dir"><a href="photo_add_img.php?id=<?php echo $_GET[id];?>" title="上传相片" id="dir">上传相片</a></div>
			<?php 
					}else{
			?>
			<form action="" method="post">
				<p>
					请输入密码:<input type="password" name="pass" />
							 <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
							 <input type="submit" name="sub" value="确认密码" />
				</p>
			</form>
			<?php }?>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>