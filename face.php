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
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--头像选择</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/face.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/chface.js"></script>
	</head>
	<body>
		<div id="face">
			<h3>请选择头像</h3>
			<dl>	
				<?php foreach(range(1,9) as $num){?>
				<dd><img src="face/m0<?php echo $num; ?>.gif" alt="face/m0<?php echo $num; ?>.gif" title="头像0<?php echo $num; ?>" /></dd>
				<?php } ?>
				
				<?php foreach(range(10,64) as $num){?>
				<dd><img src="face/m<?php echo $num; ?>.gif" alt="face/m<?php echo $num; ?>.gif" title="头像<?php echo $num; ?>" /></dd>
				<?php } ?>
			</dl>
		</div>
	</body>
</html>