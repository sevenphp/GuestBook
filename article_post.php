<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	session_start();
	define('IN_TAG',true);
	
	require 'includes/common.inc.php';
	
	//判断用户是否登录
	if(!isset($_COOKIE['username'])){
		pushCloseWindow('请先登陆,再发表帖子!');
	}
	
	if(!empty($_POST['sent'])){
		
		$sql = "SELECT `tc_uniqid`,`tc_post_time` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
		
		$article = array();
		$article['art_title'] = mysql_real_escape_string($_POST['title']);
		$article['art_type'] = mysql_real_escape_string($_POST['article_type']);
		$article['art_content'] = mysql_real_escape_string($_POST['content']);
			
		$sqlStr = "INSERT INTO `tc_article`(
												`tc_art_author`,
												`tc_art_title`,
												`tc_art_type`,
												`tc_art_content`,
												`tc_sent_time`
										   )
								     VALUES(
												'{$_COOKIE['username']}',
												'{$article['art_title']}',
												'{$article['art_type']}',
												'{$article['art_content']}',
												NOW()
										   )
				";
		
		if($GLOBALS['sys_code'] == 1){	//有验证码
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
			
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
				
			if(isset($rs['tc_uniqid'])){
				//mysql_close();
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常
					
				//限时发帖
				reducedTime($rs['tc_post_time'], time(), $GLOBALS['sys_post']);
				
				mysql_query($sql);
			}
			
		}elseif($GLOBALS['sys_code'] == 0){	//无验证码

			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
			if(isset($rs['tc_uniqid'])){
				//mysql_close();
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常
					
				//限时发帖
				reducedTime($rs['tc_post_time'], time(), $GLOBALS['sys_post']);

				mysql_query($sqlStr);
			}
		}
				
			if(mysql_affected_rows() == 1){
				//setcookie('post_time',time());	//1.采用cookie保存上次发帖的时间的方式限时发帖
				$firstTime = time();	//2.采用数据库保存上次发帖的时间的方式限时发帖
				$sql = "UPDATE `tc_user` SET `tc_post_time`='{$firstTime}' WHERE `tc_username`='{$_COOKIE['username']}'";
				mysql_query($sql);
					
				mysql_close();
				pushCloseWindow('帖子发表成功！');
			}else{
				mysql_close();
				pushCloseWindow('帖子发表失败！');
			}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--发表帖子</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/post_article.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message.js"></script>
		<script type="text/javascript" charset="UTF-8" src="editor/kindeditor.js"> </script>
		<script type="text/javascript" charset="UTF-8" src="editor/lang/zh_CN.js"> </script>
		<script>
		        var editor;
		      	//var editor_id = document.getElementById('editor_id');
		      	//alert(editor_id);
		        KindEditor.ready(function(K) {
		                editor = K.create('#editor_id');
		        });
		</script>
	</head>
	<body>
		<div id="post_article">
			<h3>发表帖子</h3>
			<form action="" method="post">
				<dl>
					<dd><label>标题:<input type="text" name="title" class="text title" /></label></dd>
					<dd class="type">
						类型:
						<?php
							foreach(range(1,16) as $num){
								if($num == 1){
									echo '<label><input type="radio" name="article_type" checked="checked" value="'.$num.'" /><img src="images/icon'.$num.'.gif" alt="icon'.$num.'" /></label>&nbsp;';
								}else{
									echo '<label><input type="radio" name="article_type" value="'.$num.'" /><img src="images/icon'.$num.'.gif" alt="icon'.$num.'" /></label>&nbsp;';
								}
								
								if($num % 8 == 0){
									echo '<br />&#12288;&#12288;&nbsp;&nbsp;';
								}
							}
						?>
					</dd>
					<dd><textarea id="editor_id" name="content" class="text"></textarea></dd>
					<?php echo isDisplayCode2('发表帖子'); ?>
				</dl>
			</form>
		</div>
	</body>
</html>