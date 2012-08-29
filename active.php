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
	
	if(!isset($_GET['active'])){
		pushAlert('非法访问!');
		pushLocation('reg.php');
	}
	
	
	if(isset($_GET['action']) && isset($_GET['active']) && $_GET['action'] == "ok"){
		$sql = "select `tc_active` from `tc_user` where `tc_active`='{$_GET['active']}' limit 1";
		$query = mysql_query($sql);
		
		if(mysql_affected_rows()){
			$sql = "update `tc_user` set `tc_active`=NULL where tc_active='{$_GET['active']}' limit 1";
			mysql_query($sql);
			if(mysql_affected_rows()){
				mysql_close();
				pushAlert('用户激活成功!');
				pushLocation('login.php');
			}else{
				mysql_close();
				pushAlert('用户激活失败!');
				pushLocation('reg.php');
			}
		}else{
			pushAlert('非法访问!');
		}
		mysql_close();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--激活</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/active.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
	</head>
	<body>
		<div id="container">
			<?php 
				require('includes/header.inc.php');
			?>
			<div id="active">
				<h2>激活用户账号</h2>
				<p>若要激活账户,请点击下面激活链接</p>
				<p><a href="<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&action=ok"; ?>"><?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&action=ok"; ?></a></p>
			</div>
			<?php 
				require('includes/footer.inc.php');
			?>
		</div>
	</body>
</html>