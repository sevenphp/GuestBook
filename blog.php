<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
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
	
	$sql = "select tc_id from tc_user";
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
	

	$sql = "select `tc_id`,`tc_username`,`tc_sex`,`tc_face` from `tc_user` order by tc_reg_time desc limit $pag,$pagelimit";
	$query = mysql_query($sql);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--登录</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/blog.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/blog.js"></script>
		<!-- <script type="text/javascript" src="js/face.js"></script> -->
		<!-- <script type="text/javascript" src="js/login.js"></script> -->
		<!-- <script type="text/javascript" src="js/validator.js"></script>
		<script type="text/javascript" src="js/reg.ajax.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="blog">
			<h2>博友列表</h2>
			<?php
				while(!!$rs = mysql_fetch_array($query)){
					if($rs['tc_sex'] == '男'){
						$ta = '他';
					}elseif($rs['tc_sex'] == '女'){
						$ta = '她';
					}
			?>			
			<dl>
				<dt><?php echo $rs['tc_username']; ?>(<?php echo $rs['tc_sex']; ?>)</dt>
				<dd id="face"><img src="<?php echo $rs['tc_face']?>" alt="<?php echo $rs['tc_face']?>" /></dd>
				<dd id="message"><a href="javascript:;" name="message" title="<?php echo $rs['tc_id'];?>" >发消息</a></dd>
				<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $rs['tc_id'];?>">加为好友</a></dd>
				<dd id="guest">写留言</dd>
				<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $rs['tc_id'];?>" >给<?php echo $ta; ?>送花</a></dd>
			</dl>
			<?php
				}
			?>
			<div class="clear"></div>
			<?php
				pageList('blog.php','?',$pagenum,$page);
			?>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>