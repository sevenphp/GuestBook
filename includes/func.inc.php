<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}

	//获取函数执行时当前标准时间
	function runTime(){
		$time = explode(" ",microtime());
		return $time[0]+$time[1];
	}
	
	//弹窗函数
	function pushAlert($info){
		echo "<script>alert('{$info}');</script>";
	}
	
	//页面跳转函数
	function pushLocation($url){
		echo "<script>location.href='{$url}'</script>";
	}
	
	//弹窗函数改进(弹窗并返回原来页面)
	function pushAlert2($info){
		echo "<script>alert('{$info}');history.back()</script>";
	}
	
	//页面跳转函数改进(弹窗并进行页面跳转)
	function pushLocation2($info,$url){
		echo "<script>alert('{$info}');location.href='{$url}'</script>";
		exit();
	}
	
	function pushCloseWindow($info){
		echo "<script>alert('{$info}');window.close();</script>";
		exit();
	}
	
	//生成唯一标识符
	function pushUniqid(){
		return md5(uniqid(rand(),TRUE));
	}
	
	//设置cookie
	function setCookies($username,$uniqid,$time){	//登录模块调用
		switch ($time) {
			case '0':	//随着浏览器的关闭自动清除cookie
				setcookie('username',$username);
				setcookie('uniqid',$uniqid);
				break;
			case '1':	//保存1天
				setcookie('username',$username,time()+86400);
				setcookie('uniqid',$uniqid,time()+86400);
				break;
			case '2':	//保存1周
				setcookie('username',$username,time()+604800);
				setcookie('uniqid',$uniqid,time()+604800);
				break;			
		}
	}
	
	//登录状态下无法访问login.php和reg.php页面
	function loginStatus(){
		if(isset($_COOKIE['username'])){
			//pushAlert('用户已登陆状态下,无法进行该操作!');
			//pushLocation('index.php');
			pushLocation2('用户已登陆状态下,无法进行该操作!', 'index.php');
			exit();
		}
	}
	
	//function noLoginStatus(){
	//	if(!isset($_COOKIE['username'])){
	//		pushAlert('用户登陆状态下,才能进行此操作!');
	//		pushLocation('login.php');			
	//	}
	//}
	
	//字符串转行HTML实体
	function userInfoHtml($string){
		if(is_array($string)){
			foreach ($string as $key => $value) {
				$string[$key] = userInfoHtml($value);	//采用递归
			}
		}else{
			$string = htmlspecialchars($string);	//将HTML标签转化为HTML实体
		}
		return $string;
	}
	
	//转义插入数据库的字符串
	function myRealEscapeStr($string){
		if(is_array($string)){
			foreach($string as $key => $value){
				$string['key'] = myRealEscapeStr($value);
			}
		}else{
			$string = mysql_real_escape_string($string);
		}
		return $string;
	}
	
	//判断用户等级
	function checkLevel($level){
		//if($level == 1){
		//	echo '管理员';
		//}elseif($level == 0){
		//	echo '普通用户';
		//}
		switch ($level) {
			case 0:
				echo '普通用户';
				break;
			case 1:
				echo '管理员';
				break;
			default:
				echo '权限出错';
				break;
		}
	}
	
	//判断唯一标识符
	function checkUniqid($dbUniqid,$cookieUniqid,$url){
		if($dbUniqid != $cookieUniqid){
			pushAlert('唯一标识符异常!');
			pushLocation($url);
		}
	}
	
	
	//判断验证码是否正确
	function checkCode($postCode,$sessionCode){
		if($postCode != $sessionCode){
			pushAlert2('验证码不正确!');
			exit();
		}
	}
		/*
	 * 判断唯一标识符是否合法
	 * */
	//function checkUniqid($startUniqid,$endUniqid){
		
	//	if((mb_strlen($startUniqid,'utf-8') !=32) || ($startUniqid != $endUniqid)){
	//		pushAlert('唯一标识符不一致!');
	//	}
		
	//	return $startUniqid;
	//}
	
	/*简单分页函数*/
	function pageList($info,$lj,$pagenum,$page){
			//global $page;
			echo '<div id="pagelist-num">';
				echo '<ul>';
						for($i=0;$i<$pagenum;$i++){
							if($page == $i+1){
								echo '<li><a href="'.$info.$lj.'page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
								echo "\n";
							}else{
								echo '<li><a href="'.$info.$lj.'page='.($i+1).'">'.($i+1).'</a></li>';
								echo "\n";								
							}
						}
				echo '</ul>';
			echo '</div>';
	}
	
	/*在注册成功时生成XML文件*/
	function regXml($userInfo){
		$file = 'userInfo.xml';
		
		//打开文件,返回句柄
		$fp = fopen($file, w);
		if($fp){
			//写锁
			flock($fp, LOCK_EX);
			
			$infoString = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "<vip>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<id>{$userInfo['id']}</id>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<username>{$userInfo['username']}</username>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<sex>{$userInfo['sex']}</sex>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<who>{$userInfo['who']}</who>\r\n";
			fwrite($fp, $infoString,strlen($infoString));		
			$infoString = "\t<face>{$userInfo['face']}</face>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<email>{$userInfo['email']}</email>\r\n";
			fwrite($fp, $infoString,strlen($infoString));
			$infoString = "\t<site>{$userInfo['site']}</site>\r\n";		
			fwrite($fp, $infoString,strlen($infoString));							
			$infoString = "</vip>\r\n";
			fwrite($fp, $infoString,strlen($infoString));		
			//解锁
			flock($fp, LOCK_UN);
			
			//关闭文件句柄
			fclose($fp);
		}else{
			pushAlert('xml生成失败');
		}
		

	}

	//读取保存最新注册用户的XML文件(userInfo.xml)
	function readUserInfoXml($file){
		$info = array();		
		if(file_exists($file)){
			$strInfo = file_get_contents($file);
			//var_dump($strInfo);
			preg_match_all('/<vip>(.*)<\/vip>/s',$strInfo,$strDom);		//进行全局正则表达式匹配,$strDom是二维数组
			//var_dump($strDom);
			foreach($strDom[1] as $value){	//遍历$strDom[1]
				//一一全局匹配
				preg_match_all('/<id>(.*)<\/id>/s',$value,$id);	//id
				preg_match_all('/<username>(.*)<\/username>/s',$value,$username);	//username
				preg_match_all('/<sex>(.*)<\/sex>/s',$value,$sex);
				preg_match_all('/<who>(.*)<\/who>/s',$value,$who);
				preg_match_all('/<face>(.*)<\/face>/s',$value,$face);
				preg_match_all('/<email>(.*)<\/email>/s',$value,$email);
				preg_match_all('/<site>(.*)<\/site>/s',$value,$site);
				
				$info['id'] = $id[1][0];
				$info['username'] = $username[1][0];
				$info['sex'] = $sex[1][0];
				$info['who'] = $who[1][0];
				$info['face'] = $face[1][0];
				$info['email'] =$email[1][0];
				$info['site'] = $site[1][0];
					
				}
			}else{
				echo $file.'文件不存在!';
			}	
			return $info;	
	}
	
	//限时
	function reducedTime($firstTime,$secondTime,$someTime){	//限时
		if($secondTime - $firstTime < $someTime){
			pushAlert2('您发贴过于频繁,请于'.$someTime.'s后再发帖!');
			exit();
		}
	}

	
	function memberSlider(){
		echo '<div id="member-slider">';
		echo '<h2>管理导航</h2>';
		echo '<dl>';
		echo '<dt>系统设置</dt>';
		echo '<dd><a href="manager.php">系统信息</a></dd>';
		echo '<dd><a href="manager_modify.php">修改设置</a></dd>';
		echo '</dl>';
		echo '<dl>';
		echo '<dt>会员管理</dt>';
		echo '<dd><a href="manager_mem_list.php">博友列表</a></dd>';
		echo '<dd><a href="manager_mem_jobs.php">职务设置</a></dd>';
		echo '<dd><a href="flower_list.php">查询花朵</a></dd>';
		echo '<dd><a href="#">个人相册</a></dd>'."\n";
		echo '</dl>'."\n";
		echo '</div>'."\n";
	}
	
	/*管理员权限的共用文件*/
	function checkManger(){
		if(!(isset($_COOKIE['username']) && isset($_SESSION['level']) && ($_SESSION['level'] == 1))){
			pushLocation2('非法访问!', 'index.php');
		}
	}
	
	
	/*根据后台设置的是否启用验证来决定是否在页面显示验证码图片*/
	function isDisplayCode(){
		if($GLOBALS['sys_code'] == 1){
			$sysModify['syscode_html'] = '<dd><label>验 证 码: <input type="text" class="text code" name="code" /></label> <img src="includes/image.inc.php" class="codeimg" id="codeimg"/></dd>';
		}elseif($GLOBALS['sys_code'] == 0){
			$sysModify['syscode_html'] = '';
		}
		return $sysModify['syscode_html'];
	}

	
	function isDisplayCode2($text){
		if($GLOBALS['sys_code'] == 1){
			$sysModify['syscode_html'] = '<dd><label>验证码:<input type="text" name="code" class="text code" /></label>&nbsp;&nbsp;<img src="includes/image.inc.php" id="codeimg"/>&nbsp;&nbsp;<input type="submit" name="sent" value="'.$text.'" /></dd>';
		}elseif($GLOBALS['sys_code'] == 0){
			$sysModify['syscode_html'] = '<dd><input type="submit" name="sent" value="'.$text.'" /></dd>';
		}
		return $sysModify['syscode_html'];
	}
	
	function checkPhotoName($name){
		if(!empty($name)){
			$name = trim($name);
			if(mb_strlen($name,'utf-8') < 6 || mb_strlen($name,'utf-8') > 50){
				pushAlert2('相册名称不能小于6位或大于50位');
				exit();
			}
		}else{
			pushAlert2('相册名称不能为空');
			exit();
		}
		return $name;
	}
	
	function checkPhotoPass($pass){
		if(!empty($pass)){
			if(mb_strlen($pass,'utf-8') < 6 || mb_strlen($pass) > 20){
				pushAlert2('密码长度不能小于6位或大于20位');
				exit();
			}
			$pass = md5($pass);
		}else{
			$pass = NULL;
		}
		return $pass;
	}
	
	/*递归删除指定目录*/
	function delDir($dirname){
		if(file_exists($dirname)){	//先判断目录是否存在,如果目录不存在但执行删除操作的话会报错
			$dir=opendir($dirname);		//返回句柄
			while(!!$filename=readdir($dir)){		//读取目录资源,当条件为False时循环结束
				if($filename!="." && $filename!=".."){
					$file=$dirname."/".$filename;
					if(is_dir($file)){
						delDir($file);	//递归调用
					} else{
						//echo "删除文件<b>".$file."</b>成功<br>";
						unlink($file);	//删除一个文件
					}
				}
			}
			closedir($dir);
			//echo "删除目录<b>".$dirname."</b>成功<br>";
			rmdir($dirname);
			return true;
		}else{
			return false;
		}	
		//echo "删除非空目录成功!";	//删除几个目录,就会输出几次文字
	}
	
/* 	function delDir($dir){
		if(rmdir($dir) == false && is_dir($dir)){	
			$handle = @opendir($dir);
			$file = readdir($handle);
			if($handle){
				while($file){
					if(is_dir($file) && $file != '.' && $file != '..'){
						delDir($file);	//递归
					}else{
						unlink($file);
					}
				}
			}
			closedir($handle);
			rmdir($dir);
		}else{
			die('没有权限删除文件或目录');
		}
	} */
	
	/*生成缩略图函数*/
	function thumbPic($img,$per){
		//获取图片的扩展名
		$picExten = strrchr($img, '.');
		//生成png标头文件
		header('Content-Type:image/png');
		//获取原图片的长度和宽度信息
		list($width,$height) = getimagesize($img);
		//指定缩略图的长度和宽度
		$newWidth = $width * $per;
		$newHeight = $height * $per;
		//以缩略图的长度和宽度创建一个真彩色图像
		$newImage_tmp = imagecreatetruecolor($newWidth, $newHeight);	
		//按照原图像类型创建对应的画布
		switch($picExten){
			case '.jpg':
						$newImage = imagecreatefromjpeg($img);	
						break;
			case '.png':
						$newImage = imagecreatefrompng($img);
						break;
			case '.gif':
						$newImage = imagecreatefromgif($img);
						break;
		}
		//将原图采集复制到新图上
		imagecopyresampled($newImage_tmp, $newImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		//生成png图片
		imagepng($newImage_tmp);
		//销毁
		imagedestroy($newImage_tmp);
		imagedestroy($newImage);
	}
?>
