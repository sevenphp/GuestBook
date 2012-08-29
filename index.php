<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/

	define('IN_TAG',true);
	
	require 'includes/common.inc.php';
	
	//读取保存最新注册用户的XML文件(userInfo.xml)
	$newUserInfo = readUserInfoXml('userInfo.xml');
	
	
	//获取最新图片
	$sqlImg = "SELECT `tc_id`,`tc_photo_path`,`tc_photo_username` FROM `tc_photo` ORDER BY `tc_id` DESC LIMIT 1";
	$queryImg = mysql_query($sqlImg);
	$rsImg = mysql_fetch_array($queryImg);
	
	
	//显示帖子列表
	//分页
	if(isset($_GET['page'])){	//为$_GET['page']做判断,
		$page = $_GET['page'];
		if(empty($page) || $page<0 || !is_numeric($page)){	//进行容错
			$page = 1;
		}else{
			$page = intval($_GET['page']);	//Get the integer value of a variable
		}
	}else{
		$page = 1;
	}
	$pagelimit = $GLOBALS['sys_art'];	//每分页显示10条数据
		
	$sql = "SELECT `tc_id` FROM `tc_article` WHERE `tc_reid`=0";
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
	
	$sql = "SELECT `tc_id`,`tc_art_title`,`tc_art_type`,`tc_read_count`,`tc_comment_count` FROM `tc_article` WHERE `tc_reid`=0 ORDER BY `tc_sent_time` DESC LIMIT $pag,$pagelimit";
	$query = mysql_query($sql);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--首页</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/index.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_list.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/blog.js"></script>
	</head>
	<body>
		<div id="container">
			<?php 
				require('includes/header.inc.php');
			?>
			<div id="main-left">
				<div id="left-top">
					<h2>新进会员</h2>
					<dl>
						<dt><?php echo $newUserInfo['username']; ?>(<?php echo $newUserInfo['sex']; ?>)</dt>
						<dd id="face"><img src="<?php echo $newUserInfo['face'];?>" alt="<?php echo $newUserInfo['face'];?>" /></dd>
						<dd id="message"><a href="javascript:;" name="message" title="<?php echo $newUserInfo['id'];?>" >发消息</a></dd>
						<dd id="friend"><a href="javascript:;" name="friend" title="<?php echo $newUserInfo['id'];?>">加为好友</a></dd>
						<dd id="guest">写留言</dd>
						<dd id="flower"><a href="javascript:;" name="flower" title="<?php echo $newUserInfo['id'];?>" >给她送花</a></dd>
						<dd id="email"><a href="mailto:<?php echo $newUserInfo['email'];?>"><?php echo $newUserInfo['email'];?></a></dd>
						<dd id="site"><a href="<?php echo $newUserInfo['site']; ?>"><?php echo $newUserInfo['site']; ?></a></dd>
					</dl>					
				</div>
				<div id="left-bottom">
					<h2>最新图片</h2>
					<a href="photo_show_detail.php?id=<?php echo $rsImg['tc_id'];?>" title="上传者:<?php echo $rsImg['tc_photo_username'];?>">
						<img src="thumb.php?img=<?php echo $rsImg['tc_photo_path'];?>&per=0.3" />
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div id="main-right">
				<div id="right-list">
					<h2>帖子列表</h2>
					<a href="javascript:;" class="post_article" name="post_article"><img src="images/article.jpg" alt="发表帖子" title="发表帖子" /></a>
					<div class="clear"></div>
					<dl>
						<?php 
							$art_index = array();
							while (!!$rs = mysql_fetch_array($query)){
								
								$art_index['id'] = htmlspecialchars($rs['tc_id']);
								$art_index['title'] = htmlspecialchars($rs['tc_art_title']);
								$art_index['type'] = htmlspecialchars($rs['tc_art_type']);
								$art_index['read_count'] = htmlspecialchars($rs['tc_read_count']);
								$art_index['comment_count'] = htmlspecialchars($rs['tc_comment_count']);
								
						?>
						<dd class="icon<?php echo $art_index['type']; ?>"><a href="article_detail.php?id=<?php echo $art_index['id']; ?>" title="<?php echo $art_index['title']; ?>"><?php echo iconv_substr($art_index['title'], 0,18,'utf-8').'...';?></a><span>阅读数(<a href="javascript:;"><?php echo $art_index['read_count']; ?></a>)&#12288;评论数(<a href="javascript:;"><?php echo $art_index['comment_count']; ?></a>)</span></dd>
						<?php 
							}
						?>
					</dl>
					<?php
						pageList('index.php','?',$pagenum,$page);
					?>
				</div>
			</div>			
			<div class="clear">
			
			</div>
			<?php 
				require('includes/footer.inc.php');
			?>
		</div>
	</body>
</html>