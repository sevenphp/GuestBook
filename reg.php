<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	//开启SESSION
	session_start();
	
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//判断登录状态
	loginStatus();		
	
	$startTime = runTime();
		
	if(!empty($_POST['sub'])){	//判断用户是否点击了提交按钮
		if($GLOBALS['sys_code'] == 1){
			/*后台启用验证码时的处理*/
			checkCode($_POST['code'],$_SESSION['code']);	//对比验证码
			
			include 'includes/reg.func.php';
			//创建一个数组,用于接受用户注册的信息
			$userInfo = array();
			//唯一标识符,用于防止本地提交等攻击
			$userInfo['uniqid'] = checkUniqid2($_POST['uniqid'], $_SESSION['uniqid']);
			//用户激活标识符,用于激活刚注册的用户的账号
			$userInfo['active'] = pushUniqid();
			//接收用户名
			$userInfo['username'] = checkUser($_POST['username'], 2, 15);
			//接收用户密码
			$userInfo['password'] = checkPass($_POST['password'],$_POST['rpassword'],6, 20);		//密码经过MD5加密
			//接受密码提示
			$userInfo['question'] = checkQuestion($_POST['qpassword'], $_POST['apassword'], 2, 10);
			//接收密码答案
			$userInfo['answer'] = checkAnswer($_POST['qpassword'], $_POST['apassword'], 2, 10);
			//性别
			$userInfo['sex'] = $_POST['sex'];
			//头像
			$userInfo['face'] = $_POST['faceadd'];
			//接收邮箱
			$userInfo['email'] = checkEmail($_POST['email']);
			//接收QQ
			$userInfo['qq'] = checkQQ($_POST['qq']);
			//接收个人主页
			$userInfo['site'] = checkSite($_POST['site']);
			//print_r($userInfo);
			//echo $_SESSION['uniqid'];
			
			//用于判断该用户名是否已经被注册的SQL语句
			$sql = "SELECT * FROM `tc_user` WHERE `tc_username`='{$userInfo['username']}'";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			if($rs['tc_id']){
				pushAlert('该用户名已被注册!');
				pushLocation('reg.php');
				exit();
			}
			
			$sql = "SELECT * FROM `tc_user` WHERE `tc_email`='{$userInfo['email']}'";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			if($rs['tc_id']){
				pushAlert('该邮箱已被使用!');
				pushLocation('reg.php');
				exit();
			}
			
			$sql = "INSERT INTO `tc_user`(
											`tc_id`,
											`tc_uniqid`,
											`tc_active`,
											`tc_username`,
											`tc_password`,
											`tc_question`,
											`tc_answer`,
											`tc_sex`,
											`tc_face`,
											`tc_email`,
											`tc_qq`,
											`tc_site`,
											`tc_reg_time`,
											`tc_last_time`,
											`tc_last_ip`
										 )
								   VALUES(
											null,
											'{$userInfo['uniqid']}',
											'{$userInfo['active']}',
											'{$userInfo['username']}',
											'{$userInfo['password']}',
											'{$userInfo['question']}',
											'{$userInfo['answer']}',
											'{$userInfo['sex']}',
											'{$userInfo['face']}',
											'{$userInfo['email']}',
											'{$userInfo['qq']}',
											'{$userInfo['site']}',
											now(),
											now(),
											'{$_SERVER['REMOTE_ADDR']}'
										 )";
			
					mysql_query($sql) or die('SQL执行失败<br />'.mysql_error());
					
		}elseif($GLOBALS['sys_code'] == 0){
			/*后台没有启用验证码时的处理*/
			include 'includes/reg.func.php';
			//创建一个数组,用于接受用户注册的信息
			$userInfo = array();
			//唯一标识符,用于防止本地提交等攻击
			$userInfo['uniqid'] = checkUniqid2($_POST['uniqid'], $_SESSION['uniqid']);
			//用户激活标识符,用于激活刚注册的用户的账号
			$userInfo['active'] = pushUniqid();
			//接收用户名
			$userInfo['username'] = checkUser($_POST['username'], 2, 15);
			//接收用户密码
			$userInfo['password'] = checkPass($_POST['password'],$_POST['rpassword'],6, 20);		//密码经过MD5加密
			//接受密码提示
			$userInfo['question'] = checkQuestion($_POST['qpassword'], $_POST['apassword'], 2, 10);
			//接收密码答案
			$userInfo['answer'] = checkAnswer($_POST['qpassword'], $_POST['apassword'], 2, 10);
			//性别
			$userInfo['sex'] = $_POST['sex'];
			//头像
			$userInfo['face'] = $_POST['faceadd'];
			//接收邮箱
			$userInfo['email'] = checkEmail($_POST['email']);
			//接收QQ
			$userInfo['qq'] = checkQQ($_POST['qq']);
			//接收个人主页
			$userInfo['site'] = checkSite($_POST['site']);
			//print_r($userInfo);
			//echo $_SESSION['uniqid'];
				
			//用于判断该用户名是否已经被注册的SQL语句
			$sql = "SELECT * FROM `tc_user` WHERE `tc_username`='{$userInfo['username']}'";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			if($rs['tc_id']){
				pushAlert('该用户名已被注册!');
				pushLocation('reg.php');
				exit();
			}
				
			$sql = "SELECT * FROM `tc_user` WHERE `tc_email`='{$userInfo['email']}'";
			$query = mysql_query($sql);
			$rs = mysql_fetch_array($query);
			if($rs['tc_id']){
				pushAlert('该邮箱已被使用!');
				pushLocation('reg.php');
				exit();
			}
				
			$sql = "INSERT INTO `tc_user`(
											`tc_id`,
											`tc_uniqid`,
											`tc_active`,
											`tc_username`,
											`tc_password`,
											`tc_question`,
											`tc_answer`,
											`tc_sex`,
											`tc_face`,
											`tc_email`,
											`tc_qq`,
											`tc_site`,
											`tc_reg_time`,
											`tc_last_time`,
											`tc_last_ip`
										)
								  VALUES(
											null,
											'{$userInfo['uniqid']}',
											'{$userInfo['active']}',
											'{$userInfo['username']}',
											'{$userInfo['password']}',
											'{$userInfo['question']}',
											'{$userInfo['answer']}',
											'{$userInfo['sex']}',
											'{$userInfo['face']}',
											'{$userInfo['email']}',
											'{$userInfo['qq']}',
											'{$userInfo['site']}',
											now(),
											now(),
											'{$_SERVER['REMOTE_ADDR']}'
										 )";
				
			mysql_query($sql) or die('SQL执行失败<br />'.mysql_error());
		}
	
		if(mysql_affected_rows() == 1){
			//获取插入数据的ID
			$userInfo['id'] = mysql_insert_id();
			if($userInfo['sex'] == '男'){
				$userInfo['who'] = '他';
			}elseif($userInfo['sex'] == '女'){
				$userInfo['who'] = '她';
			}
			//将最新注册的用户数据生成XML
			regXml($userInfo);
			
			mysql_close();
			//pushAlert('恭喜!用户注册成功!');	//调用页面弹窗函数
			//pushLocation('active.php?active='.$userInfo['active']);	//调用页面跳转函数
			pushLocation2('恭喜!用户注册成功!', 'active.php?active='.$userInfo['active']);
		}else{
			mysql_close();
			//pushAlert('用户注册不成功!请重新注册!');
			//pushLocation('reg.php');
			pushLocation2('用户注册不成功!请重新注册!', 'reg.php');
		}
	}//else{
		//mysql_close();
		$_SESSION['uniqid'] = $uniqid = pushUniqid();
	//}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $GLOBALS['sys_title'];?>--注册</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" type="text/css" href="styles/reg.css" />
		<link href="favicon.ico" rel="Shortcut Icon" />
		<link href="favicon.ico" rel="Bookmark" />
		<script type="text/javascript" src="js/face.js"></script>
		<!-- <script type="text/javascript" src="js/validator.js"></script>
		<script type="text/javascript" src="js/reg.ajax.js"></script> -->
	</head>
	<body>
		<?php
			include 'includes/header.inc.php';
		?>
		<div id="reg">
			<h2>用户注册</h2>
			<?php 
				if($GLOBALS['sys_reg'] == 1){
			?>
			<form action="reg.php" method="post" name="reg">
				<input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>"/>	<!--唯一标识符-->
				<dl><!--onblur="checkLogin(this)"-->
					<dt>请认真填写以下注册资料</dt>
					<dd><label>用 户 名:<input type="text" name="username" class="text"/></label><span>(*必填，至少两位)</span></dd>
					<dd><label>密　　码:<input type="password" name="password" class="text" /></label><span>(*必填，至少六位)</span></dd>
					<dd><label>确认密码:<input type="password" name="rpassword" class="text" /></label><span>(*必填，与上面一致)</span></dd>
					<dd><label>密码提示:<input type="text" name="qpassword" class="text" /></label><span>(*必填，至少两位)</span></dd>
					<dd><label>密码回答:<input type="text" name="apassword" class="text" /></label><span>(*必填，至少两位)</span></dd>
					<dd>性　　别:<label><input type="radio" name="sex" value="男" checked="checked" />男</label><label><input type="radio" name="sex"
						value="女" />女</label></dd>
					<dd id="face"><input type="hidden" id="faceadd" value="face/m01.gif" name="faceadd"/><img src="face/m01.gif" alt="" title="" class="face" id="faceimg"/></dd>
					<dd><label>电子邮箱:<input type="text" name="email" class="text" /></label>(*必填)</dd>
					<dd><label>　Q Q 　:<input type="text" name="qq" class="text" /></label></dd>
					<dd><label>主页地址:<input type="text" name="site" class="text" value="http://" /></label></dd>
					<?php echo isDisplayCode(); ?>
					<!-- <dd><label>验 证 码:<input type="text" name="code" class="text code" /></label>&nbsp;&nbsp;<img src="includes/image.inc.php"  id="codeimg" /></dd> -->
					
					<!-- <dd><label>验 证 码: <input type="text" class="text code" name="code" /></label> <img src="includes/image.inc.php" class="codeimg" id="codeimg"/></dd> -->
					
					<dd><input type="submit" name="sub" value="注册" class="post-bottom"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重置" class="post-bottom"/></dd>
				</dl>
			</form>
			<?php 
				}else{
					echo '<dl>';
					echo '<dt style="height:400px;line-height:400px;">对不起,网站已经关闭注册!</dt>';
					echo '</dl>';
				}
			?>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</body>
</html>