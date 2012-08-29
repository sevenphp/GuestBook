<?php
/**
*@author              	anshao
*@date                  2012-7-24
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	session_start();
	define('IN_TAG',true);
	
	require 'includes/common.inc.php';
	

 	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否有该id对应的帖子
		$sql = "SELECT `tc_id` FROM `tc_article` WHERE `tc_id`={$_GET['id']} LIMIT 1";
		mysql_query($sql);
		if(mysql_affected_rows() == 1){	//说明有该id对应的帖子
			//更新阅读数
			$sql = "UPDATE `tc_article` SET tc_read_count=tc_read_count+1 WHERE `tc_id`={$_GET['id']}";
			mysql_query($sql);
			
			//取数据
			$sql = "SELECT `tc_id`,`tc_art_author`,`tc_art_type`,`tc_art_title`,`tc_art_content`,`tc_read_count`,`tc_comment_count`,`tc_sent_time`,`tc_modify_time` FROM `tc_article` WHERE `tc_id`='{$_GET
			['id']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
			$art = array();
			$art['reid'] = $rs['tc_id'];
			$art['user'] = $rs['tc_art_author'];
			$art['type'] = $rs['tc_art_type'];
			$art['title'] = $rs['tc_art_title'];
			$art['content'] = $rs['tc_art_content'];
			$art['read_count'] = $rs['tc_read_count'];
			$art['comment_count'] = $rs['tc_comment_count'];
			$art['time'] = $rs['tc_sent_time'];
			$art['modify_time'] = $rs['tc_modify_time'];
			//获取发帖者信息
			$sql = "SELECT `tc_id`,`tc_sex`,`tc_face`,`tc_switch`,`tc_sign` FROM `tc_user` WHERE `tc_username`='{$art['user']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			$art['sex'] = $rs['tc_sex'];
			$art['face'] = $rs['tc_face'];
			$art['userid'] = $rs['tc_id'];
			$art['switch'] = $rs['tc_switch'];
			$art['sign'] = $rs['tc_sign'];
			if($art['sex'] == '男'){
				$his = '他';
			}elseif($art['sex'] == '女'){
				$his = '她';
			}
			
			//显示个性签名
			if($art['switch'] == 1){
				$art['sign_html'] = '<li class="sign"><center>'.$art['user'].'的个性签名</center>'.$art['sign'].'</li>';
			}else{
				$art['sign_html'] = '';
			}
			
			//出现更改的文字
			if($art['modify_time'] != '0000-00-00 00:00:00'){
				$art['modify_html'] = '<p class="modify">文章于'.$art['modify_time'].'被'.$art['user'].'修改</p>';
			}
			//在主题帖标题后出现<修改帖子>四字
			if($art['user'] == $_COOKIE['username']){
				$art['modify'] = '[<a href="article_modify.php?id='.$art['reid'].'">修改帖子</a>]';
			}
			
		}else{
			mysql_close();
			pushLocation2('没有该帖子或该帖子已经被删除!', 'index.php');
		}
	}//else{
		//pushLocation2('传递参数有错误', 'index.php');
	//}
	
	//发表主题帖子回复(评论)
	if(!empty($_POST['sent'])){
		$comment = array();	
		$comment['reid'] = $_POST['reid'];
		$comment['title'] = $_POST['title'];
		$comment['type'] = $_POST['type'];
		$comment['user'] = $_COOKIE['username'];
		$comment['content'] = mysql_real_escape_string($_POST['content']);
			
		//先验证一下cookie和uniqid，防止cookie伪造攻击语句
		$sql = "SELECT `tc_uniqid`,`tc_re_time` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		
		//发表语句
		$sqlStr = "INSERT INTO `tc_article`(
											`tc_reid`,
											`tc_art_author`,
											`tc_art_type`,
											`tc_art_title`,
											`tc_art_content`,
											`tc_sent_time`
										) 
								  VALUES(
											'{$comment['reid']}',
											'{$_COOKIE['username']}',
											'{$comment['type']}',
											'{$comment['title']}',
											'{$comment['content']}',
											NOW()
										)
				";
			
		if($GLOBALS['sys_code'] == 1){	//有验证码
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
			
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
				
			if(isset($rs['tc_uniqid'])){
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');
					
				//限时发表回复
				reducedTime($rs['tc_re_time'], time(), $GLOBALS['sys_re']);
					
				mysql_query($sqlStr);	// or die(mysql_error());
			}
		}elseif($GLOBALS['sys_code'] == 0){		//没验证码
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
			if(isset($rs['tc_uniqid'])){
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');
			
				//限时发表回复
				reducedTime($rs['tc_re_time'], time(), $GLOBALS['sys_re']);
					
				mysql_query($sqlStr);	// or die(mysql_error());
			}
		}
			
			if(mysql_affected_rows() == 1){
				$sql = "UPDATE `tc_article` SET `tc_comment_count`=`tc_comment_count`+1 WHERE `tc_id`='{$comment['reid']}'";
				mysql_query($sql);
					
				//限时发回复
				$firstTime = time();	//采用数据库保存上次发帖的时间的方式限时发帖
				$sql = "UPDATE `tc_user` SET `tc_re_time`='{$firstTime}' WHERE `tc_username`='{$_COOKIE['username']}'";
				mysql_query($sql);
					
				mysql_close();
				pushLocation2('回帖成功！','article_detail.php?id='.$comment['reid']);
			}else{
				mysql_close();
				pushAlert2('回帖失败!');
			}
	}
	
	//在主题贴标题后出现<回复>两字
	if(!empty($_COOKIE['username'])){
		$reAuthor = '[<a href="#reid" name="reauthor" title="RE:'.$art['title'].'">回复</a>]';	//回复主题贴发贴人
	}
	

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $GLOBALS['sys_title'];?>--帖子详情</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/article_detail.css" />
	<link rel="stylesheet" type="text/css" href="styles/re.css" />
	<link rel="stylesheet" type="text/css" href="styles/re_detail.css" />
	<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
	<link href="favicon.ico" rel="Shortcut Icon" />
	<link href="favicon.ico" rel="Bookmark" />
	<script type="text/javascript" src="js/article_detail.js"></script>
	<script type="text/javascript" charset="UTF-8" src="editor/kindeditor.js"> </script>
	<script type="text/javascript" charset="UTF-8" src="editor/lang/zh_CN.js"> </script>
	<script>
	        var editor;
	        KindEditor.ready(function(K) {
	                editor = K.create('#editor_id');
	        });
	</script>
</head>
<body>
	<div id="container">
		<?php 
			require('includes/header.inc.php');
		?>
		<div id="article">
			<h2>帖子详情</h2>
			<div class="detail">
				<?php 
					if(empty($_GET['page']) || ($_GET['page']==1)){
				?>
				<div id="article-left">
					<dl>
						<dt><?php echo $art['user']; ?>(<?php echo $art['sex']; ?>)</dt>
						<dd id="face"><img src="<?php echo $art['face']; ?>" alt="<?php echo $art['face'];?>" /></dd>
						<dd id="message"><a href="javascript:;" name="message" title="<?php echo $art['userid'];?>" >发消息</a></dd>
						<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $art['userid'];?>">加为好友</a></dd>
						<dd id="guest">写留言</dd>
						<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $art['userid'];?>" >给<?php echo $his; ?>送花</a></dd>
					</dl>
				</div>
				<div id="article-right">
					<ul>
						<li class="top"><?php echo $art['user'];?> | 发表于:<?php echo $art['time']; ?>&nbsp;&nbsp;<?php echo $reAuthor;?>&nbsp;&nbsp;<?php echo $art['modify'];?><span>1#</span></li>
						<li class="mid">
							<h3><img src="images/icon<?php echo $art['type']; ?>.gif" />&nbsp;<?php echo $art['title'];?></h3>
							<span>
								<?php 
									echo $art['content'];
								?>
							</span>

							<?php 
								//修改
								echo $art['modify_html'];
							?>
						</li>
						<?php 
							//显示个性签名
							echo $art['sign_html'];
						?>
						<li class="bottom">阅读数(<?php echo $art['read_count'];?>)&nbsp;&nbsp;评论数(<?php echo $art['comment_count'];?>)</li>
					</ul>
				</div>
				<div class="clear"></div>
				<?php }?>
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
						$pagelimit = $GLOBALS['sys_art'];	//每分页显示10条数据
						
						$sql = "SELECT `tc_id` FROM `tc_article` WHERE `tc_reid`='{$_GET['id']}'";
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
						//读取帖子回复
						$sql = "SELECT `tc_art_author`,`tc_art_type`,`tc_art_title`,`tc_art_content`,`tc_comment_count`,`tc_sent_time` FROM `tc_article` WHERE `tc_reid`='{$_GET
			['id']}' ORDER BY `tc_sent_time` ASC LIMIT $pag,$pagelimit";
						$query = mysql_query($sql);
						
						$lou = 2;
						$reLou = '';	//回复楼层
						$quoteLou = '';		//引用楼层
						while(!!$rs = mysql_fetch_array($query)){
							if(!empty($_COOKIE['username'])){	//回复主题贴评论人
								$reLou = '[<a href="#reid" name="reuser" title="RE:第'.($lou+(($page-1)*$pagelimit)).'楼的'.$rs['tc_art_author'].'的帖子">回复</a>]&nbsp;&nbsp;';
								$quoteLou = '[<a href="#reid" name="quoteuser" title="QUOTE:第'.($lou+(($page-1)*$pagelimit)).'楼的'.$rs['tc_art_author'].'的帖子">引用</a>]&nbsp;&nbsp;';
							}
							
							$sql = "SELECT `tc_id`,`tc_username`,`tc_sex`,`tc_face`,`tc_switch`,`tc_sign` FROM `tc_user` WHERE `tc_username`='{$rs['tc_art_author']}' LIMIT 1";
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
							<li class="top"><?php echo $rs['tc_art_author'];?> | 发表于:<?php echo $rs['tc_sent_time']; ?>&nbsp;&nbsp;<?php echo $reLou; //echo $quoteLou;?><span><?php echo $lou+(($page-1)*$pagelimit);?>#</span></li>
							<li class="mid">
								<h3><img src="images/icon<?php echo $rs['tc_art_type'];?>.gif" />&nbsp;<?php echo $rs['tc_art_title'];?></h3>
								<span class="quotecontent">
									<?php 
										echo $rs['tc_art_content'];
									?>
								</span>
							</li>
							<?php echo $rsInfoHtml['sign_html'];?>
							<!-- <li class="bottom">阅读数( --><?php //echo $art['read_count'];?><!-- )&nbsp;&nbsp;评论数( --><?php //echo $art['comment_count'];?><!-- )</li> -->
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
						pageList('article_detail.php?id='.$art['reid'],'&',$pagenum,$page);
					?>
				</div>
				<?php 
					if(!empty($_COOKIE['username'])){
						//$sql = "SELECT "
		
						//获取发帖者信息
						$sql = "SELECT `tc_id`,`tc_sex`,`tc_face` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
						$query = mysql_query($sql);
						$rs = mysql_fetch_array($query);
						$art['sex'] = $rs['tc_sex'];
						$art['face'] = $rs['tc_face'];
						$art['id'] = $rs['tc_id'];
						if($art['sex'] == '男'){
							$his = '他';
						}elseif($art['sex'] == '女'){
							$his = '她';
						}
				?>
				<div id="re">
					<div id="re-left">
						<dl>
							<dt><?php echo $_COOKIE['username']; ?>(<?php echo $art['sex']; ?>)</dt>
							<dd id="face"><img src="<?php echo $art['face']; ?>" alt="<?php echo $art['face'];?>" /></dd>
							<dd id="message"><a href="javascript:;" name="message" title="<?php echo $art['id'];?>" >发消息</a></dd>
							<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $art['id'];?>">加为好友</a></dd>
							<dd id="guest">写留言</dd>
							<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $art['id'];?>" >给<?php echo $his; ?>送花</a></dd>
						</dl>
					</div>
					<div id="re-right">
						<a name="reid"></a>
						<form action="article_detail.php" method="post">
							<dl>
								<dd><input type="hidden" name="reid" value="<?php echo $art['reid']; ?>" /></dd>
								<dd><input type="hidden" name="type" value="<?php echo $art['type']; ?>" /></dd>
								<dd class="type_img"><label>标题:<input type="text" name="title" class="text title" readonly="readonly" value="RE:<?php echo $art['title']; ?>" /></label>&nbsp;<img src="images/icon<?php echo $art['type']; ?>.gif" /></dd>
								<dd><textarea id="editor_id" name="content" class="text"></textarea></dd>
								<?php echo isDisplayCode2('回复帖子'); ?>
							</dl>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				<?php 
					}else{
				?>
				<div id="need">
					<p>
						请先<a href="login.php" title="登录" >登录</a>才能发表评论,没有账号,请<a href="reg.php" title="注册" >注册</a>
					</p>
				</div>
				<?php
					}
				?>
			</div>
		</div>

		<?php 
			require('includes/footer.inc.php');
		?>
	</div>
</body>
</html>
