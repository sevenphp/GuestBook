<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
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
	$pagelimit = $GLOBALS['sys_blog'];	//每分页显示10条数据
	
	$sql = "SELECT `tc_id` FROM `tc_dir`";
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
					`tc_id`,`tc_dir_name`,`tc_dir_type`,`tc_dir_face`
			 FROM
					`tc_dir`
		 ORDER BY
					`tc_dir_time`
			DESC
			LIMIT	 $pag,$pagelimit
			";
	$query = mysql_query($sql);
	//$rs = mysql_fetch_array($query);
	

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--相册列表</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<!-- <script type="text/javascript" src="js/blog.js"></script> -->
		<script type="text/javascript" src="js/photo.js"></script>
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="photo">
			<h2>相册列表</h2>	
			<?php 
				while(!!$rs = mysql_fetch_array($query)){
					if(empty($rs['tc_dir_type'])){
						$rs_html = '私密';
					}else{
						$rs_html = '公开';
					}
					$face_html = '<img src="'.$rs['tc_dir_face'].'" alt="封面"/>';
					//读取对应相册中的相片总数
					$sqlStr = "SELECT COUNT(*) AS count FROM `tc_photo` WHERE `tc_pid`='{$rs['tc_id']}'";
					$rsStr = mysql_fetch_array(mysql_query($sqlStr));
			?>
			<dl>
				<dt><a href="photo_show_list.php?id=<?php echo $rs['tc_id'];?>"><?php echo $face_html;?></a></dt>
				<dd title="<?php echo $rs['tc_dir_name'];?>"><?php echo mb_substr($rs['tc_dir_name'],0,15,'utf-8');?>(<?php echo $rsStr['count'];?>)</dd>
				<dd>(<?php echo $rs_html;?>)</dd>
				<?php 
					if(isset($_COOKIE['username']) && $_SESSION['level'] == 1){
				?>
				<dd>[<a href="javascript:;" name="modify" title="<?php echo $rs['tc_id']; ?>">修改</a>][<a href="photo_del_dir.php?id=<?php echo $rs['tc_id']; ?>" name="del">删除</a>]</dd>
				<?php }?>
			</dl>
			<?php }?>
			<div class="clear"></div>
			<?php
				pageList('photo.php','?',$pagenum,$page);
			?>
			<?php 
				if(isset($_COOKIE['username']) && $_SESSION['level'] == 1){
			?>
			<div class="clear"></div>
			<div id="add-dir"><a href="javascript:;" title="添加相册" id="dir">添加相册</a></div>
			<?php }?>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>