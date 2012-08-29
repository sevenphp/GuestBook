<?php
	define('IN_TAG', true);
	header('Content-Type:text/html;charset="utf-8"');
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(!isset($_COOKIE['username'])){
		pushAlert2('请先登录再进行操作!');
	}
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在此相片
		$sql = "SELECT `tc_id`,`tc_pid` FROM `tc_photo` WHERE `tc_id`='{$_GET['id']}' LIMIT 1";
		$rs = mysql_fetch_array(mysql_query($sql));
		if(empty($rs)){
			pushAlert2('不存在此相片');
			exit();
		}
		
		$sqlStr = "SELECT `tc_id`,`tc_dir_type` FROM `tc_dir` WHERE `tc_id`='{$rs['tc_pid']}' LIMIT 1";
		$rsStr = mysql_fetch_array(mysql_query($sqlStr));
		
/* 		echo $rsStr['tc_dir_type'].'<br />';
		echo $_COOKIE['photo'.$rsStr['tc_id']].'<br />';
		echo $_SESSION['level'];
		exit(); */
		
/* 		if(empty($rsStr['tc_dir_type']) || empty($_COOKIE['photo'.$rsStr['tc_id']]) || $_SESSION['level']==0){
			pushLocation2('非法访问', 'photo_show_list.php?id='.$rsStr['tc_id']);
		}else{ */
		
		//更新阅读量
		$sql = "UPDATE `tc_photo` SET `tc_read_count`=`tc_read_count`+1 WHERE `tc_id`={$_GET['id']}";
		mysql_query($sql);
		
		//获取相片详情
		$sql = "SELECT
						`tc_pid`,
						`tc_photo_name`,
						`tc_photo_path`,
						`tc_photo_content`,
						`tc_photo_time`,
						`tc_photo_username`,
						`tc_read_count`,
						`tc_comment_count`
				FROM
						`tc_photo`
				WHERE
						`tc_id`='{$_GET['id']}'
				LIMIT
							1
				";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query);
		
		$photoInfo = array();
		$photoInfo['pid'] =$rs['tc_pid'];
		$photoInfo['name'] = $rs['tc_photo_name'];
		$photoInfo['path'] = $rs['tc_photo_path'];
		$photoInfo['content'] = $rs['tc_photo_content'];
		$photoInfo['time'] = $rs['tc_photo_time'];
		$photoInfo['username'] = $rs['tc_photo_username'];
		$photoInfo['read'] = $rs['tc_read_count'];
		$photoInfo['comment'] = $rs['tc_comment_count'];
		
		//获取上一张图片id(取得大于当前id的所有id中的最小id)
		$sqlId = "SELECT MIN(`tc_id`) AS id FROM `tc_photo` WHERE `tc_id`>'{$_GET['id']}' AND `tc_pid`='{$photoInfo['pid']}'";
		$minID = mysql_fetch_array(mysql_query($sqlId));
		if(empty($minID['id'])){
			$preHtml = '到头了';
		}else{
			$preHtml = '<a href="photo_show_detail.php?id='.$minID['id'].'#forimg">上一张</a>';
		}
		
		//获取下一张图片id(取得小于当前id的所有id中最大的id)
		$sqlId = "SELECT MAX(`tc_id`) AS id FROM `tc_photo` WHERE `tc_id`<'{$_GET['id']}' AND `tc_pid`='{$photoInfo['pid']}'";
		$maxID = mysql_fetch_array(mysql_query($sqlId));
		if(empty($maxID['id'])){
			$nextHtml = '到尾了';
		}else{
			$nextHtml = '<a href="photo_show_detail.php?id='.$maxID['id'].'#forimg">下一张</a>';
		}

		
	//获取登录用户的基本信息
		$sqlStr = "SELECT `tc_id`,`tc_sex`,`tc_face` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		$rsStr = mysql_fetch_array(mysql_query($sqlStr));
		if($rsStr['tc_sex'] == '男'){
			$sexHtml = '他';
		}elseif($rsStr['tc_sex'] == '女'){
			$sexHtml = '她';
		}
	}//else{
	//	pushAlert2('非法访问!');
	//}
	//}

	
	//对相片发表评论
	if(!empty($_POST['sent'])){		//点击了发表评论按钮
		$photoComment = array();
		$photoComment['pid'] = $_POST['pid'];
		$photoComment['name'] = $_POST['title'];
		$photoComment['content'] = $_POST['content'];
		$photoComment['user'] = $_COOKIE['username'];
		
		//查询唯一标识符的sql语句
		$sql = "SELECT `tc_uniqid`,`tc_photo_re_time` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		
		//发表评论的sql语句
		$sqlStr = "INSERT INTO `tc_photo_comment`(
													`tc_pid`,
													`tc_comment_name`,
													`tc_comment_content`,
													`tc_comment_user`,
													`tc_comment_time`
											     ) 
										  VALUES(
													'{$photoComment['pid']}',
													'{$photoComment['name']}',
													'{$photoComment['content']}',
													'{$photoComment['user']}',
													NOW()
												)
					";
		
		if($GLOBALS['sys_code'] == 1){	//有验证码
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
				
			$query = mysql_query($sql);		//执行查询唯一标识符的sql语句
			$rs = mysql_fetch_array($query);
		
			if(isset($rs['tc_uniqid'])){
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');	//判断唯一标识符是否异常
					
				//限时发表回复
				reducedTime($rs['tc_photo_re_time'], time(), $GLOBALS['sys_re']);
					
				mysql_query($sqlStr) or die(mysql_error());	// or die(mysql_error());
			}
		}elseif($GLOBALS['sys_code'] == 0){		//没验证码
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
				
			if(isset($rs['tc_uniqid'])){
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');
					
				//限时发表回复
				reducedTime($rs['tc_photo_re_time'], time(), $GLOBALS['sys_re']);
					
				mysql_query($sqlStr) or die(mysql_error());	// or die(mysql_error());
			}
		}
		
		if(mysql_affected_rows() == 1){
			//更新评论数
			$sql = "UPDATE `tc_photo` SET `tc_comment_count`=`tc_comment_count`+1 WHERE `tc_id`='{$photoComment['pid']}'";
			mysql_query($sql);
				
			//限时发回复
			$firstTime = time();	//采用数据库保存上次发帖的时间的方式限时发帖
			$sql = "UPDATE `tc_user` SET `tc_photo_re_time`='{$firstTime}' WHERE `tc_username`='{$_COOKIE['username']}'";
			mysql_query($sql);
				
			mysql_close();
			pushLocation2('评论成功！','photo_show_detail.php?id='.$photoComment['pid']);
		}else{
			mysql_close();
			pushAlert2('评论失败!');
		}
		
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--相片详情</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_show_detail.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_re.css" />
		<link rel="stylesheet" type="text/css" href="styles/photo_re_detail.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/photo_show_detail.js"></script>
		<script type="text/javascript" charset="UTF-8" src="editor/kindeditor-min.js"> </script>
		<script type="text/javascript" charset="UTF-8" src="editor/lang/zh_CN.js"> </script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
		</script>
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="photo-detail">
			<h2>相片详情</h2>	
			<dl id="photo-show-detail">
				<dt><a name="forimg"></a></dt>
				<dt><img src="<?php echo $photoInfo['path'];?>" title="<?php echo $photoInfo['content'];?>" alt="<?php echo $photoInfo['name'];?>"/></dt>
				<dd>名称:<span class="colors"><?php echo $photoInfo['name'];?></span>&nbsp;&nbsp;发表日期:<span class="colors"><?php echo $photoInfo['time'];?></span>&nbsp;&nbsp;发表人:<span class="colors"><?php echo $photoInfo['username'];?></span></dd>
				<dd>描述:<span class="colors"><?php echo $photoInfo['content'];?></span></dd>
				<dd>[<?php echo $preHtml;?>]&nbsp;&nbsp;&nbsp;[<a href="photo_show_list.php?id=<?php echo $photoInfo['pid'];?>">返回相片列表</a>]&nbsp;&nbsp;&nbsp;[<?php echo $nextHtml;?>]</dd>
				<dd>阅(<?php echo $photoInfo['read'];?>)&nbsp;&nbsp;评(<?php echo $photoInfo['comment'];?>)</dd>
			</dl>
			<div class="clear"></div>
			
			<div id="re-detail">
				<?php 
					//帖子回复分页
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
					$pagelimit = 5;//$GLOBALS['sys_art'];	//每分页显示10条数据
					
					$sql = "SELECT `tc_id` FROM `tc_photo_comment` WHERE `tc_pid`='{$_GET['id']}'";
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
					//读取相片评论
					$sql = "SELECT 
										`tc_pid`,
										`tc_comment_name`,
										`tc_comment_content`,
										`tc_comment_user`,
										`tc_comment_time` 
							FROM 
										`tc_photo_comment` 
							WHERE 
										`tc_pid`='{$_GET['id']}' 
						ORDER BY 
										`tc_comment_time` 
							ASC 
							LIMIT 
										$pag,$pagelimit
							";
					$query = mysql_query($sql);
					
					$lou = 1;
					//$reLou = '';	//回复楼层
					//$quoteLou = '';		//引用楼层
					while(!!$rs = mysql_fetch_array($query)){
						/* if(!empty($_COOKIE['username'])){	//回复主题贴评论人
							$reLou = '[<a href="#reid" name="reuser" title="RE:第'.($lou+(($page-1)*$pagelimit)).'楼的'.$rs['tc_art_author'].'的帖子">回复</a>]&nbsp;&nbsp;';
							$quoteLou = '[<a href="#reid" name="quoteuser" title="QUOTE:第'.($lou+(($page-1)*$pagelimit)).'楼的'.$rs['tc_art_author'].'的帖子">引用</a>]&nbsp;&nbsp;';
						} */
						
						$sql = "SELECT `tc_id`,`tc_username`,`tc_sex`,`tc_face`,`tc_switch`,`tc_sign` FROM `tc_user` WHERE `tc_username`='{$rs['tc_comment_user']}' LIMIT 1";
						$queryInfo = mysql_query($sql);
						
						$rsInfo = mysql_fetch_array($queryInfo);
						
						//个性签名相关
						$rsInfoHtml = array();
						$rsInfoHtml['switch'] = $rsInfo['tc_switch'];
						$rsInfoHtml['sign'] = $rsInfo['tc_sign'];
						
						//显示个性签名
						if($rsInfoHtml['switch'] == 1){
							$rsInfoHtml['sign_html'] = '<li class="sign"><center>'.$rsInfo['tc_username'].'的个性签名</center>'.$rsInfoHtml['sign'].'</li>';
						}else{
							$rsInfoHtml['sign_html'] = '';
						}
				?>
				<div class="re-detail-left">
					<dl>
						<dt><?php echo $rsInfo['tc_username']; ?>(<?php echo $rsInfo['tc_sex'];?>)</dt>
						<dd id="face"><img src="<?php echo $rsInfo['tc_face'];?>" alt="<?php echo $rsInfo['tc_face'];?>" /></dd>
						<dd id="message"><a href="javascript:;" name="message" title="<?php echo $rsInfo['tc_id'];?>" >发消息</a></dd>
						<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $rsInfo['tc_id'];?>">加为好友</a></dd>
						<dd id="guest">写留言</dd>
						<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $rsInfo['tc_id'];?>" >给<?php
						if($rsInfo['tc_sex'] == '女'){
							echo '她';
						}elseif($rsInfo['tc_sex'] == '男'){
							echo '他';
						}
					?>送花</a></dd>
					</dl>
				</div>
				<div class="re-detail-right">
					<ul>
						<li class="top"><?php echo $rs['tc_comment_user'];?> | 发表于:<?php echo $rs['tc_comment_time']; ?>&nbsp;&nbsp;<?php //echo $reLou; //echo $quoteLou;?><span><?php echo $lou+(($page-1)*$pagelimit);?>#</span></li>
						<li class="mid">
							<h3><?php echo $rs['tc_comment_name'];?></h3>
							<span class="quotecontent">
								<?php 
									echo $rs['tc_comment_content'];
								?>
							</span>
						</li>
						<?php echo $rsInfoHtml['sign_html'];?>
					</ul>
				</div>
				<?php 
					$lou++;
					}
				?>
				<div class="clear"></div>
			</div>
			<div id="list">
				<?php
					pageList('photo_show_detail.php?id='.$_GET['id'],'&',$pagenum,$page);
				?>
			</div>
			
			
			<div class="clear"></div>
			<div id="re">
				<div id="re-left">
					<dl>
						<dt><?php echo $_COOKIE['username']; ?>(<?php echo $rsStr['tc_sex']; ?>)</dt>
						<dd id="face"><img src="<?php echo $rsStr['tc_face']; ?>" alt="<?php echo $rsStr['tc_face']; ?>" /></dd>
						<dd id="message"><a href="javascript:;" name="message" title="<?php echo $rsStr['tc_id'];?>" >发消息</a></dd>
						<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $rsStr['tc_id'];?>">加为好友</a></dd>
						<dd id="guest">写留言</dd>
						<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $rsStr['tc_id'];?>" >给<?php echo $sexHtml;?>送花</a></dd>
					</dl>
				</div>
				<div id="re-right">
					<a name="reid"></a>
					<form action="photo_show_detail.php" method="post">
						<dl>
							<dd><input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>" /></dd>
							<dd class="type_img"><label>标题:<input type="text" name="title" class="text title" readonly="readonly" value="RE:<?php echo $photoInfo['name']; ?>" /></label></dd>
							<dd><textarea id="editor_id" name="content" class="text"></textarea></dd>
							<?php echo isDisplayCode2('发表评论'); ?>
						</dl>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>