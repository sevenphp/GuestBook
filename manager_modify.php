<?php
	session_start();	
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	checkManger();
	//global $sysInfo['title'];
	//echo $GLOBALS['sys_title'];
	
	$sysModify = array();
	
	//是否启用验证码
 	if($GLOBALS['sys_code'] == 1){
		$sysModify['syscode'] = '<label><input type="radio" name="iscode" value="1" checked="checked" />启用</label><label><input type="radio" name="iscode" value="0" />不启用</label>';
		$sysModify['syscode_html'] = '<dd><label>验 证 码: <input type="text" class="text code" name="code" /></label> <img src="includes/image.inc.php" class="codeimg" id="codeimg"/></dd>';
	}elseif($GLOBALS['sys_code'] == 0){
		$sysModify['syscode'] = '<label><input type="radio" name="iscode" value="1"/>启用</label><label><input type="radio" name="iscode" value="0" checked="checked" />不启用</label>';
		$sysModify['syscode_html'] = '';
	}
	
	
	//是否开放注册
	if($GLOBALS['sys_reg'] == 1){
		$sysModify['sysreg'] = '<label><input type="radio" name="isreg" value="1" checked="checked" />开放</label><label><input type="radio" name="isreg" value="0" />不开放</label>';
	}elseif($GLOBALS['sys_reg'] == 0){
		$sysModify['sysreg'] = '<label><input type="radio" name="isreg" value="1"/>开放</label><label><input type="radio" name="isreg" value="0" checked="checked" />不开放</label>';
	}
	
	//文章分页
	if($GLOBALS['sys_art'] == 10){
		$sysModify['sysart'] = '<select name="sysart">';
		$sysModify['sysart'] .= '<option value="10" selected="selected">每页10条</option>';
		$sysModify['sysart'] .= '<option value="13" >每页13条</option>';
		$sysModify['sysart'] .= '</select>';
	}elseif($GLOBALS['sys_art'] == 13){
		$sysModify['sysart'] = '<select name="sysart">';
		$sysModify['sysart'] .= '<option value="10" >每页10条</option>';
		$sysModify['sysart'] .= '<option value="13" selected="selected">每页13条</option>';
		$sysModify['sysart'] .= '</select>';
	}
	
	//博友分页
	if($GLOBALS['sys_blog'] == 10){
		$sysModify['sysblog'] = '<select name="sysblog">';
		$sysModify['sysblog'] .= '<option value="10" selected="selected">每页10条</option>';
		$sysModify['sysblog'] .= '<option value="15" >每页15条</option>';
		$sysModify['sysart'] .= '</select>';
	}elseif($GLOBALS['sys_blog'] == 15){
		$sysModify['sysblog'] = '<select name="sysblog">';
		$sysModify['sysblog'] .= '<option value="10" >每页10条</option>';
		$sysModify['sysblog'] .= '<option value="15" selected="selected">每页15条</option>';
		$sysModify['sysblog'] .= '</select>';
	}
	
	
/* 	if($GLOBALS['sys_style'] == 1){
		$sysModify['style'] = '<select name="style">';
		$sysModify['style'] .= '<option value="1" selected="selected">绿色背景</option>';
		$sysModify['style'] .= '<option value="2" >蓝色背景</option>';
		$sysModify['style'] .= '<option value="3" >粉色背景</option>';
		$sysModify['style'] .= '</select>';
	}elseif($GLOBALS['sys_blog'] == 2){
		$sysModify['style'] = '<select name="style">';
		$sysModify['style'] .= '<option value="10" >绿色背景</option>';
		$sysModify['style'] .= '<option value="15" selected="selected">蓝色背景</option>';
		$sysModify['style'] .= '<option value="3" >粉色背景</option>';
		$sysModify['style'] .= '</select>';
	} */
	//样式选择
	switch($GLOBALS['sys_style']){
		case '1':
			$sysModify['sysstyle'] = '<dd>样式列表：<select name="sysstyle">';
			$sysModify['sysstyle'] .= '<option value="1" selected="selected">绿色背景</option>';
			$sysModify['sysstyle'] .= '<option value="2" >蓝色背景</option>';
			$sysModify['sysstyle'] .= '<option value="3" >粉色背景</option>';
			$sysModify['sysstyle'] .= '</select></dd>';
			break;
		case '2':
			$sysModify['sysstyle'] = '<dd>样式列表：<select name="sysstyle">';
			$sysModify['sysstyle'] .= '<option value="1" >绿色背景</option>';
			$sysModify['sysstyle'] .= '<option value="2" selected="selected">蓝色背景</option>';
			$sysModify['sysstyle'] .= '<option value="3" >粉色背景</option>';
			$sysModify['sysstyle'] .= '</select></dd>';
			break;
		case '3':
			$sysModify['sysstyle'] = '<dd>样式列表：<select name="sysstyle">';
			$sysModify['sysstyle'] .= '<option value="1" >绿色背景</option>';
			$sysModify['sysstyle'] .= '<option value="2" >蓝色背景</option>';
			$sysModify['sysstyle'] .= '<option value="3" selected="selected">粉色背景</option>';
			$sysModify['sysstyle'] .= '</select></dd>';
			break;
	}
		
	//限时发帖
	
	switch($GLOBALS['sys_post']){
		case '30':
			$sysModify['syspost'] = '<select name="syspost">';
			$sysModify['syspost'] .= '<option value="30" selected="selected">三十秒</option>';
			$sysModify['syspost'] .= '<option value="60" >一分钟</option>';
			$sysModify['syspost'] .= '<option value="120" >二分钟</option>';
			$sysModify['syspost'] .= '</select>';
			break;
		case '60':
			$sysModify['syspost'] = '<select name="syspost">';
			$sysModify['syspost'] .= '<option value="30" >三十秒</option>';
			$sysModify['syspost'] .= '<option value="60" selected="selected">一分钟</option>';
			$sysModify['syspost'] .= '<option value="120" >二分钟</option>';
			$sysModify['syspost'] .= '</select>';
			break;
		case '120':
			$sysModify['syspost'] = '<select name="syspost">';
			$sysModify['syspost'] .= '<option value="30" >三十秒</option>';
			$sysModify['syspost'] .= '<option value="60" >一分钟</option>';
			$sysModify['syspost'] .= '<option value="120" selected="selected">二分钟</option>';
			$sysModify['syspost'] .= '</select>';
			break;
	}
	
	//限时回复
	switch($GLOBALS['sys_re']){
		case '15':
			$sysModify['sysre'] = '<select name="sysre">';
			$sysModify['sysre'] .= '<option value="15" selected="selected">十五秒</option>';
			$sysModify['sysre'] .= '<option value="30" >三十秒</option>';
			$sysModify['sysre'] .= '<option value="60" >一分钟</option>';
			$sysModify['sysre'] .= '</select>';
			break;
		case '30':
			$sysModify['sysre'] = '<select name="sysre">';
			$sysModify['sysre'] .= '<option value="15" >十五秒</option>';
			$sysModify['sysre'] .= '<option value="30" selected="selected">三十秒</option>';
			$sysModify['sysre'] .= '<option value="60" >一分钟</option>';
			$sysModify['sysre'] .= '</select>';
			break;
		case '60':
			$sysModify['sysre'] = '<select name="sysre">';
			$sysModify['sysre'] .= '<option value="15" >十五秒</option>';
			$sysModify['sysre'] .= '<option value="30">三十秒</option>';
			$sysModify['sysre'] .= '<option value="60" selected="selected">一分钟</option>';
			$sysModify['sysre'] .= '</select>';
			break;
	}	

	
	//修改设置
	if(!empty($_POST['modify'])){
		if($GLOBALS['sys_code'] == 1){
			//启用验证码的
			checkCode($_POST['code'],$_SESSION['code']);
			
			$sql = "SELECT `tc_uniqid` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}' LIMIT 1";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
				
			if(isset($rs['tc_uniqid'])){
				//mysql_close();
				checkUniqid($rs['tc_uniqid'], $_COOKIE['uniqid'],'member.php');	//判断唯一标识符是否异常
				
				$sql = "UPDATE `tc_system` SET 
												`tc_change_title`='{$_POST['title']}',
												`tc_change_code`='{$_POST['iscode']}',
												`tc_change_reg`='{$_POST['isreg']}',
												`tc_change_art`='{$_POST['sysart']}',
												`tc_change_blog`='{$_POST['sysblog']}',
												`tc_change_style`='{$_POST['sysstyle']}',
												`tc_change_post`='{$_POST['syspost']}',
												`tc_change_re`='{$_POST['sysre']}',
												`tc_change_content`='{$_POST['syscontent']}'
										 WHERE 
												`tc_id`=1";
				//echo $sql;
				mysql_query($sql);
			}
		}elseif($GLOBALS['sys_code'] == 0){
			//echo 'aaa';
			//不启用验证码的
			$sql = "UPDATE `tc_system` SET 
											`tc_change_title`='{$_POST['title']}',
											`tc_change_code`='{$_POST['iscode']}',
											`tc_change_reg`='{$_POST['isreg']}',
											`tc_change_art`='{$_POST['sysart']}',
											`tc_change_blog`='{$_POST['sysblog']}',
											`tc_change_style`='{$_POST['sysstyle']}',
											`tc_change_post`='{$_POST['syspost']}',
											`tc_change_re`='{$_POST['sysre']}',
											`tc_change_content`='{$_POST['syscontent']}' 
										WHERE 
											`tc_id`=1";
			//echo $sql;
			mysql_query($sql);
		}
		
		if(mysql_affected_rows() == 1){
			mysql_close();
			//session_destroy();
			//pushAlert('设置修改成功!');
			//pushLocation('member.php');
			pushLocation2('设置修改成功!', 'manager_modify.php');
		}else{
			mysql_close();
			//session_destroy();
			//pushAlert('你的设置没有进行任何修改');
			//pushLocation('manager_modify.php');
			pushLocation2('你的设置没有进行任何修改', 'manager_modify.php');
		}
	}


	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--信息修改</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/manager_modify.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/modify.js"></script>
		<!--<script type="text/javascript" src="js/login.js"></script> -->
		<!-- <script type="text/javascript" src="js/validator.js"></script> -->
		<!-- <script type="text/javascript" src="js/reg.ajax.js"></script> -->
		<!--  <script type="text/javascript" charset="UTF-8" src="editor/kindeditor-min.js"> </script>
		<script type="text/javascript" charset="UTF-8" src="editor/lang/zh_CN.js"> </script> -->
		<script>
		        //var editor;
		        //KindEditor.ready(function(K) {
		                //editor = K.create('#editor_id');
		        //});
		//	var editor;
		//	KindEditor.ready(function(K) {
		//		editor = K.create('textarea[name="sign"]', {
			//		resizeType : 1,
				//	allowPreviewEmoticons : false,
					//allowImageUpload : false,
					//items : [
						//'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						//'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						//'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				//});
			//});
    
		</script>
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
			echo "\n";
		?>
		<div id="member">
			<?php 
				memberSlider();
			?>
			<div id="member-main">
				<h2>系统管理中心</h2>
				<form action="" method="post">
					<dl>			
						<dd><label>网站名称：<input type="text" name="title" class="text" value="<?php echo $GLOBALS['sys_title'];?>" /></label></dd>
						<dd>开放验证：<?php echo $sysModify['syscode']; ?></dd>
						<dd>开放注册：<?php echo $sysModify['sysreg']; ?></dd>
						<dd>文章列表：<?php echo $sysModify['sysart']; ?></dd>
						<dd>博友列表：<?php echo $sysModify['sysblog']; ?></dd>
						<?php echo $sysModify['sysstyle']; ?>
						<dd>限时发帖：<?php echo $sysModify['syspost'];?></dd>
						<dd>限时回复：<?php echo $sysModify['sysre'];?></dd>
						<dd>非法词语：<input type="text" name="syscontent" value="<?php echo $GLOBALS['sys_content']; ?>" class="text noword" /></dd>
						<?php echo $sysModify['syscode_html'];?>
						<!-- <dd><label>验 证 码: <input type="text" class="text code" name="code" /></label> <img src="includes/image.inc.php" class="codeimg" id="codeimg"/></dd> -->
						<dd><input type="submit" name="modify" value="修改资料" /></dd>
					</dl>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<?php
			include 'includes/footer.inc.php';
			echo "\n";
		?>
	</body>
</html>		