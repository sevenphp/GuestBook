<?php
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
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
			$pagelimit = 10;	//每分页显示10条数据
			
			$sql = "SELECT `tc_id` FROM `tc_flower` WHERE `tc_to_user`='{$_COOKIE['username']}'";
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
			$pag = ($page-1)*10;
			
		
			$sql = "SELECT `tc_id`,`tc_flower_count`,`tc_from_user`,`tc_content`,`tc_sent_time` FROM `tc_flower` WHERE `tc_to_user`='{$_COOKIE['username']}' ORDER BY `tc_sent_time` DESC LIMIT $pag,$pagelimit";
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
		<title><?php echo $GLOBALS['sys_title'];?>--花朵列表</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/message_list.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message_checked.js"></script>
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
			<div id="member-slider">
				<h2>中心导航</h2>
				<dl>
					<dt>账号管理</dt>
					<dd><a href="member.php">个人信息</a></dd>
					<dd><a href="member_modify.php">修改资料</a></dd>
				</dl>
				<dl>
					<dt>其他管理</dt>
					<dd><a href="message_list.php">消息查阅</a></dd>
					<dd><a href="friend_list.php">好友设置</a></dd>
					<dd><a href="#">查询花朵</a></dd>
					<dd><a href="#">个人相册</a></dd>
				</dl>
			</div>
			<div id="member-main">
				<h2>花朵管理中心</h2>
				<form action="flower_mutil_del.php" method="post" >
					<table border="1" cellspacing="0">
						<tr>
							<th>送花人</th>
							<th>送花留言</th>
							<th>送花数量</th>
							<th>送花时间</th>
							<th>操作</th>
						</tr>
						<?php
							$flower_count = '';
							while(!!$rs = mysql_fetch_array($query)){	//!!是为了符合zend studio的语法检查
									$flower_count += $rs['tc_flower_count'];
						?>	
						<tr>
							<td><?php echo $rs['tc_from_user']; ?></td>
							<td class="content" title="<?php echo $rs['tc_content'];?>"><?php echo iconv_substr($rs['tc_content'], 0,10,'utf-8').'...'; ?></td>
							<td><img src="images/x4.gif" alt="花朵" />x<?php echo $rs['tc_flower_count'];?></td>
							<td>
								<?php echo $rs['tc_sent_time']; ?>
							</td>
							<td><input type="checkbox" name="checkbox[]" value="<?php echo $rs['tc_id']; ?>"/></td>
						</tr>
						<?php
							}
						?>
						<tr><td colspan="5">共收到<img src="images/x4.gif" alt="花朵" />x<?php echo $flower_count; ?></td></tr>
						<tr><td colspan="5" class="maxdel"><label>全选<input type="checkbox" name="checkall" id="chkall" /></label>&nbsp;&nbsp;<input type="submit" name="mutildel" value="批量删除" /></td></tr>
					</table>
				</form>
				<?php
					pageList('flower_list.php','?',$pagenum,$page);
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