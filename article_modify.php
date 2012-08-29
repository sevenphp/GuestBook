<?php
/**
*@author              	anshao
*@date                  Jul 30, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	session_start();
	define('IN_TAG',true);
	
	require 'includes/common.inc.php';
	
	if(empty($_COOKIE['username'])){
		pushLocation2('请先登录', 'index.php');
	}
	
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否有该id对应的帖子
		$sql = "SELECT `tc_id` FROM `tc_article` WHERE `tc_id`={$_GET['id']} LIMIT 1";
		mysql_query($sql);
		if(mysql_affected_rows() == 1){	//说明有该id对应的帖子
			//获取帖子相应的内容放到修改页面
			$sql = "SELECT `tc_id`,`tc_art_author`,`tc_art_type`,`tc_art_title`,`tc_art_content` FROM `tc_article` WHERE `tc_id`='{$_GET
			['id']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
			$modify = array();
			if($rs['tc_art_author'] == $_COOKIE['username']){
				//帖子的相关内容
				$modify['id'] = $rs['tc_id'];
				$modify['title'] = $rs['tc_art_title'];
				$modify['content'] = $rs['tc_art_content'];
				$modify['type'] = $rs['tc_art_type'];

			}else{
				pushLocation2('操作失败,你没有权限修改该帖子', 'index.php');
			}
			
		}else{
			mysql_close();
			pushLocation2('没有该帖子或该帖子已经被删除!', 'index.php');
		}
	}else{
		pushLocation2('传递参数有错误', 'index.php');
	}
	
	//修改帖子内容(更新数据库)
	if(!empty($_POST['sent'])){
		$sqlStr = "UPDATE `tc_article` SET 
											`tc_art_title`='{$_POST['title']}',
											`tc_art_type`='{$_POST['article_type']}',
											`tc_art_content`='{$_POST['content']}',
											`tc_modify_time`=NOW() 
									 WHERE 
											`tc_id`='{$_GET['id']}'
					";
		if($GLOBALS['sys_code'] == 1){	//有验证码
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
			
			$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
				
			if(isset($rs['tc_uniqid'])){
				//mysql_close();
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');	//2.判断唯一标识符是否异常
				mysql_query($sqlStr) or die(mysql_error());
			}
			
		}elseif($GLOBALS['sys_code'] == 0){	//没验证码
			$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			
			if(isset($rs['tc_uniqid'])){
				//mysql_close();
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'index.php');	//2.判断唯一标识符是否异常
				mysql_query($sqlStr) or die(mysql_error());
			}
		}
	
		if(mysql_affected_rows() == 1){
			mysql_close();
			//session_destroy();
			//pushCloseWindow('帖子修改成功！');
			pushLocation2('帖子修改成功!', 'article_detail.php?id='.$_GET['id']);
		}else{
			mysql_close();
			//session_destroy();
			//pushCloseWindow('帖子修改失败！');
			pushLocation2('帖子修改失败!', 'index.php');
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--修改帖子</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/article_modify.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/message.js"></script>
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
		<div id="article_modify">
			<h3>修改帖子</h3>
			<form action="" method="post">
				<dl>
					<dd><label>标题:<input type="text" name="title" class="text title" value="<?php echo $modify['title'];?>" /></label>&nbsp;&nbsp;<a href="article_detail.php?id=<?php echo $modify['id']; ?> ">返回</a></dd>
					<dd class="type">
						类型:
						<?php
							foreach(range(1,16) as $num){
								if($num == $modify['type']){
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
					<dd><textarea id="editor_id" name="content" class="text"><?php echo $modify['content'];?></textarea></dd>
					<?php echo isDisplayCode2('修改帖子')?>
				</dl>
			</form>
		</div>
	</body>
</html>