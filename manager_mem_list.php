<?php
	define('IN_TAG', true);
	header('Content-Type:text/html;charset=utf-8');
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	checkManger();
	
	if(isset($_COOKIE['username'])){
	
		//先验证一下cookie和uniqid，防止cookie伪造攻击
		$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		
		if(isset($rs['tc_uniqid'])){
			//mysql_close();
			checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常	
	
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
			$pagelimit = 15;	//每分页显示10条数据
			
			$sql = "SELECT `tc_id` FROM `tc_user`";
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
			
		
			$sql = "SELECT `tc_id`,`tc_username`,`tc_email`,`tc_reg_time` FROM `tc_user` ORDER BY `tc_reg_time` ASC LIMIT $pag,$pagelimit";
			$query = mysql_query($sql);		
	
		}
	}else{
		pushLocation2('请登陆后再进行此操作', 'login.php');
	}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--博友列表管理</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/manager_mem_list.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message_checked.js"></script>
		<script type="text/javascript" src="js/manager_mem_list.js"></script>
		<!--<script type="text/javascript" src="js/login.js"></script> -->
		<!-- <script type="text/javascript" src="js/validator.js"></script>
		<script type="text/javascript" src="js/reg.ajax.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="member">
			<?php memberSlider();?>
			<div id="member-main">
				<h2>博友管理中心</h2>
				<form action="message_max_del.php" method="post" >
					<table border="1" cellspacing="0">
						<tr>
							<th>博友ID</th>
							<th>博友名称</th>
							<th>博友邮箱</th>
							<th>注册时间</th>
							<th>操作</th>
						</tr>
						<?php
							while(!!$rs = mysql_fetch_array($query)){
									/* if(empty($rs['tc_state'])){
										$img='<img src="images/read.gif" alt="未读" title="未读" />';
										$content = '<strong>'.$rs['tc_content'].'</strong>';
									}else{
										$img='<img src="images/noread.gif" alt="已读" title="已读" />';
										$content = $rs['tc_content'];
									} */
						?>	
						<tr>
							<td><?php echo $rs['tc_id']; ?></td>
							<td class="content"><?php echo $rs['tc_username']; ?></td>
							<td><?php echo $rs['tc_email']; ?></td>
							<td>
								<?php
									echo $rs['tc_reg_time'];
								?>
							</td>
							<td><!-- <input type="checkbox" name="checkbox[]" value=" --><?php //echo $rs['tc_id']; ?><!-- "/> -->[<a href="manager_memlist_del.php?delid=<?php echo $rs['tc_id']; ?>" class="managerDel" >删除</a>][<a href="manager_memlist_modify.php?modifyid=<?php echo $rs['tc_id']; ?>" class="managerModify" >修改</a>]</td>
						</tr>
						<?php
							}
						?>
					</table>
				</form>
				<?php
					pageList('manager_mem_list.php','?',$pagenum,$page);
				?>
			</div>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>